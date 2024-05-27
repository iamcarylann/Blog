<template>
    <Head>
        <title>My Posts</title>
    </Head>

    <div class="fadeIn mx-[5rem] my-[2rem] relative">
        <div class="fixed top-[4rem] right-[4rem] z-50 flex items-center  p-5 justify-between">
            <div class="fixed top-[4rem] right-[4rem] z-50 flex items-center p-5 justify-between trend-container">
    <div > 
        <p class="text-2xl font-bold mx-2">Trends    
            <Link href='/post/create' class="bg-pink-600 text-white rounded font-bold p-2 hover:bg-pink-700">
                &nbsp;&nbsp;+&nbsp;&nbsp;
            </Link>
        </p>
    </div>
</div>

</div>


        <div class="mt-[9rem] grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 ">
            <div v-for="(post, index) in posts" :key="post.id" class="border p-4 bg-pink-100 rounded shadow cardSlide" :style="`animation-delay: ${index * 0.1}s;`">
                <img :src="post.image" alt="Post Image" class="w-full h-48 object-cover rounded-md mb-4"> 
                <p class="text-lg font-semibold text-pink-800">Title: {{ post.title }}</p>
                <div class="flex items-center justify-between">
                    <p class="text-md text-pink-600">Content: {{ post.content }}</p>
                    <div class="relative">
                        <button @click="toggleDropdown(index)" class="focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-4 h-4 text-gray-400 hover:text-gray-600">
                                <path fill-rule="evenodd" d="M2 7a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm7 0a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm7 0a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg>
                        </button>
                        <div v-if="isOpen === index" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg z-10" @click.away="isOpen = null">
                            <Link :href="`/post/${post.id}/edit`" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 hover:text-gray-900">Edit</Link>
                            <button @click="deletePost(post)" class="block w-full px-4 py-2 text-sm text-red-800 hover:bg-red-100 hover:text-gray-900">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link, useForm } from "@inertiajs/vue3";
import { ref } from 'vue';

defineOptions({
    layout: MyLayout
});

const props = defineProps({
    posts: Array
});

const form = useForm({
    title: props.posts.title,
    content: props.posts.content,
    image: props.posts.image,
});

const deletePost = (post) => {
    const del = confirm("Are you sure you want to delete?");
    if (del) {
        form.delete(`/post/${post.id}`, {
            preserveScroll: true
        }).then(() => {
            // Handle success or other actions after deletion
        });
    }
};

const isOpen = ref(null);

const toggleDropdown = (index) => {
    isOpen.value = isOpen.value === index ? null : index;
};
</script>
<style>
    /* Custom CSS class for adjusting the width */
.trend-container {
    width: 1350px; /* Adjust the width as per your requirement */
}

</style>