<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden p-6">

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


            <!-- Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Image -->
                <div class="overflow-hidden rounded-xl shadow-md">
                    <img src="{{ $book->imagePath ? asset('storage/' . $book->imagePath) : asset('images/default-1.jpg') }}"
                        alt="{{ $book->title }}"
                        class="w-full h-72 object-cover transform transition duration-500 hover:scale-105 hover:translate-y-1">
                </div>

                <!-- Info -->
                <div class="flex flex-col justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $book->title }}</h1>
                        <p class="text-lg text-gray-700 mb-2">
                            ✍️ <span class="font-semibold">Author:</span> {{ $book->author }}
                        </p>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            {{ $book->description ?? 'No description available.' }}
                        </p>
                        <p class="text-sm font-medium text-gray-500">
                            📦 Quantity available: <span class="text-gray-800">{{ $book->quantity }}</span>
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 mt-8">
                        <!-- Edit -->
                        <a href="{{ route('books.edit', $book->id) }}"
                            class="flex-1 inline-flex items-center justify-center gap-2 px-5 py-3 text-base font-semibold text-white bg-yellow-500 rounded-xl hover:bg-yellow-600 shadow transition">
                            Edit
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 text-base font-semibold text-white bg-red-600 rounded-xl hover:bg-red-700 shadow transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>