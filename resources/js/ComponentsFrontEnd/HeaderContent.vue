<script setup>
</script>

<template>
  <nav class="px-12 w-full h-[60px] bg-[#f5ebe2] flex items-center justify-between">
    <!-- Mengatur ukuran logo menggunakan :style binding -->
    <img 
      src="@/assets/images/mama_mika.png" 
      alt="makanan_bg" 
      :style="{ height: '150px', maxHeight: '100%' }" 
    />
    <ul class="flex gap-4">
      <li>
        <Link href="/home" class="text-black hover:text-x-yellow transition duration-150 ease-in-out">Home</Link>
      </li>
      <li>
        <Link href="/contact" class="text-black hover:text-x-yellow transition duration-150 ease-in-out">Contact Us</Link>
      </li>
    </ul>
    <Link href="/login" class="bg-red-200 px-4 py-2 rounded-full text-black hover:bg-x-yellow transition duration-150 ease-in-out">Login</Link>
  </nav>
</template>
