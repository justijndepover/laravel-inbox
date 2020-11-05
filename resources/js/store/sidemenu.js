export default {
    state: {
        sidemenuIsOpen: false,
    },
    getters: {
        getSidemenuOpen(state) {
            return state.sidemenuIsOpen;
        }
    },
    mutations: {
        setSidemenuOpen(state, data) {
            state.sidemenuIsOpen = data;
        }
    },
    actions: {
        openSidemenu({ commit }) {
            commit('setSidemenuOpen', true);
        },
        closeSidemenu({ commit }) {
            commit('setSidemenuOpen', false);
        }
    }
}