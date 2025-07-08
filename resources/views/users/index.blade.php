<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('users') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                <span>{{ __("List Of Users") }}</span>
                <a href="{{ route('users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Add User
                </a>
            </div>
                <div class="overflow-x-auto bg-white shadow-md sm:rounded-lg p-4">
    <table class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 font-medium text-gray-600">ID</th>
                <th class="px-4 py-2 font-medium text-gray-600">First Name</th>
                <th class="px-4 py-2 font-medium text-gray-600">Last Name</th>
                <th class="px-4 py-2 font-medium text-gray-600">Email</th>
                <th class="px-4 py-2 font-medium text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($users as $user)
                <tr>
                    <td class="px-4 py-2">{{ $user->id }}</td>
                    <td class="px-4 py-2">{{ $user->first_name }}</td>
                    <td class="px-4 py-2">{{ $user->last_name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('users.edit', $user) }}" class="inline-block px-3 py-1 text-xs text-white bg-blue-500 hover:bg-blue-600 rounded">
                            Edit
                        </a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="px-3 py-1 text-xs text-white bg-red-500 hover:bg-red-600 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
