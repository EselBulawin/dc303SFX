<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import PageLayout from '../PageLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
  investors: Object,
});

const currentPage = computed(() => props.investors.current_page);
const lastPage = computed(() => props.investors.last_page);

const pages = computed(() => {
  let pagesArray = [];
  const maxPages = 5;
  const totalPages = lastPage.value > maxPages ? maxPages : lastPage.value;
  for (let i = 1; i <= totalPages; i++) {
    pagesArray.push(i);
  }
  return pagesArray;
});
</script>

<template>
  <Head title="Investors" />

  <PageLayout>
    <br />
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold text-white">Investors</h1>
      <Link href="/investors/create" class="inline-block px-4 py-2 bg-blue-600 text-white rounded">
        Add Investor
      </Link>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-white">
      <div
        v-for="investor in investors.data"
        :key="investor.id"
        class="border rounded-lg p-4 shadow hover:shadow-lg transition"
      >
        <h2 class="text-lg font-semibold text-white">
          {{ investor.last_name }}, {{ investor.first_name }}
        </h2>
        <p><strong>Phone:</strong> {{ investor.phone }}</p>
        <p><strong>Address:</strong> {{ investor.address }}</p>
        <p><strong>Investment Type:</strong> {{ investor.investment_type }}</p>
      </div>
    </div>

    <div class="flex justify-center mt-6 space-x-2 text-white">
      <Link
        v-for="page in pages"
        :key="page"
        :href="page === 1 ? '/investors' : `/investors?page=${page}`"
        class="px-3 py-1 border rounded"
        :class="{ 'bg-blue-500 text-white': page === currentPage }"
      >
        {{ page }}
      </Link>
    </div>
  </PageLayout>
</template>
