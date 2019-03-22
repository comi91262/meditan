<template>
<el-form ref="form" :model="form" label-width="120px">
    <h1>選択フォーム</h1>
    <h2>カテゴリを選択してください</h2>
    <el-form-item label="">
        <el-checkbox-group v-model="form.selectedDepartment">
            <el-checkbox v-for="(department, key) in this.departments"
                :key="key"
                :label="department.id">
                {{department.name}}
            </el-checkbox>
        </el-checkbox-group>
    </el-form-item>
    <h2>問題文の言語を選択してください</h2>
    <el-form-item label="">
        <el-radio-group v-model="form.language">
            <el-radio label="0">日本語</el-radio>
            <el-radio label="1">English</el-radio>
        </el-radio-group>
    </el-form-item>
    <el-form-item>
        <el-button type="primary" @click="onSubmit">Start</el-button>
        <el-button @click="backHome">トップ画面に戻る</el-button>
    </el-form-item>
</el-form>
</template>

<script>
export default {
    data() {
        return {
            form: {
                selectedDepartment: [],
                language: '',
                number: 0,
            },
            departments: [],
        }
    },
    created: function () {
        this.getDepartments();
    },
    methods: {
        onSubmit() {
            axios.post('/api/questions/_kind/category', {
                'categories': this.form.selectedDepartment,
                'language': this.form.language,
            })
            .then(response => {
                if (response.data.result !== null) {
                    let term = response.data.result;
                    this.$router.push({ path: '/exam' });
                } else {
                    this.$message.error(response.data.message);
                }
            })
            .catch(error => {
                if (error.response.status === 401) {
                    this.$message.error('認証エラーです。もう一度ログインください');
                } else {
                    this.$message.error('通信エラーです。もう一度試してください');
                }
            })
        },
        backHome() {
            this.$router.go(-1);
        },
        getDepartments: function () {
            axios
                .get('/api/departments')
                .then(response => {
                    this.departments = response.data.departments;
                })
                .catch(error => {
                })
        },
    }
}
</script>