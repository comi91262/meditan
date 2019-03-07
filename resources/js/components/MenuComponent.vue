<template>
<el-row class="tac">
  <el-col :span="12">
    <h5>ようこそ</h5>
    <el-menu
      default-active="2"
      class="el-menu-vertical-demo"
      @open="handleOpen"
      @close="handleClose">
      <el-submenu index="1">
        <template slot="title">
          <span>問題をとく</span>
        </template>
        <el-menu-item-group title="種類">
          <el-menu-item index="1-1"><a href='/select'>カテゴリテスト</a></el-menu-item>
          <el-menu-item index="1-2" disabled><a href='/select_condition'>似た単語テスト(テスト運用中)</a></el-menu-item>
          <el-menu-item index="1-3"><a href='/exam_retry'>やり直しテスト(テスト運用中)</a></el-menu-item>
        </el-menu-item-group>
      </el-submenu>
      <el-menu-item index="2">
        <span><a href="/history">テスト履歴へ</a></span>
      </el-menu-item>
      <el-menu-item index="3">
        <span><a href="/list">単語の一覧を表示</a></span>
      </el-menu-item>
      <el-menu-item index="4">
        <span><a href="/add_term">単語追加(テスト運用中)</a></span>
      </el-menu-item>
    </el-menu>
  </el-col>
</el-row>
</template>

<script>
  export default {
    methods: {
      handleOpen(key, keyPath) {
      },
      handleClose(key, keyPath) {
      }
    }
  }
</script>