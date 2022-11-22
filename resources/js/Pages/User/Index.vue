<template>
    <Navbar />

<!-- card comonent -->
<div class="grid grid-cols-1 sm:grid-cols-3 m-3">
    <div v-for="product in props.products" class="¥rounded-lg shadow-lg bg-white max-w-sm">
        <a href="#!">
            <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="" />
        </a>
        <div class="p-6">
            <h5 class="text-gray-900 text-xl font-medium mb-2">{{ product.name }}</h5>
            <p class="text-gray-700 text-base mb-4">{{ product.content }}
      </p>
            <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Button</button>
        </div>
    </div>
</div>

<div id="footer">
    <Footer />
</div>
</template>


<script setup>
import Navbar from '@/components/Navbar.vue';
import Footer from '@/components/Footer.vue';
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { Link } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue';

const user = computed(() => usePage().props.value.auth.user);
const props = defineProps({
    products: Object
});

const products = reactive(props);



</script>
