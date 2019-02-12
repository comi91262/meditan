<template>
<div>
    <input v-model="message" placeholder="回答を入力してね">
    <span>入力テキスト: {{ message }}</span>
    <button v-on:click="next">次へ</button>
    <button v-on:click="answer">回答する</button>
    <button v-on:click="load">ロード</button>
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
    data: function () {
        return {
            message: '',
            section: '',
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
        },
        answer: function (event) {
            axios
                .put('/api/questions/'+this.section+'/'+this.number, {'answer': this.message})
                .then(response => {
                    if (response.data.success == true) {
                        this.number++;
                        this.success_text = '正解！'
                    } else {
                        this.success_text = '不正解'
                    }
                })
        },
        load: function (event) {
            axios
                .post('/api/questions/create')
                .then(response => {
                    this.section = response.data.section;
                })
        },
    }
}
</script>
