<template>
  <div class="flex justify-center bg-red-50 pb-16 pt-16">
    <section class="flex flex-col items-center text-center rounded-none max-w-[591px] mb-6">
      <h2 class="text-lg font-bold tracking-tight leading-none text-black">
        Menu
      </h2>
      <p class="mt-1.5 text-s tracking-normal leading-4 text-neutral-500">
        Healthy Food Mama Mika menawarkan pilihan menu sehat dan lezat yang terbuat dari bahan-bahan segar. Dari salad hingga sandwich buah, setiap hidangan dirancang untuk mendukung gaya hidup sehat Anda dengan rasa yang nikmat.
      </p>
    </section>
  </div>

  <div class="flex justify-center bg-red-50 pb-16">
    <section class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 max-w-4xl">
      <!-- Loop Data -->
      <article
        v-for="product in products"
        :key="product.id"
        class="flex flex-col items-center bg-white rounded-lg shadow-md p-4"
      >
        <img
          :src="`/storage/${product.foto}`"
          :alt="product.nama_barang"
          class="object-cover w-full rounded-md h-40"
        />
        <h2 class="mt-4 text-sm font-semibold text-black text-center">
          {{ product.nama_barang }}
        </h2>
        <p class="mt-2 text-xs text-neutral-400 text-center">
          {{ product.deskripsi }}
        </p>
        <p class="mt-3 text-sm font-semibold text-black">
          Rp {{ product.harga.toLocaleString() }}
        </p>
        <Link href="/order">
          <button
            class="mt-3 px-6 py-2 text-xs font-medium text-white bg-black rounded"
          >
            Pesan
          </button>
        </Link>
      </article>
    </section>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

// Props dari Inertia.js
defineProps({
  products: Array, // Data produk diterima dari rute
});
import HeaderContent from '@/ComponentsFrontEnd/HeaderContent.vue';
import FooterContent from '@/ComponentsFrontEnd/FooterContent.vue';
</script>

<style scoped>
.container {
  max-width: 100%;
}
</style>
