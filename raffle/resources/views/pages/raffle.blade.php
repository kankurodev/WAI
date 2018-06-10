@extends('layouts.app')
@section('title')
    {{ Auth::user()->name }}'s Raffle | Raffler
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- Extend the card component --}}
                @component('components.card')

                    {{-- Assign the card's title --}}
                    @slot('cardTitle')
                        {{ Auth::user()->name }}'s Raffle
                    @endslot

                    {{-- Assign the card's body --}}
                    @slot('cardBody')
                        @component('components.table')

                            @slot('ticketId')
                                1
                            @endslot
                            @slot('ticketName')
                                Name
                            @endslot
                            @slot('ticketEmail')
                                Email
                            @endslot
                            @slot('ticketPhone')
                                Phone
                            @endslot
                            @slot('ticketGender')
                                Gender
                            @endslot
                            @slot('ticketAge')
                                Age
                            @endslot
                            @slot('ticketStatus')
                                Status
                            @endslot
                            @slot('ticketEdit')
                                #
                            @endslot
                            @slot('ticketDelete')
                                #
                            @endslot

                        @endcomponent
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection