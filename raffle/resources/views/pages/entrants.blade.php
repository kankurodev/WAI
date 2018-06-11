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
                                    <tr>
                                        <th scope="col">1</th>
                                        <td>John Smith</td>
                                        <td>9</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- $traders->links() --}}
                        </div>

                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
