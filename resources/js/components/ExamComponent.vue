<template>
  <div>
    <el-container>
      <el-header>
        <h1>問題: {{ question }}</h1>
      </el-header>
      <el-main>
        <el-input placeholder="回答を入力してね" v-on:keyup.enter.native="answer" v-model="message"></el-input>
        <el-button type="primary" v-on:click="answer" :loading="primary_lording">回答する</el-button>
        <el-button type="primary" v-on:click="hint" :loading="primary_lording">ヒントをみる</el-button>
      </el-main>
    </el-container>
    <el-dialog title="回答終了" :visible.sync="dialogVisible" width="30%" :before-close="handleClose">
      <span>{{ endText }}</span>
      <span slot="footer" class="dialog-footer">
        <el-button type="primary" @click="end">OK</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
export default {
    props: ['section'],
    data: function () {
        return {
            message: '',
            question: '',
            number: 1,
            primary_lording: false,
            dialogVisible: false,
            endText: '',
        }
    },
    created: function () {
        // 最初の問題をロードする
        this.load();
    },
    methods: {
        load: function (event) {
            axios
                .get('/api/questions/'+this.section+'/'+this.number)
                .then(response => {
                    this.question = response.data.question;
                })
        },
        answer: function (event) {
            if (this.message === '') {
                this.$message.error('回答を入力してください');
                return;
            }
            axios
                .put('/api/questions/'+this.section+'/'+this.number, {'answer': this.message})
                .then(response => {
                    if (response.data.success == true) {
                        this.$message('正解！', 'success');
                    } else {
                        this.$message.error('不正解。正解は' + response.data.answer + 'でした');
                    }
                    this.number++;
                    this.load();
                })
            this.message = '';
        },
        hint: function(event) {
            axios
                .get('/api/questions/'+this.section+'/'+this.number + '/hint')
                .then(response => {
                    this.$message('頭文字は' + response.data.hint + 'です');
                })
        },
        result: function() {
            axios
                .get('/api/questions/'+this.section+'/result')
                .then(response => {
                    let total = response.data.total;
                    let success = response.data.success;
                    this.endText = total + '問中、' + success + '問正解でした';
                    this.dialogVisible = true;
                })
        },
        end: function() {
            window.location.href = '/';
        }
    }
}
</script>
