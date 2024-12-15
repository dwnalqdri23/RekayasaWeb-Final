<template>
    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-center">Daftar Buku</h1>
        <table class="min-w-full bg-white rounded-lg shadow-md table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border-b">Title</th>
                    <th class="px-4 py-2 border-b">Author</th>
                    <th class="px-4 py-2 border-b">Description</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- <pre>{{ books }}</pre> -->
                <tr v-for="book in books.books" :key="book.id" class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ book.title }}</td>
                    <td class="px-4 py-2 border-b">{{ book.author }}</td>
                    <td class="px-4 py-2 border-b">{{ book.description }}</td>
                    <td class="px-4 py-2 border-b">
                        <button @click="editBook(book)"
                            class="px-4 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-400">Edit</button>
                        <button @click="deleteBook(book.id)"
                            class="px-4 py-1 ml-2 text-white bg-red-500 rounded hover:bg-red-400">Delete</button>
                    </td>
                </tr>

            </tbody>
        </table>

        <div class="mt-6 text-center">
            <button @click="showAddModal = true" class="px-6 py-2 text-white bg-blue-500 rounded hover:bg-blue-400">Add
                Book</button>
        </div>

        <!-- Modal Tambah/Edit -->
        <div v-if="showAddModal || showEditModal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 modal">
            <div class="p-8 bg-white rounded-lg shadow-lg modal-content w-96">
                <h2 class="mb-4 text-2xl font-semibold text-center">{{ showEditModal ? 'Edit Book' : 'Add Book' }}</h2>
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input id="title" v-model="form.title" type="text" required
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                        <input id="author" v-model="form.author" type="text" required
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" v-model="form.description" required
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" class="px-6 py-2 text-white bg-green-500 rounded hover:bg-green-400">
                            {{ showEditModal ? 'Update' : 'Add' }}
                        </button>
                        <button type="button" @click="closeModal"
                            class="px-6 py-2 text-white bg-gray-500 rounded hover:bg-gray-400">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, reactive } from 'vue';
import { router } from '@inertiajs/vue3';

// Define props from Inertia
const books = defineProps(['books']);

// Reactive state for modals and form
const showAddModal = ref(false);
const showEditModal = ref(false);
const form = reactive({
    id: null,
    title: '',
    author: '',
    description: '',
});

// Function to handle form submission
const submitForm = () => {
    if (showEditModal.value) {
        router.put(`/books/${form.id}`, form, {
            onSuccess: () => closeModal(),
            preserveState: true,
        });
    } else {
        router.post('/books', form, {
            onSuccess: () => closeModal(),
            preserveState: true,
        });
    }
};

// Function to handle edit
const editBook = (book) => {
    showEditModal.value = true;
    form.id = book.id;
    form.title = book.title;
    form.author = book.author;
    form.description = book.description;
};

// Function to handle delete
const deleteBook = (id) => {
    if (confirm('Are you sure?')) {
        router.delete(`/books/${id}`, {
            onSuccess: () => console.log('Book deleted'),
        });
    }
};

// Function to close modals
const closeModal = () => {
    showAddModal.value = false;
    showEditModal.value = false;
    form.id = null;
    form.title = '';
    form.author = '';
    form.description = '';
};
</script>
