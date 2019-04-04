<template>
  <v-container>
    <v-layout>
      <v-flex>
        <h1>問題: {{ question }}</h1>
        <v-text-field placeholder="回答を入力してね" v-on:keyup.enter.native="answer" v-model="message"></v-text-field>
        <v-btn type="primary" @click="answer">回答する</v-btn>
        <v-btn type="primary" @click="hint">ヒントをみる</v-btn>
      </v-flex>
    </v-layout>

    <div class="text-xs-center">
      <v-dialog v-model="dialog" persistent max-width="290">
        <v-card>
          <v-card-title class="headline grey lighten-2" primary-title>回答終了</v-card-title>
          <v-card-text>{{ endText }}</v-card-text>
          <v-divider></v-divider>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="primary" flat @click="end">I accept</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </div>
  </v-container>
</template>

<script>
export default {
  data: function() {
    return {
      section: '',
      message: '',
      question: '',
      number: 1,
      dialogVisible: false,
      endText: ''
    };
  },
  created: async function() {
    await this.loadSection();
    await this.loadNumber();
    await this.loadQuestion();
  },
  methods: {
    loadSection: async function() {
      try {
        const response = await axios.get('/api/sections');
        this.section = response.data.section;
      } catch (error) {
        // TODO
        console.error(error);
      }
    },
    loadNumber: async function() {
      try {
        const response = await axios.get('/api/questions/' + this.section + '/answered');
        this.number = response.data.answeredCount + 1;
      } catch (error) {
        // TODO
        console.error(error);
      }
    },
    loadQuestion: async function(event) {
      try {
        const response = await axios.get('/api/questions/' + this.section + '/' + this.number);
        this.question = response.data.question;
      } catch (error) {
        if (error.response.status === 404) {
          this.result();
        }
      }
    },
    answer: function(event) {
      if (this.message === '') {
        this.$message.error('回答を入力してください');
        return;
      }
      axios.put('/api/questions/' + this.section + '/' + this.number, { answer: this.message }).then(response => {
        if (response.data.success == true) {
          this.$message('正解！', 'success');
        } else {
          this.$message.error('不正解。正解は' + response.data.answer + 'でした');
        }
        this.number++;
        this.loadQuestion();
      });
      this.message = '';
    },
    hint: function(event) {
      axios.get('/api/questions/' + this.section + '/' + this.number + '/hint').then(response => {
        this.$message('頭文字は' + response.data.hint + 'です');
      });
    },
    result: function() {
      axios.get('/api/questions/' + this.section + '/result').then(response => {
        let total = response.data.total;
        let success = response.data.success;
        this.endText = total + '問中、' + success + '問正解でした';
        this.dialogVisible = true;
      });
    },
    end: function() {
      window.location.href = '/';
    }
  }
};
</script>
