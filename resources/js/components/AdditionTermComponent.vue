<template>
<div>
  <el-container>
    <el-header>
        <h1>単語の登録</h1>
    </el-header>
    <el-main>
        <el-input placeholder="日本語を入力してね" v-model="japaneseTerm"></el-input>
        <el-input placeholder="英語を入力してね" v-model="englishTerm"></el-input>
        <div>
            <h2>
                カテゴリーを選択してください
            </h2>
            <el-radio-group v-model="departmentSelection">
                <el-radio-button v-for="(department, key) in this.departments" 
                                 :key="key" 
                                 :label="department">
                                 {{department}}
                </el-radio-button>
            </el-radio-group>
        </div>
        <el-button type="primary" v-on:click="register" :loading="primary_lording">登録</el-button>
        <div>
            現在、単語を重複して入力できません。ごめんね。
        </div>
    </el-main>
  </el-container>
</div>
</template>

<script>
export default {
    data: function () {
        return {
            aaa: [],
            japaneseTerm: '',
            englishTerm: '',
            departments: [],
            departmentSelection: '',
            primary_lording: false,
        }
    },
    created: function () {
        this.getDepartments();
    },
    methods: {
        register: function (event) {
            axios
                .post('/api/user_terms', {
                    'japaneseTerm': this.japaneseTerm,
                    'englishTerm': this.englishTerm,
                    'department': this.departmentSelection,
                })
                .then(response => {
                    this.japaneseTerm = '';
                    this.englishTerm = '';
                    this.$message('登録完了', 'success');
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        // TODO メッセージはサーバーで作る
                        // TODO TODO コメントを消す
                        this.$message.error('空欄を埋めてね');
                    } else if (error.response.status === 500) {
                        this.$message.error('その単語は登録済みです');
                    }
                })
        },
        getDepartments: function (event) {
            axios
                .get('/api/departments')
                .then(response => {
                    this.departments = response.data.departments;
                })
                .catch(error => {
                })
        }
    }
}
</script>