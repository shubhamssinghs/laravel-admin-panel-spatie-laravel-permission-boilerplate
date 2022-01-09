<aside id="sidebar"
    class="fixed hidden z-20 h-full top-0 left-0 pt-12 flex lg:flex flex-shrink-0 flex-col w-64 ease-in-out duration-75"
    aria-label="Sidebar">
    <div
        class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 pt-0">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-white dark:bg-gray-900 divide-y space-y-1 pt-3">
                <ul class="space-y-2 pb-2">
                    <li>
                        <a href="{{route('dashboard')}}"
                            class="{{ request()->routeIs('dashboard*') ? 'bg-blue-600' : '' }} text-base text-gray-900 dark:text-gray-100 font-normal rounded-lg flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-800 group">
                            <svg class="w-6 h-6 text-gray-300 dark:text-gray-500 dark:group-hover:text-gray-200 group-hover:text-gray-900 transition duration-75"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3 {{ request()->routeIs('dashboard*') ? 'text-white' : '' }}">Dashboard</span>
                        </a>
                    </li>
                    @can('browse_users')
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="{{ request()->routeIs('users*') ? 'bg-blue-600' : '' }} text-base text-gray-900 dark:text-gray-100 font-normal rounded-lg flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-800 group">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 {{ request()->routeIs('users*') ? 'text-white dark:group-hover:text-gray-200 dark:text-gray-200' : '' }}  group-hover:text-gray-900 transition duration-75"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                </svg>
                                <span class="ml-3 {{ request()->routeIs('users*') ? 'text-white' : '' }}">Users</span>
                            </a>
                        </li>
                    @endcan
                    @can('browse_roles')
                        <li>
                            <a href="{{ route('roles.index') }}"
                                class="{{ request()->routeIs('roles*') ? 'bg-blue-600' : '' }} text-base text-gray-900 dark:text-gray-100 font-normal rounded-lg flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-800 group">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 {{ request()->routeIs('roles*') ? 'text-white dark:group-hover:text-gray-200 dark:text-gray-200' : '' }}    group-hover:text-gray-900 transition duration-75"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-3 {{ request()->routeIs('roles*') ? 'text-white' : '' }}">Roles</span>
                            </a>
                        </li>
                    @endcan

                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit"
                                class="text-red-600 dark:text-red-500 font-normal rounded-lg flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-800 group w-full">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-red-500 dark:group-hover:text-red-500 transition duration-75"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="ml-3">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
<div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
