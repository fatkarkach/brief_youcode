import { createApp } from 'vue'
import  router from './router/index'
import App from './App.vue'
import {library} from "@fortawesome/fontawesome-svg-core"
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {fas} from "@fortawesome/free-solid-svg-icons"
import { fab } from '@fortawesome/free-brands-svg-icons';
import {far} from "@fortawesome/free-regular-svg-icons"
library.add(fas, far, fab);
const app=createApp(App)
    app.use(router)
    app.component("FAIFatma", FontAwesomeIcon)
    app.mount('#app')