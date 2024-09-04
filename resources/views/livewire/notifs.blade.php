<div>
    <div class="relative">
        <h1 class="text-2xl text-gray-700 font-bold">ANNOUNCEMENTS</h1>
        <div class="mt-5">
            <ul role="list" class="divide-y divide-gray-100 space-y-2">
                @forelse ($announcements as $item)
                    <li wire:click="openAnnouncement({{ $item->id }})"
                        class="flex justify-between bg-white hover:scale-95  px-5 rounded-xl  cursor-pointer gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-3 ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    class="text-green-600" viewBox="0 0 24 24" fill="currentColor"
                                    class="icon icon-tabler icons-tabler-filled icon-tabler-bell">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M14.235 19c.865 0 1.322 1.024 .745 1.668a3.992 3.992 0 0 1 -2.98 1.332a3.992 3.992 0 0 1 -2.98 -1.332c-.552 -.616 -.158 -1.579 .634 -1.661l.11 -.006h4.471z" />
                                    <path
                                        d="M12 2c1.358 0 2.506 .903 2.875 2.141l.046 .171l.008 .043a8.013 8.013 0 0 1 4.024 6.069l.028 .287l.019 .289v2.931l.021 .136a3 3 0 0 0 1.143 1.847l.167 .117l.162 .099c.86 .487 .56 1.766 -.377 1.864l-.116 .006h-16c-1.028 0 -1.387 -1.364 -.493 -1.87a3 3 0 0 0 1.472 -2.063l.021 -.143l.001 -2.97a8 8 0 0 1 3.821 -6.454l.248 -.146l.01 -.043a3.003 3.003 0 0 1 2.562 -2.29l.182 -.017l.176 -.004z" />
                                </svg>
                            </div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900 uppercase">
                                    {{ $item->title }}
                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $item->content }}
                                </p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-xs leading-6 text-gray-900 ">Posted by:
                                {{ auth()->user()->user_type }}</p>
                            <p class="mt-1 text-xs leading-5 text-gray-500">
                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                        </div>
                    </li>
                @empty
                    <li class="text-center">
                        <p class="text-sm leading-6 text-gray-900">No announcements found.</p>
                    </li>
                @endforelse

            </ul>
        </div>
    </div>
    <x-modal name="simpleModal" wire:model.defer="openNotif">
        <x-card title="Details">
            <div>
                <h1 class="font-bold">{{ $title }}</h1>
                <span class="text-sm">by: {{ $author }}</span>
                <p class="mt-5">
                    {{ $content }}
                </p>
            </div>

            <x-slot name="footer" class="flex justify-end gap-x-4">
                <x-button flat negative label="Cancel" x-on:click="close" />
            </x-slot>
        </x-card>
    </x-modal>
</div>
