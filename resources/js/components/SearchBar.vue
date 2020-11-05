<template>
    <div class="w-full max-w-lg relative rounded">
        <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
            <span class="text-gray-500 text-sm">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
        </div>

        <input class="w-full pl-8 py-1 pr-3 text-sm leading-5 rounded bg-gray-900 focus:bg-gray-200 text-gray-500 focus:text-gray-800 focus:placeholder-gray-800 transition duration-300 focus:outline-none" type="search" placeholder="Search...">
    </div>
</template>

<script>
export default {
}
</script>
