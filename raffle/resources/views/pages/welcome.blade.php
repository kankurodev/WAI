{{-- Extend the base layout --}}
@extends('layouts.app')

{{-- Populate the title section --}}
@section('title', 'Welcome | Raffler')

{{-- Populate the content section extended from the base layout --}}
@section('content')
    <div class="container text-light">
        <h2>Welcome!</h2>
    </div>
@endsection