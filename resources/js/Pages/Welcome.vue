<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});


</script>

<template>
    <Head title="Welcome" />
    <div class="bg-pink-50 text-gray-900 dark:text-white">
        <img
            id="background"
            class="absolute top-0 left-0 w-full h-full bg-cover bg-center"
            src="https://wallpapers.com/images/hd/pink-laptop-xf8rl3joh5nkdh0v.jpg"
            style="filter: brightness(80%);"
        />
        <div
            class="relative flex flex-col items-center justify-center"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end lg:col-start-3">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-pink-500 ring-1 ring-pink-500 transition hover:text-pink-600 focus:outline-none focus-visible:ring-pink-500 dark:text-pink-500 dark:hover:text-pink-400 dark:focus-visible:ring-pink-500"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                        <Link
                            :href="route('login')"
                            class="inline-block rounded-md bg-pink-500 text-white px-6 py-3 mr-4 ring-1 ring-transparent transition hover:bg-pink-600 focus:outline-none focus-visible:ring-white"
                        >
                            Log in
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="inline-block rounded-md bg-pink-500 text-white px-6 py-3 ring-1 ring-transparent transition hover:bg-pink-600 focus:outline-none focus-visible:ring-white"
                        >
                            Register
                        </Link>
                    </template>

                    </nav>
                </header>

            </div>
        </div>
    </div>
</template>
