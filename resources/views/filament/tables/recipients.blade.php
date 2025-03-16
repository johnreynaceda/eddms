<div class="ml-3">


    <h1 class="uppercase">
        {{ $getRecord()->document->user->name }}
    </h1>
    <h1 class="text-xs font-medium leading-3 text-gray-700">
        @if ($getRecord()->document->user->user_type == 'program_chair')
            {{ 'Program Chairman of ' . \App\Models\ProgramChair::where('user_id', $getRecord()->document->user->id)->first()->program->name }}
        @elseif ($getRecord()->document->user->user_type == 'admin')
        @else
            Faculty
        @endif

    </h1>
</div>
