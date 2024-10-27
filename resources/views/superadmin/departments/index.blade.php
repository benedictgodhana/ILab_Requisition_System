<x-layouts.super-admin-layout title="Departments List">

    <div class="h-screen flex flex-col">
        <div class="flex-1 overflow-y-auto max-h-full p-6">
            <div class="bg-white shadow-md rounded-lg p-6">

                @if(session('success'))
                <div id="successAlert" class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold">Departments List</h2>
                    <a href="{{ route('departments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Add Department</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200" id="departmentsTable">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Department Name</th>
                                <th class="py-2 px-4 border-b">Description</th>
                                <th class="py-2 px-4 border-b">Created By</th>
                                <th class="py-2 px-4 border-b">Updated By</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr class="text-center">
                                <td class="py-2 px-4 border-b">{{ $department->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $department->description }}</td>
                                <td>{{ $department->user->name ?? 'N/A' }}</td>
                                <td>{{ $department->updater->name ?? 'N/A' }}</td>


                                <td class="py-2 px-4 border-b flex justify-center space-x-2">
                                    <a href="{{ route('departments.show', $department->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded flex items-center hover:bg-blue-600 transition">
                                        <i class="fa fa-eye mr-1"></i> View
                                    </a>
                                    <a href="{{ route('departments.edit', $department->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded flex items-center hover:bg-yellow-600 transition">
                                        <i class="fa fa-pencil-alt mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded flex items-center hover:bg-red-600 transition">
                                            <i class="fa fa-trash mr-1"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Font Awesome and DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#departmentsTable').DataTable({
                "searching": true,
                "paging": true,
                "lengthChange": true,
                "order": [
                    [0, "asc"]
                ],
                "language": {
                    "search": "<span class='text-gray-600'>Search:</span>",
                    "searchPlaceholder": "Enter department name"
                }
            });

            // Hide success alert after 3 seconds
            setTimeout(function() {
                $('#successAlert').fadeOut();
            }, 3000);
        });
    </script>

</x-layouts.super-admin-layout>
