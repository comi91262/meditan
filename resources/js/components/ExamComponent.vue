<template>
<div>
    <input v-model="message" placeholder="回答を入力してね">
    <span>入力テキスト: {{ message }}</span>
    <button v-on:click="next">次へ</button>
</div>
</template>

<script>
export default {
    data: function () {
        return {
            message: '',
            response: '',
        }
    },
    methods: {
        next: function (event) {
            axios
                .get('http://localhost:8000/api/questions/0b78aae0-2a16-11e9-92e7-ef281055be64/1')
                .then(response => (this.response = response))
        }
    }
}
</script>
