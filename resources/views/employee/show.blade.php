<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're on Employees page!") }}
                </div>
                <div class="mb-3 ml-2">
                    <x-primary-button><a href= '/employees/create/'>{{ __('Create') }}</a></x-primary-button>
                </div>
                <table id="employees" class="table dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company ID</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->firstName }}</td>
                                <td>{{ $employee->lastName }}</td>
                                <td>{{ $employee->company_id }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>
                                    <button><a href= '/employees/{{ $employee->id }}/edit'>{{ __('Edit') }}</a></button>
                                </td>
                                <td>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class='text-red-500'>
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <script src="https://cdn.datatables.net/v/dt/dt-1.11.10/datatables.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#employees').DataTable();
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
