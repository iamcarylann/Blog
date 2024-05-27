<script setup>
import { ref } from 'vue';
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

defineOptions({
    layout: MyLayout
});

const { props } = usePage();
const userName = ref(props.userName || 'Anonymous User');
</script>

<template>
    <Head>
        <title>Home</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap">
    </Head>

    <div class="overflow-hidden bg-gray-100 text-gray-900">
        <div class="py-10 fadeIn">
            <div class="relative">
                <div class="absolute inset-0 flex flex-col items-center justify-center text-gray-800 z-10" style="font-family: 'Playfair Display', serif;">
                    <p style="color:#eca1a6;text-shadow:0 0 20px #eca1a6;font-size: 50px"class="text-4xl">Welcome to Glamour Glow!</p>
                    <p style="color:#eca1a6;text-shadow:0 0 10px#eca1a6;font-size: 20px" class="text-sm mt-4 max-w-lg text-center">Welcome to Glamour Glow, where style meets innovation. Discover the latest trends, timeless tips, and radiant inspirations. Join us on this dazzling journey to uncover your inner glow!</p>
                </div>
                <div class="flex items-center opacity-75 justify-center">
                    <div class="flex">
                        <img src="../Components/b.jpg" alt="me">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
img {
    height: auto;
    width:65vw;
    border-radius: 5px;
    box-shadow: 0 0 2px gray;
}
.fadeIn {
    animation: fadeIn 1.5s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
</style>
