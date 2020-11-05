<template>
    <header class="bg-gray-800 flex p-3 items-center">
        <div class="pr-3 hidden lg:block">
            <a href="/" class="block w-6 text-gray-600 hover:text-indigo-600 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M2.94 6.412A2 2 0 002 8.108V16a2 2 0 002 2h12a2 2 0 002-2V8.108a2 2 0 00-.94-1.696l-6-3.75a2 2 0 00-2.12 0l-6 3.75zm2.615 2.423a1 1 0 10-1.11 1.664l5 3.333a1 1 0 001.11 0l5-3.333a1 1 0 00-1.11-1.664L10 11.798 5.555 8.835z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <div class="pr-3 block lg:hidden">
            <div class="cursor-pointer" @click="openMenu">
                <div class="w-6 mb-1 bg-gray-600 rounded" style="height:2px"></div>
                <div class="w-6 mb-1 bg-gray-600 rounded" style="height:2px"></div>
                <div class="w-6 bg-gray-600 rounded" style="height:2px"></div>
            </div>
        </div>

        <div class="flex-1 flex justify-center">
            <search-bar></search-bar>
        </div>
    </header>
</template>

<script>
import SearchBar from './SearchBar.vue';

export default {
    components: {
        SearchBar,
    },
    methods: {
        openMenu() {
            this.$store.dispatch('openSidemenu');
        },
    },
}
</script>
