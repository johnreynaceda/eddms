<div>
    <div class="flex space-x-3 items-center">
        <div x-data="{ notif: false }">
            <div class="relative">
                <button x-on:click="notif=!notif" class="text-green-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-bell-minus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M14.235 19c.865 0 1.322 1.024 .745 1.668a3.992 3.992 0 0 1 -2.98 1.332a3.992 3.992 0 0 1 -2.98 -1.332c-.552 -.616 -.158 -1.579 .634 -1.661l.11 -.006h4.471z" />
                        <path
                            d="M12 2c1.358 0 2.506 .903 2.875 2.141l.046 .171l.008 .043a8.013 8.013 0 0 1 4.024 6.069l.028 .287l.019 .289v2.931l.021 .136a3 3 0 0 0 1.143 1.847l.167 .117l.162 .099c.86 .487 .56 1.766 -.377 1.864l-.116 .006h-16c-1.028 0 -1.387 -1.364 -.493 -1.87a3 3 0 0 0 1.472 -2.063l.021 -.143l.001 -2.97a8 8 0 0 1 3.821 -6.454l.248 -.146l.01 -.043a3.003 3.003 0 0 1 2.562 -2.29l.182 -.017l.176 -.004zm2 8h-4l-.117 .007a1 1 0 0 0 .117 1.993h4l.117 -.007a1 1 0 0 0 -.117 -1.993z" />
                    </svg>
                </button>
                <div x-show="notif" x-cloak x-on:click.away="notif = false"
                    class="absolute left-1/2 z-10  flex w-screen max-w-max -translate-x-1/2 px-4">
                    <div
                        class="w-screen max-w-sm flex-auto overflow-hidden rounded-xl bg-white text-sm leading-6 shadow-lg ring-1 ring-gray-900/5">
                        <ul role="list" class="divide-y divide-gray-100 p-2 px-4 h-96 overflow-y-auto">
                            @forelse ($notifications as $item)
                                <li class="flex gap-x-4 py-2 hover:scale-95 cursor-pointer">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                            class="text-red-600 animate-pulse" height="30" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-notification">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 6h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                            <path d="M17 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                        </svg>
                                    </div>
                                    <div class="flex-auto">
                                        <div class="flex items-baseline justify-between gap-x-4">
                                            <p class="text-sm font-semibold leading-6 text-gray-900"></p>
                                            <p class="flex-none text-xs text-gray-600">
                                                <time
                                                    datetime="2023-03-04T15:54Z">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</time>
                                            </p>
                                        </div>
                                        <p class="mt-1 line-clamp-2 text-sm leading-6 text-gray-600">
                                            {{ $item->details }}</p>
                                    </div>
                                </li>
                            @empty
                                <li>No Notification..</li>
                            @endforelse

                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div x-data="{
            dropdownOpen: false
        }" class="relative">

            <button @click="dropdownOpen=true"
                class="inline-flex items-center justify-center h-12 py-2 pl-3 pr-12 text-sm font-medium transition-colors bg-white border rounded-md text-neutral-700 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                <img src="https://cdn.devdojo.com/images/may2023/adam.jpeg"
                    class="object-cover w-8 h-8 border rounded-full border-neutral-200" />
                <span class="flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                    <span>{{ auth()->user()->name }}</span>
                    <span class="text-xs truncate w-24 font-light text-neutral-400">{{ auth()->user()->email }}</span>
                </span>
                <svg class="absolute right-0 w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                </svg>
            </button>

            <div x-show="dropdownOpen" @click.away="dropdownOpen=false" x-transition:enter="ease-out duration-200"
                x-transition:enter-start="-translate-y-2" x-transition:enter-end="translate-y-0"
                class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
                <div class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                    <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                    <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                    <a href="#_"
                        class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-4 h-4 mr-2">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>Profile</span>
                        <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘P</span>
                    </a>

                    <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')"
                            onclick="event.preventDefault();
                                this.closest('form').submit();"
                            class="relative flex cursor-pointer select-none hover:text-red-500 hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" x2="9" y1="12" y2="12">
                                </line>
                            </svg>
                            <span>Log out</span>
                            <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘Q</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
