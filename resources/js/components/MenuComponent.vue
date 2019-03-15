<template>
<el-row class="tac">
  <el-col>
    <h5>ようこそ</h5>
    <el-menu
      class="el-menu-vertical-demo"
      @open="handleOpen"
      @close="handleClose"
      @select="jumpPage">
      <el-submenu index="1">
        <template slot="title">
          <span>問題をとく</span>
        </template>
        <el-menu-item-group title="種類">
          <el-menu-item index="1-1">カテゴリテスト</el-menu-item>
          <el-menu-item index="1-2" disabled>似た単語テスト(テスト運用中)</el-menu-item>
          <el-menu-item index="1-3">やり直しテスト</el-menu-item>
        </el-menu-item-group>
      </el-submenu>
      <el-menu-item index="2">
        <span>テスト履歴へ</span>
      </el-menu-item>
      <el-menu-item index="3">
        <span>単語の一覧を表示</span>
      </el-menu-item>
      <el-menu-item index="4">
        <span>単語追加</span>
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
      },
      jumpPage(key, keyPath) {
        switch (key) {
          case "1-1":
            location.href = '/select';
            break;
          case "1-3":
            location.href = '/exam_retry';
            break;
          case "2":
            this.$router.push({ path: '/history' });
            break;
          case "3":
            this.$router.push({ path: '/list' });
            break;
          case "4":
            location.href = '/add_term';
            break;

        }
      }
    }
  }
</script>