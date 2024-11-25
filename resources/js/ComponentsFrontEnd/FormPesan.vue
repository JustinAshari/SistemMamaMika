<template>
  <div class="min-h-screen bg-red-50 py-16">
    <div class="max-w-md mx-auto bg-red-100 shadow-md rounded p-6 mt-24">
      <h2 class="text-2xl font-semibold mb-4">Form Pemesanan</h2>
      <form @submit.prevent="submitOrder">
        <!-- Nama -->
        <div class="mb-4">
          <label for="nama_pembeli" class="block text-sm font-medium text-gray-700">Nama</label>
          <input
            type="text"
            id="nama_pembeli"
            v-model="form.nama_pembeli"
            required
            placeholder="Masukkan nama"
            class="mt-1 block w-full p-2 border border-gray-300 rounded"
          />
          <div v-if="form.errors.nama_pembeli" class="text-red-500 text-sm mt-1">
            {{ form.errors.nama_pembeli }}
          </div>
        </div>

        <!-- Alamat -->
        <div class="mb-4">
          <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
          <input
            type="text"
            id="alamat"
            v-model="form.alamat"
            required
            placeholder="Masukkan alamat"
            class="mt-1 block w-full p-2 border border-gray-300 rounded"
          />
          <div v-if="form.errors.alamat" class="text-red-500 text-sm mt-1">
            {{ form.errors.alamat }}
          </div>
        </div>

        <!-- Menu -->
        <div class="mb-4">
          <label for="menu" class="block text-sm font-medium text-gray-700">Menu</label>
          <select
            id="product_id"
            v-model="form.product_id"
            required
            class="mt-1 block w-full p-2 border border-gray-300 rounded"
          >
            <option value="" disabled>Pilih menu</option>
            <option
              v-for="product in products"
              :key="product.id"
              :value="product.id"
            >
              {{ product.nama_barang }}
            </option>
          </select>
          <div v-if="form.errors.product_id" class="text-red-500 text-sm mt-1">
            {{ form.errors.product_id }}
          </div>
        </div>

        <!-- Jumlah -->
        <div class="mb-4">
          <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah Pesanan</label>
          <input
            type="number"
            id="jumlah"
            v-model="form.jumlah"
            required
            min="1"
            placeholder="Masukkan jumlah pesanan"
            class="mt-1 block w-full p-2 border border-gray-300 rounded"
          />
          <div v-if="form.errors.jumlah" class="text-red-500 text-sm mt-1">
            {{ form.errors.jumlah }}
          </div>
        </div>

        <!-- Total -->
        <div class="mb-4">
          <label for="total" class="block text-sm font-medium text-gray-700">Total Harga</label>
          <input
            type="text"
            :value="formattedTotal"
            disabled
            class="mt-1 block w-full p-2 border border-gray-300 rounded bg-gray-200"
          />
        </div>

        <!-- Pembayaran -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
          <div class="flex items-center mt-1">
            <input
              type="radio"
              id="cod"
              value="COD"
              v-model="form.payment"
              required
              class="mr-2"
            />
            <label for="cod" class="mr-4">COD</label>
            <input
              type="radio"
              id="qris"
              value="QRIS"
              v-model="form.payment"
              required
              class="mr-2"
            />
            <label for="qris">QRIS</label>
          </div>
          <div v-if="form.errors.payment" class="text-red-500 text-sm mt-1">
            {{ form.errors.payment }}
          </div>
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          :disabled="form.processing"
          class="w-full bg-red-300 text-black py-2 rounded hover:bg-red-400 disabled:opacity-50"
        >
          {{ form.processing ? 'Memproses...' : 'Pesan Sekarang' }}
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { computed } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
  products: {
    type: Array,
    default: () => [],  
  },
});

const form = useForm({
  nama_pembeli: '',
  alamat: '',
  product_id: '',
  jumlah: 1,
  payment: '',
});

const selectedProduct = computed(() => {
  return props.products.find((product) => product.id === form.product_id) || { harga: 0 };
});

const formattedTotal = computed(() => {
  const total = selectedProduct.value.harga * form.jumlah;
  return new Intl.NumberFormat('id-ID', { 
    style: 'currency', 
    currency: 'IDR' 
  }).format(total);
});

const submitOrder = () => {
  form.post(route('order.store'), {
    forceFormData: true,
    onSuccess: () => {
      form.reset();  // Reset form setelah berhasil
      // Anda bisa menambahkan pengalihan jika perlu
      // window.location.href = "/order";  // Contoh jika ingin mengarahkan pengguna ke halaman lain
    },
    onError: (errors) => {
      console.log(errors);  // Untuk debugging error yang terjadi
    },
    preserveScroll: true
  });
};

</script>
