<template>
<div>
  <el-container>
    <el-header>
        <h1> 問題: {{ question }} </h1>
    </el-header>
    <el-main>
        <el-input placeholder="回答を入力してね" v-on:keyup.enter.native="answer" v-model="message"></el-input>
        <el-button type="primary" v-on:click="answer" :loading="primary_lording">回答する</el-button>
        <el-button type="primary" v-on:click="hint" :loading="primary_lording">ヒントをみる</el-button>
    </el-main>
  </el-container>
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
                .catch(error => {
                    this.result();
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
                .get('/api/questions/'+this.section+'/count')
                .then(response => {
                    var message = response.data.message;
                    this.$alert(message, '回答終了しました', {
                        confirmButtonText: 'OK',
                        callback: action => {
                            window.location.href = '/';
                        }
                    });
                })
        }
    }
}
</script>
