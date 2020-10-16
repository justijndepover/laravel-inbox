import { axios } from '../helpers';

export default {
    state: {
        mails: [],
        mailsLoadStatus: 0,
    },
    getters: {
        getMails(state) {
            return state.mails;
        },
        getMailsLoadStatus(state) {
            return state.mailsLoadStatus;
        },
    },
    mutations: {
        setMails(state, mails) {
            state.mails = mails;
        },
        setMailsLoadStatus(state, mailsLoadStatus) {
            state.mailsLoadStatus = mailsLoadStatus;
        },
    },
    actions: {
        getMails({ commit }) {
            commit('setMailsLoadStatus', 1);

            axios
                .get('/inbox-api')
                    .then(response => {
                        commit('setMails', response.data);
                        commit('setMailsLoadStatus', 2);
                    }).catch(() => {
                        commit('setMails', {});
                        commit('setMailsLoadStatus', 3);
                    });
        },
    }
}