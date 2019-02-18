<template>
<div>
    <input v-model="message" placeholder="回答を入力してね">
    <span>入力テキスト: {{ message }}</span>
    <button v-on:click="next">次へ</button>
    <button v-on:click="answer">回答する</button>
    <div>
        セクション: {{ section }}
    </div>
    <div>
        問題: {{ question }}
    </div>
    <div>
        {{ success_text }}
    </div>
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
            success_text: '',
        }
    },
    methods: {
        next: function (event) {
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
            axios
                .put('/api/questions/'+this.section+'/'+this.number, {'answer': this.message})
                .then(response => {
                    if (response.data.success == true) {
                        this.success_text = '正解！'
                    } else {
                        this.success_text = '不正解'
                    }
                    this.number++;
                    this.next();
                })
        },
        result: function() {
            console.log('終了！');
        }
    }
}
</script>
