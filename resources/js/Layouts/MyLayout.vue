<template>
    <div class="h-screen flex overflow-hidden bg-gray-100">
      <!-- Sidebar -->
      <nav class="bg-pink-500 w-64 pt-6 hidden sm:block">
        <!-- Logo -->
        <div class="flex items-center justify-center mb-10">
          <Link :href="route('dashboard')">
            <ApplicationLogo class="h-9 w-auto fill-current text-white" />
          </Link>
        </div>
  
        <!-- Navigation Links -->
        <div>
          <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
            <p class="text-white px-6 py-3">Home</p>
          </NavLink>
          <NavLink :href="route('post')" :active="route().current('post')">
            <p class="text-white px-6 py-3">Posts</p>
          </NavLink>
        </div>
  
        <!-- User Profile and Logout -->
        <div class="mt-auto">
          <div class="border-t border-pink-400">
            <div class="px-6 py-4">
              <p class="font-medium text-base text-white">{{ $page.props.auth.user.name }}</p>
              <p class="font-medium text-sm text-pink-200">{{ $page.props.auth.user.email }}</p>
            </div>
            <div class="px-6 py-3">
              
              <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
            </div>
          </div>
        </div>
      </nav>
  
      <!-- Content -->
      <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <!-- Top Bar -->
        <div class="bg-pink-500 border-b border-pink-400 px-4 py-2 sm:px-6">
          <div class="flex justify-between">
            <!-- Hamburger Button -->
            <div class="-mr-2 flex items-center sm:hidden">
              <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-pink-200 hover:text-white hover:bg-pink-600 focus:outline-none focus:bg-pink-600 focus:text-white transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path :class="{ hidden: showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  <path :class="{ hidden: !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <!-- Page Heading -->
            <div class="text-white text-lg font-semibold">
              <slot name="header" />
            </div>
          </div>
        </div>
  
        <!-- Main Content -->
        <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
          <div class="py-6 px-4 sm:px-6 lg:px-8">
            <slot />
          </div>
        </main>
      </div>
  
      <!-- Mobile Navigation Dropdown -->
      <div :class="{ 'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown }" class="sm:hidden">
        <div class="fixed inset-0 flex z-40">
          <div class="fixed inset-0">
            <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
          </div>
          <div class="relative flex-1 flex flex-col max-w-xs w-full bg-pink-500">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
              <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="text-white hover:text-gray-200 focus:outline-none focus:text-white transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path :class="{ hidden: showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  <path :class="{ hidden: !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
              </button>
            </div>
            <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
              <div class="flex-shrink-0 flex items-center px-4">
                <Link :href="route('dashboard')">
                  <ApplicationLogo class="h-8 w-auto fill-current text-white" />
                </Link>
              </div>
              <div class="mt-5 px-2 space-y-1">
                <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">Home</ResponsiveNavLink>
                <ResponsiveNavLink :href="route('profile.edit')">Profile</ResponsiveNavLink>
                <ResponsiveNavLink :href="route('logout')" method="post" as="button">Log Out</ResponsiveNavLink>
              </div>
            </div>
          </div>
          <div class="flex-shrink-0 w-14">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import ApplicationLogo from '@/Components/ApplicationLogo.vue';
  import Dropdown from '@/Components/Dropdown.vue';
  import DropdownLink from '@/Components/DropdownLink.vue';
  import NavLink from '@/Components/NavLink.vue';
  import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
  import { Link } from '@inertiajs/vue3';
  
  const showingNavigationDropdown = ref(false);
  </script>
  
  
  