<div class="flex flex-col w-full">
    <div class="w-full flex justify-between mb-6">
        <div class="flex w-1/4 items-center">
            <div class="text-gray-600">
                Show:&nbsp;
            </div>

            <select wire:model="perPage" class="leading-normal py-1 border-2 px-3 rounded-lg">
                <option class="my-1">10</option>
                <option class="my-1">25</option>
                <option class="my-1">50</option>
            </select>
            <div class="text-gray-600">
                &nbsp; per page
            </div>
        </div>

        <div class="flex w-1/4">
            <input
                    wire:model="search"
                    class="w-full text-gray-700 mr-3 py-1 px-2 leading-normal border-2 rounded-lg"
                    aria-label="Search"
                    placeholder="Search Physicals...">
            <button class="bg-gray-500 hover:bg-gray-700 border border-gray-600 text-sm text-white px-2 rounded my-1"
                    type="button"
                    wire:click="clear">
                Clear
            </button>
        </div>
    </div>

    <div class="w-full">
        <div class="flex w-11/12 text-lg text-gray-700">
            <div class="w-1/3 text-left px-4">
                <a wire:click.prevent="sortBy('last_name')" role="button" href="#">
                    Athlete
                    @include('includes._sort-icon', ['field' => 'last_name'])
                </a>
            </div>
            <div class="w-1/3 text-left px-4">
                <a wire:click.prevent="sortBy('exam_date')" role="button" href="#">
                    Exam date
                    @include('includes._sort-icon', ['field' => 'exam_date'])
                </a>
            </div>
        </div>
        <div class="w-full divide-y border-t border-b">
            @foreach($physicals as $physical)
                <div class="flex flex-col w-full py-1 hover:bg-gray-100">
                    <div class="flex w-full">
                        <div class="flex w-11/12 pt-1">
                            <div class="w-1/3 px-4">
                                {{ $physical->last_name }}, {{ $physical->first_name }}
                            </div>
                            <div class="w-1/3 px-4">
                                <a href="{{ $physical->path() }}">
                                    {{ $physical->exam_date->format('n/d/Y') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-between items-center py-4">
            <div class="flex w-1/2">
                {{ $physicals->links('vendor.pagination.default-livewire') }}
            </div>
            <div class="flex w-1/4 text-sm text-gray-600 justify-end">
                Showing {{ $physicals->firstItem() }} to {{ $physicals->lastItem() }} out of {{ $physicals->total() }}
                results
            </div>
        </div>
    </div>
</div>