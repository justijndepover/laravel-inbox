<template>
    <div>
        <div class="bg-white border-b shadow-sm flex items-center justify-between">
            <div class="flex items-center p-4">
                <svg class="w-5 h-5 mr-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>

                <span class="text-md text-gray-900">
                    <span v-if="mailLoadStatus == 2">{{ mail.subject }}</span>
                    <span v-else>&nbsp;</span>
                </span>
            </div>

            <button class="p-2 m-2 rounded hover:bg-gray-100 transition duration-100" @click="deleteMail">
                <svg class="w-5 h-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>

        <div class="flex-1 p-4 lg:p-8 overflow-scroll">
            <div class="bg-white rounded-lg border p-6 shadow-sm" v-if="mailLoadStatus == 2">
                <div class="border-b text-sm pb-4 mb-4 flex justify-between">
                    <div class="flex-1">
                        <div>
                            <label class="font-semibold">From: </label>
                            <span>{{ mail.from_name }}</span>
                            <a :href="'mailto:' + mail.from_email" class="text-gray-600">&lt;{{ mail.from_email }}&gt;</a>
                        </div>

                        <div>
                            <label class="font-semibold">To: </label>
                            <span>{{ mail.to_name }}</span>
                            <a :href="'mailto:' + mail.to_email" class="text-gray-600">&lt;{{ mail.to_email }}&gt;</a>
                        </div>

                        <div v-if="mail.cc">
                            <div v-for="(emailaddress, name) in mail.cc">
                                <label class="font-semibold">CC: </label>
                                <span>{{ name }}</span>
                                <a :href="'mailto:' + emailaddress" class="text-gray-600">&lt;{{ emailaddress }}&gt;</a>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div>
                        <span class="text-sm text-gray-600">{{ mail.created_at }}</span>
                    </div>
                </div>

                <div class="">
                    <iframe :src="'/inbox-api/' + mail.id + '/template'" class="w-full" onload="this.height = 0; this.height=this.contentWindow.document.body.scrollHeight;"></iframe>
                </div>
            </div>

            <div class="flex justify-center pt-8">
                <a href="https://justijn.com" target="_blank" class="block w-6 text-gray-200 hover:text-gray-600 transition duration-300">
                    <svg class="" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 300 300" fill="currentColor">
                        <path d="M150,5.1L4.6,203.7L150,294.9l145.4-91.2L150,5.1z M150,272.3L32.1,198.4l31.7-43.3l27.8,17.4l-13.8,18.8 l36.5,22.9v-72.7V86.2L150,37.4V272.3z M185.7,141.5l36.5,49.8l-36.5,22.9V141.5z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created() {
        this.$store.dispatch('getMail', this.$route.params.id);
    },
    computed: {
        mail() {
            return this.$store.getters.getMail;
        },
        mailLoadStatus() {
            return this.$store.getters.getMailLoadStatus;
        },
    },
    methods: {
        deleteMail() {
            this.$store.dispatch('setDeleteMail', this.mail.id);
        },
    },
    watch: {
        '$route': function () {
            this.$store.dispatch('getMail', this.$route.params.id);
        }
    }
}
</script>