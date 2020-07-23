@extends('layouts.app')

@section('content')
<div class="flex flex-col w-3/4 mx-auto">
    <header class="w-full text-2xl font-light text-center">Athletes</header>
    <div x-data="{ open: false }">
        <button @click="open = true">Add and Athlete</button>

        <div
            x-show="open"
            @click.away="open = false"
        >
            <div class="w-full md:w-2/3 mx-auto"  @submit="open = false">
                <livewire:athletes-form></livewire:athletes-form>
            </div>
        </div>
    </div>

    <livewire:athletes-table></livewire:athletes-table>
</div>
@endsection
