require("./bootstrap");
import { createApp } from "vue";

createApp({})
    .component("users-vue", require("./components/Users.vue").default)
    .mount("#app");
