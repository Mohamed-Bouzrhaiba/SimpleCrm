<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                    <span>{{ __("List Of Projects") }}</span>
                    <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Add Project
                    </a>
                </div>

                <div class="overflow-x-auto bg-white shadow-md sm:rounded-lg p-4">
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Deadline</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">User</th>
                                <th class="px-4 py-2">Client</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="px-4 py-2">{{ $project->id }}</td>
                                    <td class="px-4 py-2">{{ $project->title }}</td>
                                    <td class="px-4 py-2">{{ Str::limit($project->description, 50) }}</td>
                                    <td class="px-4 py-2">{{ $project->deadline }}</td>
                                    <td class="px-4 py-2">{{ $project->status }}</td>
                                    <td class="px-4 py-2">{{ $project->user->first_name ?? 'N/A' }}</td>
                                    <td class="px-4 py-2">{{ $project->client->company_name ?? 'N/A' }}</td>
                                    <td class="px-4 py-2 space-x-2">
                                        <a href="{{ route('projects.edit', $project) }}" class="inline-block px-3 py-1 text-xs text-white bg-blue-500 hover:bg-blue-600 rounded">
                                            Edit
                                        </a>
                                        @can(\App\PermissionEnum::DELETE_PROJECTS->value)
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
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
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
