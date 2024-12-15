<template>
    <div class="flex flex-col min-h-screen bg-gray-100">
        <!-- Hero Section -->
        <div class="py-20 text-black bg-white">
            <div class="container mx-auto mt-10 text-center">
                <h1 class="mb-10 text-4xl font-bold">Selamat Datang di Manajemen Buku</h1>
                <p class="mb-6 text-lg">Kelola koleksi buku Anda dengan mudah dan efisien.</p>
                <a href="/books"
                    class="px-6 py-3 font-semibold text-black bg-gray-200 rounded hover:text-white hover:transition hover:bg-black">
                    Lihat Daftar Buku
                </a>
            </div>
        </div>

        <!-- Features Section -->
        <div class="container px-6 py-16 mx-auto mt-10">
            <h2 class="mb-8 text-3xl font-semibold text-center">Kenapa Memilih Aplikasi Ini?</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Feature 1 -->
                <div class="p-6 text-center bg-white rounded shadow-lg">
                    <div class="mb-4 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7M3 7a4 4 0 004-4h10a4 4 0 004 4M3 7l9 5 9-5" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold">Manajemen Buku</h3>
                    <p class="text-gray-600">Tambah, ubah, dan hapus buku dengan mudah.</p>
                </div>

                <!-- Feature 2 -->
                <div class="p-6 text-center bg-white rounded shadow-lg">
                    <div class="mb-4 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 14l6-6m0 6l-6-6" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold">Akses Cepat</h3>
                    <p class="text-gray-600">Navigasi yang cepat dan responsif dengan Inertia.js.</p>
                </div>

                <!-- Feature 3 -->
                <div class="p-6 text-center bg-white rounded shadow-lg">
                    <div class="mb-4 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold">Mudah Digunakan</h3>
                    <p class="text-gray-600">Antarmuka yang sederhana dan intuitif.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
    </div>
    <footer class="py-6 text-white bg-black">
        <div class="container mx-auto text-center">
            <p>PART OF PDF BETA</p>
            <p>&copy; 2024 Manajemen Buku. All Rights Reserved.</p>
        </div>
    </footer>
</template>

<script setup>
// Tidak ada logic tambahan
</script>