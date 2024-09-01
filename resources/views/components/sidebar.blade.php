<div>

    @if (auth()->user()->user_type == 'admin')
        <nav class="flex-1 space-y-1 ">

            <p class="px-4 pt-10 text-xs font-semibold text-main_text uppercase">

            </p>
            <ul>
                <li>
                    <a class="{{ request()->routeIs('admin.dashboard') ? 'bg-white text-green-700' : 'text-white ' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="{{ route('admin.dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M13.45 11.55l2.05 -2.05" />
                            <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                        </svg>
                        <span class="ml-3">
                            Dashboard
                        </span>
                    </a>
                </li>

            </ul>
            <p class="px-4 pt-5 text-xs font-semibold text-gray-100/50 uppercase">
                MANAGEMENT
            </p>
            <ul>
                <li>
                    <a class="{{ request()->routeIs('admin.staff') ? 'bg-white text-green-700' : 'text-white ' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="{{ route('admin.staff') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                        <span class="ml-3">
                            Staffs
                        </span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('admin.program-chair') ? 'bg-white text-green-700' : 'text-white ' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="{{ route('admin.program-chair') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                        </svg>
                        <span class="ml-3">
                            Program Chairs
                        </span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('admin.category') ? 'bg-white text-green-700' : 'text-white ' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="{{ route('admin.category') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-category-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 4h6v6h-6z" />
                            <path d="M4 14h6v6h-6z" />
                            <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M7 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        </svg>
                        <span class="ml-3">
                            Categories
                        </span>
                    </a>
                </li>
                <li>
                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                        <span class="ml-3">
                            Users
                        </span>
                    </a>
                </li>

            </ul>
            <p class="px-4 pt-5 text-xs font-semibold text-gray-100/50 uppercase">
                SETTINGS
            </p>
            <ul>
                <li>
                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-cog">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h2.5" />
                            <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M19.001 15.5v1.5" />
                            <path d="M19.001 21v1.5" />
                            <path d="M22.032 17.25l-1.299 .75" />
                            <path d="M17.27 20l-1.3 .75" />
                            <path d="M15.97 17.25l1.3 .75" />
                            <path d="M20.733 20l1.3 .75" />
                        </svg>
                        <span class="ml-3">
                            My Account
                        </span>
                    </a>
                </li>

            </ul>

        </nav>
    @else
        <nav class="flex-1 space-y-1 ">
            <a href="{{ route('program_chair.compose') }}""
                class="flex space-x-1 hover:scale-95 hover:text-green-600 shadow border-2 border-green-700 justify-center items-center text-gray-700 bg-white rounded-full py-5 px-4 w-full">

                <span class="font-semibold">Compose</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                    <path d="M13.5 6.5l4 4" />
                </svg>
            </a>
            <p class="px-4 pt-10 text-xs font-semibold text-main_text uppercase">

            </p>
            <ul>
                <li>
                    <a class="{{ request()->routeIs('program_chair.dashboard') ? 'bg-white text-green-700' : 'text-white ' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="{{ route('program_chair.dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M13.45 11.55l2.05 -2.05" />
                            <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                        </svg>
                        <span class="ml-3">
                            Dashboard
                        </span>
                    </a>
                </li>

            </ul>
            <p class="px-4 pt-5 text-xs font-semibold text-gray-100/50 uppercase">
                MANAGEMENT
            </p>
            <ul>
                <li>
                    <a class="{{ request()->routeIs('program_chair.incoming') ? 'bg-white text-green-700' : 'text-white ' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="{{ route('program_chair.incoming') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-folder-up">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 19h-7a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2h4l3 3h7a2 2 0 0 1 2 2v3.5" />
                            <path d="M19 22v-6" />
                            <path d="M22 19l-3 -3l-3 3" />
                        </svg>
                        <span class="ml-3">
                            Incoming
                        </span>
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('program_chair.outgoing') ? 'bg-white text-green-700' : 'text-white ' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="{{ route('program_chair.outgoing') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-folder-down">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 19h-7a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2h4l3 3h7a2 2 0 0 1 2 2v3.5" />
                            <path d="M19 16v6" />
                            <path d="M22 19l-3 3l-3 -3" />
                        </svg>
                        <span class="ml-3">
                            Outgoing
                        </span>
                    </a>
                </li>
                <li>
                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-server-cog">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                            <path d="M12 20h-6a3 3 0 0 1 -3 -3v-2a3 3 0 0 1 3 -3h10.5" />
                            <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M18 14.5v1.5" />
                            <path d="M18 20v1.5" />
                            <path d="M21.032 16.25l-1.299 .75" />
                            <path d="M16.27 19l-1.3 .75" />
                            <path d="M14.97 16.25l1.3 .75" />
                            <path d="M19.733 19l1.3 .75" />
                            <path d="M7 8v.01" />
                            <path d="M7 16v.01" />
                        </svg>
                        <span class="ml-3">
                            Maintenance
                        </span>
                    </a>
                </li>
                <li>
                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-archive">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                            <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                            <path d="M10 12l4 0" />
                        </svg>
                        <span class="ml-3">
                            Archives
                        </span>
                    </a>
                </li>
                <li>
                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-file-description">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                            <path d="M9 17h6" />
                            <path d="M9 13h6" />
                        </svg>
                        <span class="ml-3">
                            Reports
                        </span>
                    </a>
                </li>
            </ul>
            <p class="px-4 pt-5 text-xs font-semibold text-gray-100/50 uppercase">
                SETTINGS
            </p>
            <ul>
                <li>
                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white  hover:scale-95 hover:text-green-600"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-cog">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h2.5" />
                            <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M19.001 15.5v1.5" />
                            <path d="M19.001 21v1.5" />
                            <path d="M22.032 17.25l-1.299 .75" />
                            <path d="M17.27 20l-1.3 .75" />
                            <path d="M15.97 17.25l1.3 .75" />
                            <path d="M20.733 20l1.3 .75" />
                        </svg>
                        <span class="ml-3">
                            My Account
                        </span>
                    </a>
                </li>

            </ul>

        </nav>
    @endif
</div>
