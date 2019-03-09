<template>

  <el-container>
    <el-header>
        <h1>単語の一覧</h1>
    </el-header>
    <el-main>
        <el-tabs :tab-position="tabPosition" v-model="id" @tab-click="select">
            <el-tab-pane v-for="department in this.departments" 
                       :name="String(department.id)" 
                       :key="department.name" 
                       :label="department.name">
                <el-table
                    :data="terms"
                    style="width: 100%">
                    <el-table-column
                        prop="japaneseTerm"
                        label="日本語"
                        width="180">
                    </el-table-column>
                    <el-table-column
                        prop="englishTerm"
                        label="英語"
                        width="180">
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>
    </el-main>
  </el-container>
</template>

<script>
export default {
    data: function () {
        return {
            japaneseTerm: '',
            englishTerm: '',
            departments: [],
            departmentSelection: '',
            primary_lording: false,
            tabPosition: 'left',
            id: "1",
            terms: [],
        }
    },
    created: function () {
        this.getDepartments();
        this.select();
    },
    methods: {
        select: function (event) {
            axios
                .get('/api/terms/_department/' + this.id)
                .then(response => {
                    this.terms = response.data.terms;
                })
                .catch(error => {
                })
        },
        getDepartments: function (event) {
            axios
                .get('/api/departments')
                .then(response => {
                    response.data.departments.forEach((department) => {
                        this.departments.push(department);
                    })
                }).catch(error => {
                })
        }
    }
}
</script>