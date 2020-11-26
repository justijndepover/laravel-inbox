<template>
    <div v-if="show" class="absolute inset-0">
        <div class="w-full h-full flex items-start justify-center p-3 sm:items-center">
            <div v-show="show" class="shadow-sm border rounded-lg overflow-hidden w-full max-w-md z-40">
                <div class="bg-white p-4 relative">
                    <div class="absolute top-0 right-0 p-3 cursor-pointer" @click="hideModal">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>

                    <h2 class="font-semibold text-gray-700 tracking-wide mb-2">Delete mail</h2>

                    <span class="text-sm text-gray-500">Are you sure you want to delete this mail?</span>
                </div>

                <div class="bg-gray-100 p-4 flex items-center justify-end">
                    <button type="button" @click="hideModal" class="rounded-md px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm">
                        Cancel
                    </button>
                    <button type="button" @click="confirmModal" class="ml-2 rounded-md px-4 py-2 bg-indigo-500 text-indigo-100 hover:bg-indigo-400 text-sm">
                        Confirm
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-black opacity-25 inset-0 fixed z-30" @click="hideModal"></div>
    </div>
</template>

<script>
export default {
    methods: {
        hideModal() {
            this.$store.dispatch('setDeleteMail', 0);
        },
        confirmModal() {
            this.$store.dispatch('deleteMail');
            this.$router.push({ name: 'no-mail' });
        },
    },
    computed: {
        show() {
            return this.$store.getters.getDeleteMail;
        },
    },
}
</script>