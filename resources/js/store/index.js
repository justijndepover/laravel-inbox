import Vue from 'vue';
import Vuex from 'vuex';
import mails from './mails';
import search from './search';
import sidemenu from './sidemenu';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        mails,
        search,
        sidemenu,
    }
});