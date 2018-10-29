import Vue from 'vue';
import Vuex from 'vuex';

import feeds from './modules/feeds';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    feeds,
  },
});
