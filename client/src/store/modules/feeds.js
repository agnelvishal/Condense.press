import * as apiFeeds from '@/api/feeds';

const MUTATE_FEEDS_CHANGE_START_DATE = 'MUTATE_FEEDS_CHANGE_START_DATE';
const MUTATE_FEEDS_CHANGE_END_DATE = 'MUTATE_FEEDS_CHANGE_END_DATE';
const MUTATE_FEEDS_CHANGE_SOURCE = 'MUTATE_FEEDS_CHANGE_SOURCE';
const MUTATE_FEEDS_ADD_FEEDS = 'MUTATE_FEEDS_ADD_FEEDS';

const state = {
  source: null,
  startDate: new Date(),
  endDate: new Date(),
  sources: [
    'www.bbc.com',
    'www.yourstory.com',
  ],
  feeds: [],
};


const getters = {
  source(state) {
    return state.source;
  },
  sources(state) {
    return state.sources;
  },
  startDate(state) {
    return new Date(state.startDate.getTime() - (state.startDate.getTimezoneOffset() * 60000)).toISOString().split('T')[0];
  },
  endDate(state) {
    return new Date(state.endDate.getTime() - (state.endDate.getTimezoneOffset() * 60000)).toISOString().split('T')[0];
  },
  feeds(state) {
    return state.feeds;
  },
};


const mutations = {
  [MUTATE_FEEDS_CHANGE_START_DATE]: (state, startDate) => {
    state.startDate = startDate;
  },
  [MUTATE_FEEDS_CHANGE_END_DATE]: (state, endDate) => {
    state.endDate = endDate;
  },
  [MUTATE_FEEDS_CHANGE_SOURCE]: (state, source) => {
    state.source = source;
  },
  [MUTATE_FEEDS_ADD_FEEDS]: (state, feeds) => {
    state.feeds = feeds;
  },
};

const actions = {
  setStartDate({ commit }, startDate) {
    commit(MUTATE_FEEDS_CHANGE_START_DATE, startDate);
  },
  setEndDate({ commit }, endDate) {
    commit(MUTATE_FEEDS_CHANGE_END_DATE, endDate);
  },
  setSource({ commit }, source) {
    commit(MUTATE_FEEDS_CHANGE_SOURCE, source);
  },
  async getFeeds({ commit }) {
    const response = await apiFeeds.getFeeds();
    if (response && response.data) {
      commit(MUTATE_FEEDS_ADD_FEEDS, response.data);
    }
    return response;
  },
  async getFeedsBetween({ commit, getters }) {
    const response = await apiFeeds.getFeedsBetween(getters.startDate, getters.endDate);
    console.log('get feeds');
    console.log(response);
    if (response && response.data) {
      commit(MUTATE_FEEDS_ADD_FEEDS, response.data);
    }
    return response;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions,
};
