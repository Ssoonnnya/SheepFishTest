<x-app-layout>
    <head>
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    </head>
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
                    <x-primary-button><a href= '/companies/create/'>{{ __('Create') }}</a></x-primary-button>
                </div>
                <table id="companies" class="display ">
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
                    @foreach ($companies as $company)
                    <tbody>
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->logo }}</td>
                            <td>{{ $company->website }}</td>
                            <td>
                                <button><a href= '/companies/{{ $company->id }}/edit'>{{ __('Edit') }}</a></button>
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
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script>
        let table = new DataTable('#companies');
    </script>
</x-app-layout>
