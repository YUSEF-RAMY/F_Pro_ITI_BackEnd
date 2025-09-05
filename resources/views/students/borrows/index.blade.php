<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8">📚 الكتب التي استعرتها</h1>

        @if($borrows->isEmpty())
            <div class="text-gray-500 text-center">لم تقم باستعارة أي كتاب بعد.</div>
        @else
            <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2">
                @foreach ($borrows as $borrow)
                    @php $book = $borrow->book; @endphp
                    @if($book)
                    <div class="bg-white shadow-md rounded-2xl overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="overflow-hidden">
                            <img src="{{ $book->imagePath ? asset('storage/' . $book->imagePath) : asset('images/default-1.jpg') }}"
                                alt="{{ $book->title }}"
                                class="w-full h-48 object-cover transform transition duration-500 hover:scale-110 hover:rotate-2">
                        </div>
                        <div class="p-5 flex flex-col justify-between ">
                            <div>
                                <h2 class="text-lg font-bold text-gray-900 truncate">{{ $book->title }}</h2>
                                <p class="text-sm text-gray-500 mb-4">{{ $book->author }}</p>
                                <p class=""><strong>Borrowed at:</strong>{{ $borrow->borrow_date ? \Carbon\Carbon::parse($borrow->borrow_date)->format('Y-m-d') : $borrow->created_at->format('Y-m-d') }}</p>
                                <p><strong>Status:</strong> {{ $borrow->status }}</p>
                            </div>
                            <div class="flex gap-3 mt-2">
                                <a href="{{ route('books.show', $book->id) }}"
                                    class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-white rounded-xl bg-indigo-600 hover:bg-indigo-700 shadow transition">
                                    Show details
                                </a>
                            </div>
                            <form action="{{ route('borrows.return', $borrow->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-white rounded-xl bg-red-600 hover:bg-red-700 shadow transition">
                                    return
                                            </button>
                                        </form>
                            
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>