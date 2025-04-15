<script setup>
import { Head } from '@inertiajs/vue3';
import PageLayout from './PageLayout.vue';



</script>

<template>

    <Head title="About Page" />

    <PageLayout>
        <div class="max-w-md mx-auto mt-6 text-white px-3 py-1 border rounded">
            <h1 class="font-bold text-3xl">Profile Information</h1>
            <ul class="list-disc list-inside mt-2">
                <li><strong>Name: Esel</strong></li>
                <li><strong>Course &amp; Year: BSIT - 3</strong></li>
                <li><strong>Cell No.: 09982473562</strong></li>
            </ul>
        </div>
    </PageLayout>

</template>
