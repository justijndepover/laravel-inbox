<template>
    <div id="app" class="flex flex-col h-screen">
        <header-navigation></header-navigation>

        <main class="flex-1 overflow-scroll flex">
            <sidebar></sidebar>

            <div class="flex-1 flex flex-col overflow-scroll">
                <router-view></router-view>
            </div>
        </main>

        <delete-modal></delete-modal>

        <div class="fixed inset-0 bg-black z-10 opacity-25 lg:hidden transition-all duration-300" @click="closeMenu" :class="sidemenuIsOpen ? '' : 'hidden'"></div>
    </div>
</template>

<script>
import Sidebar from './components/Sidebar.vue';
import HeaderNavigation from './components/HeaderNavigation.vue';
import DeleteModal from './components/DeleteModal.vue';

export default {
    name: "App",
    components: {
        Sidebar,
        HeaderNavigation,
        DeleteModal,
    },
    methods: {
        closeMenu() {
            this.$store.dispatch('closeSidemenu');
        }
    },
    computed: {
        sidemenuIsOpen() {
            return this.$store.getters.getSidemenuOpen;
        },
    }
}
</script>