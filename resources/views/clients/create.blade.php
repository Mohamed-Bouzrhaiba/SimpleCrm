<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Client') }}

        </h2>
        @if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('clients.store') }}">
                    @csrf

                    <!-- First Name -->
                    <div>
                        <x-input-label for="client_name" :value="__('client name')" />
                        <x-text-input id="client_name" class="block mt-1 w-full" type="text" name="client_name" :value="old('client_name')" required autofocus autocomplete="client_name" />
                        <x-input-error :messages="$errors->get('client_name')" class="mt-2" />
                    </div>



                    <!-- Email -->
                    <div class="mt-4">
                        <x-input-label for="client_email" :value="__('client email')" />
                        <x-text-input id="client_email" class="block mt-1 w-full" type="email" name="client_email" :value="old('client_email')" required   />
                        <x-input-error :messages="$errors->get('client_email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="client_phone_number" :value="__('client phone number')" />
                        <x-text-input id="client_phone_number" class="block mt-1 w-full" type="text" name="client_phone_number" :value="old('client_phone_number')" required autofocus autocomplete="client_phone_number" />
                        <x-input-error :messages="$errors->get('client_phone_number')" class="mt-2" />
                    </div>

                         <div>
                        <x-input-label for="company_name" :value="__('company name')" />
                        <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autofocus autocomplete="company_name" />
                        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                    </div>

                       <div>
                        <x-input-label for="company_address" :value="__('company address')" />
                        <x-text-input id="company_address" class="block mt-1 w-full" type="text" name="company_address" :value="old('company_address')" required autofocus autocomplete="company_address" />
                        <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                    </div>

                       <div>
                        <x-input-label for="company_city" :value="__('company city')" />
                        <x-text-input id="company_city" class="block mt-1 w-full" type="text" name="company_city" :value="old('company_city')" required autofocus autocomplete="company_city" />
                        <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                     </div>

                        <div>
                        <x-input-label for="company_zip" :value="__('company zip')" />
                        <x-text-input id="company_zip" class="block mt-1 w-full" type="text" name="company_zip" :value="old('company_zip')" required autofocus autocomplete="company_zip" />
                        <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
                        </div>

                     <div>
                        <x-input-label for="company_vat" :value="__('company Vat')" />
                        <x-text-input id="company_vat" class="block mt-1 w-full" type="text" name="company_vat" :value="old('company_vat')" required autofocus autocomplete="company_vat" />
                        <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
                        </div>
                    <!-- Actions -->
                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('clients.index') }}" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 underline">
                            {{ __('Back to Clients') }}
                        </a>

                        <x-primary-button>

                            {{ __('Add Client') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
