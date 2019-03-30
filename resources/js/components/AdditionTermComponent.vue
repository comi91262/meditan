<template>
  <div>
    <v-tabs centered color="cyan" dark icons-and-text>
      <v-tabs-slider color="yellow"></v-tabs-slider>
      <v-tab to="/addition_term/create">
        単語の追加
        <v-icon>phone</v-icon>
      </v-tab>
      <v-tab to="/addition_term/list">
        単語の一覧と削除
        <v-icon>favorite</v-icon>
      </v-tab>
    </v-tabs>
    <router-view></router-view>
  </div>
</template>