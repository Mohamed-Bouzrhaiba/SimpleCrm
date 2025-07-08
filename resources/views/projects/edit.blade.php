<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('edit Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4 text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('projects.update',$project) }}">
                    @method('PUT')
                    @csrf

                    <div>
                        <x-input-label for="title" :value="__('Project Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                        :value="old(('title'),$project->title) "
                        required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                        :value="old('description',$project->description)" required />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deadline" :value="__('Deadline')" />
                        <x-text-input id="deadline" class="block mt-1 w-full" type="date" name="deadline" :value="old('deadline',$project->deadline)" required />
                        <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="status" :value="__('Project Status')" />
                        <select name="status" id="status">
                        @foreach (\App\StatusEnum::cases() as $status)
                        <option value="{{ $status->value }}" @selected(old('status',$project->status->value) == $status->value)>
                        {{ ucfirst($status->value) }}
                         </option>
                    @endforeach
                </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="user_id" :value="__('Assign to User')" />
                        <select name="user_id" id="user_id" class="block mt-1 w-full rounded border-gray-300">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" @selected(old('user_id',$project->user->id) == $user->id)>
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                    </div>

                <div class="mt-4">
                    <x-input-label for="client_id" :value="__('Client')" />
                    <select name="client_id" id="client_id" class="block mt-1 w-full rounded border-gray-300 dark:text-white dark:bg-gray-700">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" @selected(old('client_id',$project->client->id) == $client->id)>
                                {{ $client->company_name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                </div>

                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('projects.index') }}" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 underline">
                            {{ __('Back to Projects') }}
                        </a>

                        <x-primary-button>
                            {{ __('update Project') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
