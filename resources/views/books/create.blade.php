<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 px-4 py-2 mb-6 text-sm font-medium
          text-gray-700 bg-gray-100 rounded-lg shadow
          hover:bg-gray-200 hover:text-gray-900
          focus:outline-none focus:ring-2 focus:ring-gray-300 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>



        <!-- Title -->
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Add New Book</h1>

        <!-- Form -->
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-xl rounded-2xl p-8 space-y-6 border border-gray-100">
            @csrf

            <!-- Title -->
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700">Title</label>
                <input type="text" name="title" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
            </div>

            <!-- Author -->
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700">Author</label>
                <input type="text" name="author"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
            </div>

            <!-- Quantity + Year -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Quantity</label>
                    <input type="number" name="quantity" min="0" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Published Year</label>
                    <input type="number" name="published_year"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700">Description</label>
                <textarea name="description" rows="4"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"></textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700">Book Image</label>
                <input type="file" name="image" class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0
                           file:text-sm file:font-semibold
                           file:bg-indigo-50 file:text-indigo-700
                           hover:file:bg-indigo-100 cursor-pointer">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3 px-6 text-lg font-semibold text-white bg-indigo-600 rounded-xl shadow hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-400 transition">
                Save Book
            </button>
        </form>
    </div>
</x-app-layout>
