<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                <span>{{ __("List Of Clients") }}</span>

                 <form method="GET" action="{{ route('clients.search') }}" class="w-full md:w-auto flex items-center gap-2">
            <input
                type="text"
                name="query"
                placeholder="Search users..."
                value="{{ request('query') }}"
                class="w-full md:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Search
            </button>
                <a href="{{ route('clients.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Add New Client
                </a>
            </div>
                <div class="overflow-x-auto bg-white shadow-md sm:rounded-lg p-4">
    <table class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 font-medium text-gray-600">ID</th>
                <th class="px-4 py-2 font-medium text-gray-600">client name</th>
                <th class="px-4 py-2 font-medium text-gray-600">phone nummber</th>
                <th class="px-4 py-2 font-medium text-gray-600">company Address</th>
                <th class="px-4 py-2 font-medium text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($Clients as $client)
                <tr>
                    <td class="px-4 py-2">{{ $client->id }}</td>
                    <td class="px-4 py-2">{{ $client->client_name }}</td>
                    <td class="px-4 py-2">{{ $client->client_phone_number }}</td>
                    <td class="px-4 py-2">{{ $client->company_address }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('clients.edit', $client) }}" class="inline-block px-3 py-1 text-xs text-white bg-blue-500 hover:bg-blue-600 rounded">
                            Edit
                        </a>
                        @can(\App\PermissionEnum::DELETE_CLIENTS)
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="px-3 py-1 text-xs text-white bg-red-500 hover:bg-red-600 rounded">
                                Delete
                            </button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div class="mt-4">
        {{ $Clients->links() }}
    </div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
