<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import PageLayout from '../PageLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
  investors: Object,
});

const investors = ref(props.investors.data);
const pagination = ref(props.investors);

const totalPages = computed(() => pagination.value.last_page);

function goToPage(page) {
  if (page >= 1 && page <= totalPages.value) {
    Inertia.get('/investors', { page }, { preserveState: true, replace: true });
  }
}
</script>

<template>
  <Head title="Investors" />

  <PageLayout>
    <br>
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold text-white">Investors</h1>
      <Link href="/investors/create">
        <PrimaryButton>Add Investor</PrimaryButton>
      </Link>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-white">
      <div v-for="investor in investors" :key="investor.id" class="border rounded-lg p-4 shadow hover:shadow-lg transition">
        <h2 class="text-lg font-semibold text-white">{{ investor.last_name }}, {{ investor.first_name }}</h2>
        <p><strong>Phone:</strong> {{ investor.phone }}</p>
        <p><strong>Address:</strong> {{ investor.address }}</p>
        <p><strong>Investment Type:</strong> {{ investor.investment_type }}</p>
      </div>
    </div>

    <div class="flex justify-center mt-6 space-x-2 text-white">
      <button
        class="px-3 py-1 border rounded disabled:opacity-50"
        :disabled="pagination.current_page === 1"
        @click="goToPage(pagination.current_page - 1)"
      >
        Previous
      </button>
      <button
        v-for="page in totalPages"
        :key="page"
        class="px-3 py-1 border rounded"
        :class="{ 'bg-blue-500 text-white': page === pagination.current_page }"
        @click="goToPage(page)"
      >
        {{ page }}
      </button>
      <button
        class="px-3 py-1 border rounded disabled:opacity-50"
        :disabled="pagination.current_page === totalPages"
        @click="goToPage(pagination.current_page + 1)"
      >
        Next
      </button>
    </div>
  </PageLayout>
</template>
