<template>
    <div class="h-full w-full max-w-xs bg-gray-200 border-r overflow-scroll z-20 fixed inset-y-0 lg:relative transform transition-all duration-300 lg:translate-x-0" :class="sidemenuIsOpen ? 'translate-x-0' : '-translate-x-full'">
        <button @click="refresh" class="px-3 py-2 bg-gray-300 hover:bg-gray-400 border-b flex items-center text-gray-700 justify-center w-full">
            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>

            <span class="text-sm">refresh</span>
        </button>

        <div v-if="mailsLoadStatus == 2">
            <router-link v-for="mail in filteredMails" :key="mail.id" :to="{ name: 'mail', params: {id: mail.id} }" class="block bg-white hover:bg-gray-100 text-sm relative" active-class="border-l-4 border-indigo-600 bg-gray-100">
                <div v-if="!mail.read" class="absolute right-0 top-0 p-2">
                    <span class="w-2 h-2 bg-indigo-200 rounded-full block"></span>
                </div>

                <div class="p-6 border-b" @click="closeMenu">
                    <div class="flex justify-between">
                        <span class="font-semibold">{{ mail.to_name }}</span>
                        <span class="text-gray-600">{{ mail.created_at }}</span>
                    </div>
                    <span>{{ mail.subject }}</span>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    created() {
        this.$store.dispatch('getMails');
    },
    methods: {
        refresh() {
            this.$store.dispatch('getMails');
        },
        closeMenu() {
            this.$store.dispatch('closeSidemenu');
        },
    },
    computed: {
        mails() {
            return this.$store.getters.getMails;
        },
        filteredMails() {
            return this.mails.filter(mail => {
                return mail.tags.toLowerCase().includes(this.$store.getters.getSearch.toLowerCase());
            });
        },
        mailsLoadStatus() {
            return this.$store.getters.getMailsLoadStatus;
        },
        sidemenuIsOpen() {
            return this.$store.getters.getSidemenuOpen;
        },
    }
}
</script>
