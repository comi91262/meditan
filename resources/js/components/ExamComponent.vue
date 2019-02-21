<template>
<div>
    <input v-model="message" placeholder="回答を入力してね">
    <button v-on:click="next">次へ</button>
    <button v-on:click="answer">回答</button>
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
    created: function () {
        // 最初の問題をロードする
        this.next();
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
            this.message = '';
            axios
                .put('/api/questions/'+this.section+'/'+this.number, {'answer': this.message})
                .then(response => {
                    if (response.data.success == true) {
                        this.success_text = '正解！'
                    } else {
                        this.success_text = '不正解。正解は' + response.data.answer + 'でした'
                    }
                    this.number++;
                    this.next();
                })
        },
        result: function() {
            window.location.href = '/';
        }
    }
}
</script>
