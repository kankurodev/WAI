{{-- Extend the base layout --}}
@extends('layouts.app')

{{-- Populate the content section extended from the base layout --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- Extend the card component --}}
                @component('components.card')

                    {{-- Assign the card's title --}}
                    @slot('cardTitle')
                        Dashboard
                    @endslot

                    {{-- Assign the card's body --}}
                    @slot('cardBody')
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        Welcome back {{ Auth::user()->name }}! You are now logged in!
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
