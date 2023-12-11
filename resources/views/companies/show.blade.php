<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're on Companies page!") }}
                </div>
                <div class="mb-3 ml-2">
                    <x-primary-button><a href='/companies/create/'>{{ __('Create') }}</a></x-primary-button>
                </div>
                <table id="companies" class="table dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td><img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo"></td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    <button><a href='/companies/{{ $company->id }}/edit'>{{ __('Edit') }}</a></button>
                                </td>
                                <td>
                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
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
                <script>
                    $(document).ready(function () {
                        $('#companies').DataTable();
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
