<x-app-layout>
    <div class="flex justify-center items-center h-screen" >

        <form method="POST" action="{{ route('companies.update',$companies->id) }}"  class="mt-6 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div>
                <h1 class="font-bold text-gray-500 ml-6 ">
                    Update a Company!
                </h1>
            </div>
            <div>
                <div class="form-group row ml-3">
                    <div class="col-md-6 mt-2">
                        <input id="name" name="name" type="text" placeholder="Company Name" value="{{ old('name', $companies->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                </div>
                <div class="form-group row ml-3">
                    <div class="col-md-6 mt-2">
                        <input id="email" name="email" type="email" placeholder="Email" value="{{ old('email', $companies->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                    </div>
                </div>
                <div class="form-group row ml-3">
                    <div class="col-md-6 mt-2">
                        <input id="logo" name="logo" type="text" placeholder="Logo" value="{{ old('logo', $companies->logo) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                    </div>
                </div>
                <div class="form-group row ml-3">
                    <div class="col-md-6 mt-2">
                        <input id="website" name="website" placeholder="Website" value="{{ old('website', $companies->website) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                    </div>
                </div>
            </div>
            <div class="flex items-center ml-2">
                <x-primary-button>
                        {{ __('Update') }}
                </x-primary-button>

            </div>
        </form>
    </div>
</x-app-layout>
