{{-- Extend the base layout --}}
@extends('layouts.app')

{{-- Populate the title section --}}
@section('title', 'Welcome | Raffler')

{{-- Populate the content section extended from the base layout --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- Extend the card component --}}
                @component('components.card')

                    {{-- Assign the card's title --}}
                    @slot('cardTitle')
                        Welcome To Raffler
                    @endslot

                    {{-- Assign the card's body --}}
                    @slot('cardBody')

                        <article>
                            <h1 class="text-center">Raffler</h1>
                            <dl>
                                <dt>What is Raffler?</dt>
                                <dd>Raffler is an application built to allow users to take control of their own raffle competitions!</dd>
                                <hr>
                                <dt>Why choose Raffler?</dt>
                                <dd>Raffler will allow users to create the unique raffles they need. This application is always growing and will evolve to fit the users' needs!</dd>
                                <hr>
                                <dt>Do I need a database?</dt>
                                <dd>No! Raffler stores all of your data on it's own web server and all of your data is private and secure!</dd>
                                <hr>
                                <dt>How much is Raffler?</dt>
                                <dd>Absolutely free! Raffler is and will always be free, though extra features may be added in the future for upgraded user accounts.</dd>
                                <hr>
                                <dt>Can I have multiple raffles?</dt>
                                <dd>Yes! Raffler gives its' users the ability to create multiple raffles which can also be edited and reuse as needed!</dd>
                            </dl>
                        </article>

                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection