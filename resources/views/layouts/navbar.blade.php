<nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 fixed z-30 w-full">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobileClose" aria-expanded="true" aria-controls="sidebar"
                    class="hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer dark:text-gray-100 dark:hover:text-gray-200 p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

                <button id="toggleSidebarMobileHamburger" aria-expanded="true" aria-controls="sidebar"
                    class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 dark:text-gray-100 dark:hover:text-gray-200 cursor-pointer p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="#" class="text-xl font-bold flex items-center lg:ml-2.5">
                    <img src="{{ asset('img/logo.svg') }}" class="h-6 mr-2 dark:shadow" alt="CodeMerge Logo" />
                    <span class="self-center whitespace-nowrap dark:text-white">CodeMerge</span>
                </a>
            </div>
            <div class="flex items-center">
                <!-- something goes Here -->
                <button id="darkModeButton"
                    class="overflow-hidden focus:outline-none rounded-full border p-1 bg-blue-900 transform hover:scale-125 ease-in-out duration-300"
                    title="Dark Mode" onclick="darkMode()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="animate__animated animate__fadeInDown h-5 w-5 transform -rotate-90 text-blue-500"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                    </svg>
                </button>
                <button id="lightModeButton"
                    class="overflow-hidden focus:outline-none rounded-full border p-1 bg-yellow-900 hidden transform hover:scale-125 ease-in-out duration-300"
                    title="Light Mode" onclick="lightMode()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="animate__animated animate__fadeInUp h-5 w-5 text-yellow-500" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
