import { axios } from '../helpers';

export default {
    state: {
        mail: {},
        mailLoadStatus: 0,
        mails: [],
        mailsLoadStatus: 0,
        mailsPage: 1,
        mailsHasNextPage: false,
        deleteMail: 0,
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
        getMailsPage(state) {
            return state.mailsPage;
        },
        getMailsHasNextPage(state) {
            return state.mailsHasNextPage;
        },
        getDeleteMail(state) {
            return state.deleteMail;
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
        setMailsPage(state, page) {
            state.mailsPage = page;
        },
        setMailsHasNextPage(state, hasNextPage) {
            state.mailsHasNextPage = hasNextPage;
        },
        markMailAsRead(state, id) {
            let mail = state.mails.find((element) => { return element.id === id })

            if (mail) {
                mail.read = true;
            }
        },
        setDeleteMail(state, id) {
            state.deleteMail = id;
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
                        commit('markMailAsRead', id);
                    }).catch(() => {
                        commit('setMail', {});
                        commit('setMailLoadStatus', 3);
                    });
        },
        getMails({ commit, state }) {
            if (state.mailsLoadStatus != 2) {
                commit('setMailsLoadStatus', 1);
            }

            axios
                .get('/inbox-api?page=' + state.mailsPage)
                    .then(response => {
                        commit('setMailsHasNextPage', (response.data.current_page < response.data.last_page));
                        commit('setMails', [...state.mails, ...response.data.data]);
                        commit('setMailsLoadStatus', 2);
                    }).catch(() => {
                        commit('setMails', {});
                        commit('setMailsLoadStatus', 3);
                    });
        },
        getNextMails({ commit, state, dispatch }) {
            commit('setMailsPage', state.mailsPage + 1);
            dispatch('getMails');
        },
        refreshMails({ commit, dispatch }) {
            commit('setMails', []);
            commit('setMailsLoadStatus', 1);
            commit('setMailsPage', 1);
            commit('setMailsHasNextPage', false);
            dispatch('getMails');
        },
        setDeleteMail({ commit }, id) {
            commit('setDeleteMail', id);
        },
        deleteMail({ commit, state, dispatch }) {
            axios
                .delete('/inbox-api/' + state.deleteMail)
                    .then(response => {
                        commit('setDeleteMail', 0);
                        dispatch('getMails');
                    }).catch(() => {
                        commit('setDeleteMail', 0);
                    });
        }
    }
}