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
                                 :label="department.id">
                                 {{department.name}}
                </el-radio-button>
            </el-radio-group>
        </div>
        <el-button type="primary" v-on:click="register" :loading="primary_lording">登録</el-button>
        <el-table
            :data="terms"
            style="width: 100%">
            <el-table-column
                prop="term_jp"
                label="日本語"
                width="180">
            </el-table-column>
            <el-table-column
                prop="term_en"
                label="英語"
                width="180">
            </el-table-column>
            <el-table-column
                prop="department"
                label="カテゴリ"
                width="180">
            </el-table-column>
            <el-table-column>
                <template slot-scope="scope">
                 <el-button
                   size="mini"
                   type="danger"
                   @click="handleDelete(scope.$index, terms)">Delete</el-button>
                </template>
            </el-table-column>
        </el-table>
    </el-main>
  </el-container>
</div>
</template>

<script>
export default {
    props: ['user-id'],
    data: function () {
        return {
            japaneseTerm: '',
            englishTerm: '',
            departments: [],
            departmentSelection: '',
            primary_lording: false,
            terms: [],
        }
    },
    created: function () {
        this.getDepartments();
        this.getUserTerms();
    },
    methods: {
        register: function (event) {
            axios
                .post('/api/user_terms/_user/' + this.userId, {
                    'japaneseTerm': this.japaneseTerm,
                    'englishTerm': this.englishTerm,
                    'department': this.departmentSelection,
                })
                .then(response => {
                    if (response.data.result !== null) {
                        let term = response.data.result;
                        this.terms.push({
                            id: term.id,
                            term_jp: term.term_jp,
                            term_en: term.term_en,
                            department: term.department,
                        });
                        this.japaneseTerm = '';
                        this.englishTerm = '';
                        this.$message('登録完了', 'success');
                    } else {
                        this.$message.error(response.data.message);
                    }
                })
                .catch(error => {
                    this.$message.error('通信エラーです。もう一度試してください');
                })
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
        getUserTerms: function () {
            axios
                .get('/api/user_terms/_user/' + this.userId)
                .then(response => {
                    this.terms = response.data.terms;
                })
                .catch(error => {
                })

        },
        handleDelete(index, rows) {
            let id = rows[index].id;
            axios
                .delete('/api/user_terms/' + id + '/_user/' + this.userId)
                .then(response => {
                    this.$message('単語を削除しました', 'success');
                    rows.splice(index, 1);
                })
                .catch(error => {
                })
         }
    }
}
</script>