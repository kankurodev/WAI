@extends('layouts.app')
@section('title', 'Register | Raffler')
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

                        <section class="bd-dark rounded">
                            <h1 class="text-center mb-1 text-light">Entrants</h1>
                            <p class="text-center mb-5 text-muted">Use scroll bar or swipe to view full table on smaller screens</p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-dark rounded table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Entrants</th>
                                        <th scope="col">Tickets</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @isset($entrants)
                                            @foreach($entrants as $entrant)
                                                <tr>
                                                    <th scope="col">{{ $entrant['id'] }}</th>
                                                    <td>{{ $entrant['entrant'] }}</td>
                                                    <td>{{ $entrant['tickets'] }}</td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                                @isset($entrants)
                                    @if($entrants->total() > 0)
                                        <p class="text-warning mb-1 mt-5">Showing {{ $entrants->count() }} results of {{ $entrants->total() }}</p>
                                    @endif
                                        <p class="my-1">{{ $entrants->links() }}</p>
                                @endisset
                            </div>
                        </section>

                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
