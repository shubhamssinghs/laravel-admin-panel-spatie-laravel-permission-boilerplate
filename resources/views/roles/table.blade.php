<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50 dark:bg-gray-500">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-left text-md font-medium text-gray-500 dark:text-gray-200 tracking-wider">
                Id
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-md font-medium text-gray-500 dark:text-gray-200 tracking-wider">
                Role
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-md font-medium text-gray-500 dark:text-gray-200 tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
        @forelse ($roles as $role)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500 dark:text-gray-200">
                    {{ $role->id }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500 dark:text-gray-200">
                    {{ $role->name }}
                </td>
                @if ($role->name != 'super-admin')
                    <td class="px-6 py-4 whitespace-nowrap text-md font-medium flex">
                        @can('view_roles')
                            <a href="{{ route('roles.show', ['role' => $role->id]) }}" class="text-blue-500 mr-2"
                                title="View">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endcan
                        @can('edit_roles')
                            <a href="{{ route('roles.edit', ['role' => $role->id]) }}" class="text-yellow-500 mr-2"
                                title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        @endcan
                        @can('delete_roles')
                            <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="POST"
                                onSubmit="return confirmDelete(this)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        @endcan
                    </td>
                @else
                    <td class="px-6 py-4 whitespace-nowrap text-md font-medium flex text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        All Permissions
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center text-md text-gray-500" colspan="2">
                    No data found.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="py-2">
    {!! $roles->links() !!}
</div>
