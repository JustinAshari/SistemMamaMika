<script setup>
import { ref, onMounted } from 'vue';
import FormPesan from '@/ComponentsFrontEnd/FormPesan.vue';

const props = defineProps({
  products: {
    type: Array,
    default: () => [], // Pastikan ada default value
  },
});
</script>

<template>
  <div>
    <!-- Kirim data produk ke FormPesan.vue -->
    <FormPesan :products="products" />
  </div>
</template>
