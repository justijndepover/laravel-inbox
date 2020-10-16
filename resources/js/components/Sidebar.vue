<template>
    <div class="h-full w-full max-w-xs bg-gray-200 border-r overflow-scroll">
        <a href="#" class="block px-3 py-2 bg-gray-300 hover:bg-gray-400 border-b flex items-center text-gray-700 justify-center">
            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>

            <span class="text-sm">refresh</span>
        </a>

        <router-link v-for="mail in mails" :key="mail.id" :to="{ name: 'mail', params: {id: mail.id} }" class="block bg-white hover:bg-gray-100 text-sm" active-class="border-l-4 border-indigo-600">
            <div class="p-6 border-b">
                <div class="flex justify-between">
                    <span class="font-semibold">{{ mail.from_name }}</span>
                    <span class="text-gray-600">{{ mail.created_at }}</span>
                </div>
                <span>{{ mail.subject }}</span>
            </div>
        </router-link>
    </div>
</template>

<script>
export default {
    created() {
        this.$store.dispatch('getMails');
    },
    computed: {
        mails() {
            return this.$store.getters.getMails;
        },
        mailsLoadStatus() {
            return this.$store.getters.getMailsLoadStatus;
        }
    }
}
</script>
