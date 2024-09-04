<div class="ml-3">
    @if ($getRecord()->can_view == 'Program Chair')
        <h1 class="uppercase">
            {{ $getRecord()->programChair->lastname . ', ' . $getRecord()->programChair->firstname . ' ' . $getRecord()->programChair->middlename[0] . '.' }}
        </h1>
        <h1 class="text-xs font-medium leading-3 text-gray-700">
            {{ 'Program Chairman of ' . $getRecord()->programChair->program->name }}</h1>
    @else
        <h1 class="uppercase">faculty
            {{ $getRecord()->faculty->lastname . ', ' . $getRecord()->faculty->firstname . ' ' . $getRecord()->faculty->middlename[0] . '.' }}
        </h1>
    @endif
</div>
