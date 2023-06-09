import router from "./router";
var $ = require('jquery')



import { createApp } from "vue";
window.Vue = require("vue");

window.$ = window.jQuery = require('jquery');



import App from "./App.vue";
import '../css/app.css'


// root app instance
const app = createApp(App);

app
// .use(store)
.use(router).mount("#app");
  
