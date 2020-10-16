import { axios } from '../helpers';

export default {
    state: {
        mail: {},
        mailLoadStatus: 0,
        mails: [],
        mailsLoadStatus: 0,
    },
    getters: {
        getMail(state) {
            return state.mail;
        },
        getMailLoadStatus(state) {
            return state.mailLoadStatus;
        },
        getMails(state) {
            return state.mails;
        },
        getMailsLoadStatus(state) {
            return state.mailsLoadStatus;
        },
    },
    mutations: {
        setMail(state, mail) {
            state.mail = mail;
        },
        setMailLoadStatus(state, mailLoadStatus) {
            state.mailLoadStatus = mailLoadStatus;
        },
        setMails(state, mails) {
            state.mails = mails;
        },
        setMailsLoadStatus(state, mailsLoadStatus) {
            state.mailsLoadStatus = mailsLoadStatus;
        },
    },
    actions: {
        getMail({ commit }, id) {
            commit('setMailLoadStatus', 1);

            axios
                .get('/inbox-api/' + id)
                    .then(response => {
                        commit('setMail', response.data);
                        commit('setMailLoadStatus', 2);
                    }).catch(() => {
                        commit('setMail', {});
                        commit('setMailLoadStatus', 3);
                    });
        },
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