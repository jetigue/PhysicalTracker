@extends('layouts.app')

@section('content')
{{--        <div class="">--}}
{{--            @if (Route::has('login'))--}}
{{--                <div class="top-right links">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}">Home</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}">Login</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}

            <div class="w-full">
                <div class="font-bold bg-blue-600 flex mx-auto w-1/2">
                    <a href="/athletes">Athletes</a>
                </div>
            </div>
{{--        </div>--}}
@endsection
