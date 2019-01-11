const { Elm } = require('./main.elm');
const mountNode = document.getElementById('main');

Elm.Main.init({
  node: document.getElementById('main')
});