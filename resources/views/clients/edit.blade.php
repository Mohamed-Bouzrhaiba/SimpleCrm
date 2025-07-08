<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('clients.update', $client->id) }}">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <x-input-label for="client_name" :value="__('Client Name')" />
                        <x-text-input
                            id="client_name"
                            class="block mt-1 w-full"
                            type="text"
                            name="client_name"
                            :value="old('client_name', $client->client_name)"
                            required
                            autofocus
                            autocomplete="client_name"
                        />
                        <x-input-error :messages="$errors->get('client_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="client_email" :value="__('Client Email')" />
                        <x-text-input
                            id="client_email"
                            class="block mt-1 w-full"
                            type="email"
                            name="client_email"
                            :value="old('client_email', $client->client_email)"
                            required
                        />
                        <x-input-error :messages="$errors->get('client_email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="client_phone_number" :value="__('Client Phone Number')" />
                        <x-text-input
                            id="client_phone_number"
                            class="block mt-1 w-full"
                            type="text"
                            name="client_phone_number"
                            :value="old('client_phone_number', $client->client_phone_number)"
                            required
                            autocomplete="client_phone_number"
                        />
                        <x-input-error :messages="$errors->get('client_phone_number')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="company_name" :value="__('Company Name')" />
                        <x-text-input
                            id="company_name"
                            class="block mt-1 w-full"
                            type="text"
                            name="company_name"
                            :value="old('company_name', $client->company_name)"
                            required
                            autocomplete="company_name"
                        />
                        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="company_address" :value="__('Company Address')" />
                        <x-text-input
                            id="company_address"
                            class="block mt-1 w-full"
                            type="text"
                            name="company_address"
                            :value="old('company_address', $client->company_address)"
                            required
                            autocomplete="company_address"
                        />
                        <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="company_city" :value="__('Company City')" />
                        <x-text-input
                            id="company_city"
                            class="block mt-1 w-full"
                            type="text"
                            name="company_city"
                            :value="old('company_city', $client->company_city)"
                            required
                            autocomplete="company_city"
                        />
                        <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="company_zip" :value="__('Company Zip')" />
                        <x-text-input
                            id="company_zip"
                            class="block mt-1 w-full"
                            type="text"
                            name="company_zip"
                            :value="old('company_zip', $client->company_zip)"
                            required
                            autocomplete="company_zip"
                        />
                        <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="company_vat" :value="__('Company VAT')" />
                        <x-text-input
                            id="company_vat"
                            class="block mt-1 w-full"
                            type="text"
                            name="company_vat"
                            :value="old('company_vat', $client->company_vat)"
                            required
                            autocomplete="company_vat"
                        />
                        <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('clients.index') }}" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 underline">
                            {{ __('Back to Clients') }}
                        </a>

                        <x-primary-button>
                            {{ __('Update Client') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
