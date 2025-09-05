<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-indigo-50 via-white to-pink-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Students Card -->
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <div
                        class="bg-white/70 backdrop-blur-lg shadow-lg rounded-4xl p-6 flex items-center gap-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl border border-purple-200">
                        <div
                            class="text-purple-600 text-5xl p-5 bg-purple-50 rounded-2xl shadow-inner flex items-center justify-center">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        
                        <div>
                            <h3 class="text-gray-600 uppercase tracking-wide text-sm">Total Students</h3>
                            <p class="text-3xl font-extrabold text-gray-800">{{ $totalStudents ?? 0 }}</p>
                            @if (@Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{ route('students.index') }}" class="text-amber-600 hover:underline">
                                <i class="fa-solid fa-eye"></i> Show
                            </a>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Books Card -->
                <div
                    class="bg-white/70 backdrop-blur-lg shadow-lg rounded-4xl p-6 flex items-center gap-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl border border-emerald-200">
                    <div
                        class="text-emerald-600 text-5xl p-5 bg-emerald-50 rounded-2xl shadow-inner flex items-center justify-center">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <div>
                        <h3 class="text-gray-600 uppercase tracking-wide text-sm">Total Books</h3>
                        <p class="text-3xl font-extrabold text-gray-800">{{ $totalBooks ?? 0 }}</p>
                        @if (@Auth::check())
                        <a href="{{ route('books.index') }}" class="text-amber-600 hover:underline">
                            <i class="fa-solid fa-eye"></i> Show
                        </a>
                        @endif

                    </div>
                </div>

              <!-- Borrows Card -->
<div
    class="bg-white/70 backdrop-blur-lg shadow-lg rounded-4xl p-6 flex items-center gap-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl border border-amber-200">
    <div
        class="text-amber-600 text-5xl p-5 bg-amber-50 rounded-2xl shadow-inner flex items-center justify-center">
        <i class="fa-solid fa-handshake"></i>
    </div>
    <div>
        <h3 class="text-gray-600 uppercase tracking-wide text-sm">Total Borrows</h3>
        <p class="text-3xl font-extrabold text-gray-800">{{ $totalBorrows ?? 0 }}</p>

        {{-- اللينك يظهر للأدمن فقط --}}
        @if(Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('admin.returnedBooks') }}" class="text-amber-600 hover:underline">
                <i class="fa-solid fa-eye"></i> Show
            </a>
        @endif
    </div>
</div>

<!-- Returned Books Card (Admin Only) -->
@if(Auth::check() && Auth::user()->role === 'admin')
    <div
        class="bg-white/70 backdrop-blur-lg shadow-lg rounded-4xl p-6 flex items-center gap-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl border border-amber-200">
        <div
            class="text-amber-600 text-5xl p-5 bg-amber-50 rounded-2xl shadow-inner flex items-center justify-center">
            <i class="fa-solid fa-right-left"></i>
        </div>
        <div>
            <h3 class="text-gray-600 uppercase tracking-wide text-sm">Total Returned</h3>
            <p class="text-3xl font-extrabold text-gray-800">{{ $redeemedBooks ?? 0 }}</p>

            <a href="{{ route('admin.returnedBooks') }}" class="text-amber-600 hover:underline">
                <i class="fa-solid fa-eye"></i> Show
            </a>
        </div>
    </div>
@endif


            </div>

        </div>
    </div>
</x-app-layout>
