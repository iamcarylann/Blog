<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from "@inertiajs/vue3";
import { useForm } from '@inertiajs/vue3';

defineOptions({
    layout: MyLayout
});

const form = useForm({
    title: '',
    content: '',
    image: '',
});

const submit = () => {
    form.post('/post/create');
};
</script>

<template>
    <Head>
        <title>Create</title>
    </Head>

    <div class="flex justify-center p-8 overflow-hidden">
        <div class="w-full max-w-md">
            <h1 class="text-4xl my-10 text-center text-gray-800">Create New Post</h1>

            <div class="border p-10 rounded item flex flex-col items-center bg-white shadow-md">
                <form @submit.prevent="submit" class="w-full">
                    <div class="mb-4 w-full flex flex-col items-center">
                        <label class="mb-2 text-gray-800">Title:</label>
                        <input class="w-3/4 rounded-md py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent" v-model="form.title" type="text">
                    </div>
                    <div class="mb-4 w-full flex flex-col items-center">
                        <label class="mb-2 text-gray-800">Content:</label>
                        <textarea class="w-3/4 rounded-md py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent" v-model="form.content"></textarea>
                    </div>
                    <div class="mb-4 w-full flex flex-col items-center">
                        <label class="mb-2 text-gray-800">Thumbnail:</label>
                        <input class="w-3/4 rounded-md py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent" v-model="form.image" type="text">
                    </div>

                    <div class="w-full flex justify-center">
                        <Link href="/post" class="btn m-2 px-3 py-2 rounded text-white bg-gray-800">Back</Link>
                        <button type="submit" class="btn m-2 px-3 py-2 rounded text-white bg-pink-500">Submit</button>
                    </div>
                </form>        
            </div>
        </div>
    </div>
</template>