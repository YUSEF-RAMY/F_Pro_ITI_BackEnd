<x-app-layout>
    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable');
        });
    </script>
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Borrows Card -->
    <div>
        <button type="button"
            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Returned Books
            <span
                class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                {{ $redeemedBooks ?? 0 }}
            </span>
        </button>
        <button type="button"
            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Borrowed Books
            <span
                class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                {{ $totalBorrows ?? 0 }}
            </span>
        </button>

    </div>
    <!-- returned Books Card -->
   

    <table id="myTable" class="display table table-hover table-striped">
        <thead>
            <tr>
                <th>Borrow ID</th>
                <th>User</th>
                <th>Book</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($returnedBooks as $borrow)
                <tr>
                    <td>{{ $borrow->id }}</td>
                    <td>{{ $borrow->user->name }}</td> {{-- اسم الشخص --}}
                    <td>{{ $borrow->book->title }}</td> {{-- اسم الكتاب --}}
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date }}</td>
                    <td>
                        @if ($borrow->status === 'returned')
                            ✅ Returned
                        @else
                            ⏳ Borrowed
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>
