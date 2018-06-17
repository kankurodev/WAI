@extends('layouts.app')
@section('title')
    {{ Auth::user()->name }}'s Raffle | Raffler
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- Extend the card component --}}
                @component('components.card')

                    {{-- Assign the card's title --}}
                    @slot('cardTitle')
                        {{ Auth::user()->name }}'s Raffle
                    @endslot

                    {{-- Assign the card's body --}}
                    @slot('cardBody')

                        <section class="bg-dark rounded p-3">
                            <h1 class="text-center mb-1 text-light">{{ Auth::user() ->name}}'s Raffle</h1>
                            <p class="text-center mb-5 text-muted">Use scroll bar or swipe to view full table</p>
                            <table class="table table-responsive table-bordered table-striped table-dark rounded table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tickets as $ticket)
                                    <tr>
                                        <th id="row_id" scope="col">{{ $ticket['id'] }}</th>
                                        <td>{{ $ticket['entrant'] }} </td>
                                        <td>{{ $ticket['email'] }} </td>
                                        <td>{{ $ticket['phone'] }} </td>
                                        <td>{{ $ticket['gender'] }} </td>
                                        <td>{{ $ticket['age'] }} </td>
                                        <td>{{ $ticket['status'] }} </td>
                                        <td class="text-center" style="width: 1%; white-space: nowrap;">
                                            <a href="#" class="btn btn-sm btn-warning py-0 px-1" >Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger py-0 px-1" >Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p class="text-warning mb-1 mt-5">Showing {{ $tickets->count() }} results of {{ $tickets->total() }}</p>
                            <p class="my-1">{{ $tickets->links() }}</p>
                        </section>

                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection