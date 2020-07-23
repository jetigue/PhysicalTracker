@extends('layouts.app')

@section('content')
    <p>{{ $athlete->first_name }} {{ $athlete->last_name }}</p>
@endsection