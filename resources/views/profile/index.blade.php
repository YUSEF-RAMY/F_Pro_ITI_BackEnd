div<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">

            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 mb-4 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700">
                ← Back
            </a>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Student Image -->
                <div class="overflow-hidden">
                    <img src="{{ $user->imagePath ? asset('storage/' . $user->imagePath) : asset('images/user-1.jpeg') }}"
                        alt="{{ $user->name }}"
                        class="w-full h-60 object-cover rounded-lg transform transition duration-500 hover:scale-105 hover:rotate-2">
                </div>

                <!-- Student Info -->
                <div class="p-6 flex flex-col justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $user->name }}</h1>
                        <p class="text-lg text-gray-600 mb-2">Email: {{ $user->email }}</p>
                        <p class="text-lg text-gray-600 mb-2">Phone: {{ $user->phone ?? 'N/A' }}</p>
                        <p class="text-gray-500 leading-relaxed mb-6">Address: {{ $user->address ?? 'N/A' }}</p>
                    </div>

                    <div class="flex gap-4 mt-6">
                        @if ((Auth::check() && Auth::user()->role === 'admin') || Auth::id() === $user->id)
                            <a href="{{ route('students.edit', $user->id) }}"
                                class="flex-1 inline-flex items-center justify-center px-4 py-3 text-base font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600">
                                Edit
                            </a>
                        @endif
                        <form action="{{ route('students.destroy', $user->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-4 py-3 text-base font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
