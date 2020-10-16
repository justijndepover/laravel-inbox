<template>
    <div id="app" class="flex flex-col h-screen">
        <header-navigation></header-navigation>

        <main class="flex-1 overflow-scroll flex">
            <sidebar></sidebar>

            <div class="flex-1 flex flex-col overflow-scroll">
                <router-view></router-view>
            </div>
        </main>
    </div>
</template>

<script>
import Sidebar from '../components/Sidebar.vue';
import HeaderNavigation from '../components/HeaderNavigation.vue';

export default {
    name: "App",
    components: {
        Sidebar,
        HeaderNavigation,
    },
}
</script>