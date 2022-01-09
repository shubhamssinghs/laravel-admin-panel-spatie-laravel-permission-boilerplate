<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50 dark:bg-gray-500">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-left text-md font-medium text-gray-500 dark:text-gray-200 tracking-wider">
                Avatar
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-md font-medium text-gray-500 dark:text-gray-200 tracking-wider">
                Name
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-md font-medium text-gray-500 dark:text-gray-200 tracking-wider">
                Email
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
        @forelse ($users as $user)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500 dark:text-gray-200">
                    @if ($user->avatar && $user->avatar != ' ')
                        <img src="{{ asset('avatar').'/'.$user->avatar }}" alt="avatar" class="h-8 rounded-full">
                    @else
                        <img src="{{ Avatar::create($user->name)->toBase64() }}" alt="avatar" class="h-8">
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500 dark:text-gray-200">
                    {{ $user->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500 dark:text-gray-200">
                    {{ $user->email }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-md text-gray-900">
                    <a href="{{ route('roles.show', ['role' => $user->roles->pluck('id')[0]]) }}">
                        <span class="px-3 py-1 text-xs font-bold bg-green-500 rounded-full">
                            {{ $user->roles->pluck('name')[0] }}
                        </span>
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500 dark:text-gray-200 flex mt-2">
                    <a href="{{route('users.show',['user'=>$user->id])}}" class="text-blue-500 mr-2" title="View">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="{{route('users.edit',['user'=>$user->id])}}" class="text-yellow-500 mr-2" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    @if ($user->roles->pluck('name')[0] != 'super-admin')
                        <form action="{{route('users.destroy',['user'=>$user->id])}}" method="POST" onSubmit="return confirmDelete(this)">
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
                    @endif
                </td>
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
    {!! $users->links() !!}
</div>
