<div>
    <div class="flex space-x-3 items-center">
        <div class="w-96">
            <x-input placeholder="Search anything..." icon="magnifying-glass" class="h-12" wire:model.live="search" />
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            class="text-green-600 animate-spin" wire:loading wire:target="search" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-loader">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 6l0 -3" />
            <path d="M16.25 7.75l2.15 -2.15" />
            <path d="M18 12l3 0" />
            <path d="M16.25 16.25l2.15 2.15" />
            <path d="M12 18l0 3" />
            <path d="M7.75 16.25l-2.15 2.15" />
            <path d="M6 12l-3 0" />
            <path d="M7.75 7.75l-2.15 -2.15" />
        </svg>
    </div>
    <div class="mt-10 grid grid-cols-6 gap-10">
        @forelse ($categories as $cat)
            <a class="h-36 cursor-pointer hover:scale-95"
                href="{{ route('program_chair.archives-open', ['id' => $cat->id]) }}" target="_blank">
                <x-shared.folder />
                <div class=" text-center">
                    <p class="text-sm text">{{ $cat->classification->name . ' - ' . $cat->name }}</p>
                </div>
            </a>
        @empty
            <div class="col-span-6 text-center">
                <span>No Records found...</span>
            </div>
        @endforelse

    </div>
</div>
