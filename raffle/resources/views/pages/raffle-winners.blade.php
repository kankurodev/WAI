@extends('layouts.app')
@section('title', 'Winners | Raffler')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-5">
                {{-- Extend the card component --}}
                @component('components.card')

                    {{-- Assign the card's title --}}
                    @slot('cardTitle')
                        Choose New Winner
                    @endslot

                    {{-- Assign the card's body --}}
                    @slot('cardBody')

                        <form class="text-center mb-5" method="get" action="#">
                            <button type="submit" class="btn btn-success">Choose New Winner</button>
                        </form>

                    @endslot
                @endcomponent
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @component('components.card')

                    {{-- Assign the card's title --}}
                    @slot('cardTitle')
                        Past Winners
                    @endslot

                    {{-- Assign the card's body --}}
                    @slot('cardBody')

                        <section class="bg-dark rounded">
                            <h1 class="text-center mb-1 text-light">Past Winners</h1>
                            <p class="text-center mb-5 text-muted">Use scroll bar or swipe to view full table on smaller screens</p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-dark rounded table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Entrant</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Win Date</th>
                                        <th scope="col">Ticket Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @isset($pastWinners)
                                            @foreach($pastWinners as $pastWinner)
                                                <tr>
                                                    <th id="row_id" scope="col">{{ $pastWinner['id'] }}</th>
                                                    <td>{{ $pastWinner['entrant'] }}</td>
                                                    <td>{{ $pastWinner['email'] }}</td>
                                                    <td>{{ $pastWinner['created_at'] }}</td>
                                                    <td>{{ $pastWinner['status'] }}</td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                                @isset($pastWinners)
                                    @if($pastWinners->total() > 0)
                                        <p class="text-warning mb-1 mt-5">Showing {{ $pastWinners->count() }} results of {{ $pastWinners->total() }}</p>
                                    @endif
                                    <p class="my-1">{{ $pastWinners->links() }}</p>
                                @endisset
                            </div>
                        </section>
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection