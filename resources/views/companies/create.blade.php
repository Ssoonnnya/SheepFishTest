<x-app-layout>
    <div class="flex justify-center items-center h-screen" >

    <form method="POST" action="{{ route('companies.store') }}"  enctype="multipart/form-data" class="mt-6 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
            <div>
                <h1 class="font-bold text-gray-500 ml-6 ">
                    Add a new Company!
                </h1>
            </div>
            <div class=>
                <div class="form-group row ml-3">
                    <div class="col-md-6 mt-2">
                        <input id="name" name="name"  placeholder="Company Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>

                </div>
                <div class="form-group row ml-3">
                    <div class="col-md-6 mt-2">
                        <input id="email" name="email" placeholder="Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                    </div>
                </div>
                <div class="form-group row ml-3">
                    <div class="col-md-6 mt-2">
                        <input id="website" name="website" placeholder="Website" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                    </div>
                </div>
                <div class="form-group row ml-3">
                    <div class="col-md-6 mt-2">
                        <input id="logo" type="file" name="logo" placeholder="Logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                    </div>
                </div>
            </div>
            <div class="flex items-center ml-2">
                <x-primary-button class="ms-3 ">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-app-layout>
