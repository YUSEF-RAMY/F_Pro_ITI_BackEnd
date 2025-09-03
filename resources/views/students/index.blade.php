<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Header -->
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900">👨‍🎓 All Students</h1>
            <a href="{{ route('students.create') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-white
                bg-green-600 rounded-lg shadow hover:bg-green-700 focus:outline-none focus:ring-2
                focus:ring-green-400 transition">
                + Add Student
            </a>
        </div>

        <!-- Students Grid -->
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($students as $student)
                <div
                    class="bg-white shadow-md rounded-2xl overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                    <!-- Student Image -->
                    <div class="overflow-hidden">
                        <img src="{{ $student->imagePath ? asset('storage/' . $student->imagePath) : asset('images/default-1.jpg') }}"
                            alt="{{ $student->name }}"
                            class="w-full h-48 object-cover transform transition duration-500 hover:scale-110 hover:rotate-2">
                    </div>

                    <!-- Student Info -->
                    <div class="p-5 flex flex-col justify-between h-48">
                        <div>
                            <h2 class="text-lg font-bold text-gray-900 truncate">{{ $student->name }}</h2>
                            <p class="text-sm text-gray-500 mb-4 truncate">{{ $student->email }}</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 mt-auto">
                            <!-- Show -->
                            <a href="{{ route('students.show', $student->id) }}"
                                class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-white rounded-xl bg-indigo-600 hover:bg-indigo-700 shadow transition">
                                Show
                            </a>

                            <!-- Edit -->
                            <a href="{{ route('students.edit', $student->id) }}"
                                class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-white rounded-xl bg-yellow-500 hover:bg-yellow-600 shadow transition">
                                Edit
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-white rounded-xl bg-red-600 hover:bg-red-700 shadow transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>