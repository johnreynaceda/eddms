<div x-data>
    <div class="bg-white p-5 rounded-xl">
        {{ $this->form }}
    </div>
    <div class="flex my-5 justify-end">
        <x-button label="Print Report" @click="printOut($refs.printContainer.outerHTML);" right-icon="printer"
            class="font-semibold" slate />
    </div>
    <div class=" bg-white p-5 rounded-xl" x-ref="printContainer">
        <table id="example" style="width:100%">
            <thead class="font-normal">
                <tr>
                    <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">DOCUMENT CODE</th>
                    <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                        RECIPIENT
                    </th>
                    <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                        DETAILS
                    </th>
                    <th class="border  text-left px-2 text-sm font-semibold tecxt-gray-700 py-2">
                        DATE OF LETTER
                    </th>
                    <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                        DEADLINE
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($documents as $item)
                    <tr>
                        <td class="border text-sm text-gray-700  px-3 py-1">
                            {{ $item->document_code }}
                        </td>
                        <td class="border text-sm text-gray-700  px-3 py-1">
                            <div>
                                <h1 class="uppercase">
                                    {{ $item->user->name }}
                                </h1>
                                <h1 class="text-xs font-medium leading-3 text-gray-700">
                                    @if ($item->user->user_type == 'program_chair')
                                        {{ 'Program Chairman of ' . \App\Models\ProgramChair::where('user_id', $item->user->id)->first()->program->name }}
                                    @else
                                        Faculty
                                    @endif

                                </h1>
                            </div>
                        </td>
                        <td class="border text-sm text-gray-700  px-3 py-1">
                            {{ $item->category->name . ' - ' . $item->category->type . ': ' . $item->description }}
                        </td>
                        <td class="border text-sm text-gray-700  px-3 py-1">
                            {{ \Carbon\Carbon::parse($item->date_of_letter)->format('F d, Y') }}
                        </td>
                        <td class="border text-sm text-gray-700  px-3 py-1">
                            {{ \Carbon\Carbon::parse($item->deadline)->format('F d, Y') }}
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border text-sm text-gray-700  px-3 py-1 text-center">
                            No documents found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
