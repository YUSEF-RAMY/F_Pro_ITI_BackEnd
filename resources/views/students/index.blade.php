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
        {{-- <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
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
        </div> --}}
    </div>

<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($users as $student)
        <div
            class="w-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-end px-4 pt-4">
                <!-- Dropdown -->
                <button id="dropdownButton-{{ $student->id }}" data-dropdown-toggle="dropdown-{{ $student->id }}"
                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                    type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <div id="dropdown-{{ $student->id }}"
                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                    <ul class="py-2" aria-labelledby="dropdownButton-{{ $student->id }}">
                        <li>
                            <a href="{{ route('students.show', $student->id) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Show</a>
                        </li>
                        <li>
                            <a href="{{ route('students.edit', $student->id) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Delete
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                    src="{{ $student->imagePath ? asset('storage/' . $student->imagePath) : asset('images/user-1.jpeg') }}"
                    alt="{{ $student->name }}" />
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $student->name }}</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $student->phone }}</span>
                <div class="flex mt-4 md:mt-6">
                    <a href="{{ route('students.show', $student->id) }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Show</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

</x-app-layout>
