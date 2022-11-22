<template>
    <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-neutral-500 mb-3">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
                <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="#pablo">
                    なんちゃって商品サイト
                </a>
                <button class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" @click="showMenu = !showMenu">
                    <!-- <i class="fas fa-bar"></i> -->
                    <i class="fa-sharp fa-solid fa-bars"></i>
                </button>
            </div>
            <div v-bind:class="{ 'hidden': !showMenu, 'flex': showMenu }" class="lg:flex lg:flex-grow items-center">
                <ul class="flex flex-col lg:flex-row list-none ml-auto">
                    <li class="nav-item">
                        <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#pablo">
                            <i class="fab fa-facebook-square text-lg leading-lg text-white opacity-75" /><span class="ml-2">Share</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#pablo">
                            <i class="fab fa-twitter text-lg leading-lg text-white opacity-75" /><span class="ml-2">Tweet</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('logout')" method="post" as="button" class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#pablo">
                            <span class="ml-2">Logout</span>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>


<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { ref } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const showMenu = ref(false);

const user = computed(() => usePage().props.value.auth.user);
</script>
