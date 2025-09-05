<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Header -->
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900">📚 All Books</h1>
            @if (Auth::check() && Auth::user()->role === 'admin')
                <a href="{{ route('books.create') }}"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-white
          bg-blue-600 rounded-lg shadow hover:bg-blue-700
          focus:outline-none focus:ring-2 focus:ring-blue-400
          transition">
                    + Add Book
                </a>
            @endif

        </div>

        <!-- Books Grid -->
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2">
            @foreach ($books as $book)
                <div
                    class="bg-white shadow-md rounded-2xl overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                    <!-- Book Image -->
                    <div class="overflow-hidden">
                        <img src="{{ $book->imagePath ? asset('storage/' . $book->imagePath) : asset('images/default-1.jpg') }}"
                            alt="{{ $book->title }}"
                            class="w-full h-48 object-cover transform transition duration-500 hover:scale-110 hover:rotate-2">
                    </div>

                    <!-- Book Content -->
                    <div class="p-5 flex flex-col justify-between h-48">
                        <div>
                            <h2 class="text-lg font-bold text-gray-900 truncate">{{ $book->title }}</h2>
                            <p class="text-sm text-gray-500 mb-4">Author : {{ $book->author }}</p>
                             <p class="text-sm font-medium text-gray-500">
                            📦 Quantity available: <span class="text-gray-800">{{ $book->quantity }}</span>
                        </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 mt-auto " style="display: wrap;">
                            <!-- Show Button -->
                            <a href="{{ route('books.show', $book->id) }}"
                                class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-white rounded-xl bg-indigo-600 hover:bg-indigo-700 shadow transition">
                                Show
                            </a>
                           @if (Auth::check() && Auth::user()->role === 'student' && $book->quantity > 0)
                            
                           <form action="{{ route('borrows.store', $book->id) }}" method="POST">
                               @csrf
                               <button type="submit"
                                   class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-white rounded-xl bg-indigo-600 hover:bg-indigo-700 shadow transition">Borrow</button>
                           </form>
                           @endif
                            @if (Auth::check() && Auth::user()->role === 'admin')
                                <!-- Edit Button -->
                                <a href="{{ route('books.edit', $book->id) }}"
                                    class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-white rounded-xl bg-yellow-500 hover:bg-yellow-600 shadow transition">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-white rounded-xl bg-red-600 hover:bg-red-700 shadow transition">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
        </div>


</div>
</x-app-layout>
