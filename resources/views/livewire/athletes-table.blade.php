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
                    placeholder="Search Athletes..">
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
                    Name
                    @include('includes._sort-icon', ['field' => 'last_name'])
                </a>
            </div>
            {{--            <div class="w-1/6 text-left px-4">--}}
            {{--                <a wire:click.prevent="sortBy('sex')" role="button" href="#">--}}
            {{--                    Sex--}}
            {{--                    @include('includes._sort-icon', ['field' => 'sex'])--}}
            {{--                </a>--}}
            {{--            </div>--}}
            {{--            <div class="w-1/6 text-left px-4">--}}
            {{--                <a wire:click.prevent="sortBy('grad_year')" role="button" href="#">--}}
            {{--                    Class--}}
            {{--                    @include('includes._sort-icon', ['field' => 'grad_year'])--}}
            {{--                </a>--}}
            {{--            </div>--}}
            {{--            <div class="w-1/6 text-left px-4">--}}
            {{--                <a wire:click.prevent="sortBy('dob')" role="button" href="#">--}}
            {{--                    DOB--}}
            {{--                    @include('includes._sort-icon', ['field' => 'dob'])--}}
            {{--                </a>--}}
            {{--            </div>--}}
            {{--        </div>--}}
        </div>
        <div class="w-full divide-y border-t border-b">
            @foreach($athletes as $athlete)
                <div x-data="{ isExpanded: false }" class="flex flex-col w-full hover:bg-gray-100">
                    <div class="flex w-full items-center">
                        <div class="flex w-11/12 py-2">
                            <div class="w-full px-4">
                                <a href="{{ $athlete->path() }}">
                                    {{ $athlete->last_name }}, {{ $athlete->first_name }}
                                </a>
                            </div>
                        </div>
                        <div class="w-1/12 text-right pt-1 px-4">
                            @include('includes._expand-icon')
                        </div>
                    </div>
                    <div x-show="isExpanded" class="flex flex-col -mt-2 px-8">
                        <p>Sex: <span class="font-semibold">{{ $athlete->sex }}</span></p>
                        <p>Grade:
                            <span class="font-semibold">{{ $athlete->grad_year }}</span>
                            <span class="italic text-gray-700 text-sm"> {{ $athlete->class }} </span>
                        </p>
                        <p>Date of Birth:
                            <span class="font-semibold">{{ $athlete->dob->format('n/d/Y') }}</span>
                            <span class="italic text-gray-700 text-sm"> {{ $athlete->age }} years old </span>
                        </p>

                        <div class="flex flex-col">
                            <div class="text-lg font-semibold text-green-500">
                                Physicals
                            </div>
                            @forelse($athlete->physicals as $physical)
                                <p class="px-4">Exam Date:
                                    <span class="font-semibold">{{ $physical->exam_date->format('n/d/y') }}</span>
                                </p>
                            @empty
                                <p>No physicals on file.</p>
                            @endforelse
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-between items-center py-4">
            <div class="flex w-1/2">
                {{ $athletes->links('vendor.pagination.default-livewire') }}
            </div>
            <div class="flex w-1/4 text-sm text-gray-600 justify-end">
                Showing {{ $athletes->firstItem() }} to {{ $athletes->lastItem() }} out of {{ $athletes->total() }}
                results
            </div>
        </div>

    </div>
</div>