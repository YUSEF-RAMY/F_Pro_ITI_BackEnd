<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <!-- Back Button -->
        <a href="{{ url()->previous() }}"
            class="inline-flex items-center px-4 py-2 mb-6 text-sm font-medium text-white bg-gray-700 rounded-lg shadow hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 transition">
            ← Back
        </a>

        <!-- Title -->
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Edit Book</h1>

        <!-- Form -->
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-xl rounded-2xl p-8 space-y-6 border border-gray-100">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700">Title</label>
                <input type="text" name="title" value="{{ $book->title }}" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
            </div>

            <!-- Author -->
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700">Author</label>
                <input type="text" name="author" value="{{ $book->author }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
            </div>

            <!-- Quantity + Year -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Quantity</label>
                    <input type="number" name="quantity" value="{{ $book->quantity }}" min="0" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Published Year</label>
                    <input type="number" name="published_year" value="{{ $book->published_year }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700">Description</label>
                <textarea name="description" rows="4"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">{{ $book->description }}</textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700">Book Image</label>
                @if($book->imagePath)
                    <img src="{{ asset('storage/' . $book->imagePath) }}"
                        class="w-32 h-32 object-cover mb-3 rounded-xl shadow border border-gray-200">
                @endif
                <input type="file" name="image" class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0
                           file:text-sm file:font-semibold
                           file:bg-indigo-50 file:text-indigo-700
                           hover:file:bg-indigo-100 cursor-pointer">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3 px-6 text-lg font-semibold text-white bg-indigo-600 rounded-xl shadow hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-400 transition">
                Update Book
            </button>
        </form>
    </div>
</x-app-layout>