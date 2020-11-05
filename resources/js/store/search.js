export default {
    state: {
        search: '',
    },
    getters: {
        getSearch(state) {
            return state.search;
        }
    },
    mutations: {
        setSearchState(state, data) {
            state.search = data;
        }
    },
    actions: {
        setSearch({ commit }, data) {
            commit('setSearchState', data);
        },
    }
}