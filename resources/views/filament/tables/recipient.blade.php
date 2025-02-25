<div class="ml-3">
    {{-- @if (auth()->user()->user_type == 'program_chair')
        <h1 class="uppercase">
            {{ $getRecord()->user->programChair->lastname . ', ' . $getRecord()->user->programChair->firstname . ' ' . $getRecord()->user->programChair->middlename[0] . '.' }}

        </h1>
        <h1 class="text-xs font-medium leading-3 text-gray-700">
            {{ 'Program Chairman of ' . $getRecord()->user->programChair->program->name }}</h1>
    @else
        <h1 class="uppercase">
            {{ $getRecord()->faculty->lastname . ', ' . $getRecord()->faculty->firstname . ' ' . $getRecord()->faculty->middlename[0] . '.' }}
        </h1>
        <h1 class="text-xs leading-3 text-gray-700">faculty</h1>
    @endif --}}

    <h1 class="uppercase">
        {{ $getRecord()->user->name }}
    </h1>
    <h1 class="text-xs font-medium leading-3 text-gray-700">
        @if ($getRecord()->user->user_type == 'program_chair')
            {{ 'Program Chairman of ' . \App\Models\ProgramChair::where('user_id', $getRecord()->user->id)->first()->program->name }}
        @elseif ($getRecord()->user->user_type == 'admin')
        @else
            Faculty
        @endif

    </h1>
</div>
