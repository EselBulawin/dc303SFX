<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import PageLayout from '../PageLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
  investmentTypes: Array,
});

const form = useForm({
  last_name: '',
  first_name: '',
  phone: '',
  address: '',
  investment_type: '',
});

function submit() {
  form.post('/investors', {
    onSuccess: () => form.reset(),
    onError: () => {

    },
  });
}
</script>

<template>
  <Head title="Add Investor" />

  <PageLayout>
    <br>
    <div class="max-w-md mx-auto px-3 py-1 border rounded">
      <h1 class="text-2xl font-bold mb-6 text-white">Add Investor</h1>

      <form @submit.prevent="submit" novalidate>
        <div class="mb-4">
          <InputLabel htmlFor="last_name" class="text-white" value="Last Name" />
          <TextInput
            id="last_name"
            v-model="form.last_name"
            type="text"
            class="mt-1 block w-full"
            autocomplete="family-name"
            :class="{ 'border-red-500': form.errors.last_name }"
          />
          <InputError :message="form.errors.last_name" class="mt-2" />
        </div>

        <div class="mb-4">
          <InputLabel htmlFor="first_name" class="text-white" value="First Name" />
          <TextInput
            id="first_name"
            v-model="form.first_name"
            type="text"
            class="mt-1 block w-full"
            autocomplete="given-name"
            :class="{ 'border-red-500': form.errors.first_name }"
          />
          <InputError :message="form.errors.first_name" class="mt-2" />
        </div>

        <div class="mb-4">
          <InputLabel htmlFor="phone" class="text-white" value="Phone" />
          <TextInput
            id="phone"
            v-model="form.phone"
            type="text"
            class="mt-1 block w-full"
            autocomplete="tel"
            :class="{ 'border-red-500': form.errors.phone }"
          />
          <InputError :message="form.errors.phone" class="mt-2" />
        </div>

        <div class="mb-4">
          <InputLabel htmlFor="address" class="text-white" value="Address" />
          <TextInput
            id="address"
            v-model="form.address"
            type="text"
            class="mt-1 block w-full"
            autocomplete="street-address"
            :class="{ 'border-red-500': form.errors.address }"
          />
          <InputError :message="form.errors.address" class="mt-2" />
        </div>

        <div class="mb-4">
          <InputLabel htmlFor="investment_type" class="text-white" value="Investment Type" />
          <select
            id="investment_type"
            v-model="form.investment_type"
            class="mt-1 block w-full border rounded"
            :class="{ 'border-red-500': form.errors.investment_type }"
          >
            <option value="" disabled>Select investment type</option>
            <option v-for="type in investmentTypes" :key="type" :value="type">
              {{ type.charAt(0).toUpperCase() + type.slice(1) }}
            </option>
          </select>
          <InputError :message="form.errors.investment_type" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
          <Link href="/investors" class="mr-4 underline text-white hover:text-gray-500">Cancel</Link>
          <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
        </div>
      </form>
    </div>
  </PageLayout>
</template>
