@php
    $statusColors = [
        'open' => 'bg-blue-100 text-blue-800',
        'in progress' => 'bg-yellow-100 text-yellow-800',
        'pending' => 'bg-orange-100 text-orange-800',
        'waiting client' => 'bg-purple-100 text-purple-800',
        'blocked' => 'bg-red-100 text-red-800',
        'closed' => 'bg-gray-200 text-gray-800',
    ];
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center space-x-4">
                <span>{{ __("List Of Tasks") }}</span>
                <form method="GET" action="{{ route('tasks.search') }}" class="w-full md:w-auto flex items-center gap-2">
                    <input
                        type="text"
                        name="query"
                        placeholder="Search tasks..."
                        value="{{ request('query') }}"
                        class="w-full md:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Search
                    </button>
                </form>
                <a href="{{ route('tasks.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Add Task
                </a>
            </div>

            <div class="overflow-x-auto bg-white shadow-md sm:rounded-lg p-4">
                @if($tasks->isEmpty())
                    <h2 class="text-center text-gray-600 text-lg py-8">No results found.</h2>
                @else
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 font-medium text-gray-600">ID</th>
                                <th class="px-4 py-2 font-medium text-gray-600">Title</th>
                                <th class="px-4 py-2 font-medium text-gray-600">Description</th>
                                <th class="px-4 py-2 font-medium text-gray-600">Deadline</th>
                                <th class="px-4 py-2 font-medium text-gray-600">Status</th>
                                <th class="px-4 py-2 font-medium text-gray-600">Client</th>
                                <th class="px-4 py-2 font-medium text-gray-600">Project</th>
                                <th class="px-4 py-2 font-medium text-gray-600">User</th>
                                <th class="px-4 py-2 font-medium text-gray-600">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="px-4 py-2">{{ $task->id }}</td>
                                    <td class="px-4 py-2">{{ $task->title }}</td>
                                    <td class="px-4 py-2">{{ Str::limit($task->description) }}</td>
                                    <td class="px-4 py-2">{{ $task->deadline }}</td>
                                    <td class="px-4 py-2">
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $statusColors[$task->status->value] ?? 'bg-gray-200 text-gray-800' }}">
                                            {{ strtoupper(str_replace('_', ' ', $task->status->value)) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">{{ $task->client->client_name }}</td>
                                    <td class="px-4 py-2">{{ $task->project->title }}</td>
                                    <td class="px-4 py-2">{{ $task->user->first_name }}</td>
                                    <td class="px-4 py-2 space-x-2">
                                        <a href="{{ route('tasks.edit', $task) }}" class="inline-block px-3 py-1 text-xs text-white bg-blue-500 hover:bg-blue-600 rounded">
                                            Edit
                                        </a>
                                        @can(\App\PermissionEnum::DELETE_TASKS)
                                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
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
                @endif
            </div>
        </div>
    </div>
</div>
</x-app-layout>
