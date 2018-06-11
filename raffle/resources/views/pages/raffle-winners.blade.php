@extends('layouts.app')
@section('title', 'Winners | Raffler')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-5">
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
            <div class="col-md-8">
                @component('components.card')

                    {{-- Assign the card's title --}}
                    @slot('cardTitle')
                        Past Winners
                    @endslot

                    {{-- Assign the card's body --}}
                    @slot('cardBody')
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark rounded table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Entrant</th>
                                    <th scope="col">Win Date</th>
                                    <th scope="col">Ticket Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th id="row_id" scope="col">127</th>
                                        <td>Mary Smith</td>
                                        <td>06/08/2018</td>
                                        <td>Approved</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- $pastwinners->links() --}}
                        </div>
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection