@extends('layouts.app')
@section('title')
    {{ Auth::user()->name }}'s Raffle | Raffler
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if(Session::has('ticket-updated'))

                    <div class="container mt-1 mb-5 alert alert-success alert-dismissible fade show text-center" role="alert">
                        <button type="button" class="close pt-2" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span>{{ session('ticket-updated') }}</span>
                    </div>

                @elseif(Session::has('ticket-deleted'))

                    <div class="container mt-1 mb-5 alert alert-success alert-dismissible fade show text-center" role="alert">
                        <button type="button" class="close pt-2" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span>{{ session('ticket-deleted') }}</span>
                    </div>

                @endif

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
                            <p class="text-center mb-5 text-muted">Use scroll bar or swipe to view full table on smaller screens</p>
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
                                    @isset($tickets)
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
                                                    <form method="get" action="{{action('RaffleController@edit', $ticket['id'])}}" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-warning py-0 px-1" >Edit</button>
                                                    </form>
                                                    <form method="post" action="{{action('RaffleController@destroy', $ticket['id'])}}" class="d-inline">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-sm btn-danger py-0 px-1">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                            @isset($tickets)
                                @if($tickets->total() > 0)
                                    <p class="text-warning mb-1 mt-5">Showing {{ $tickets->count() }} results of {{ $tickets->total() }}</p>
                                @endif
                                <p class="my-1">{{ $tickets->links() }}</p>
                            @endisset
                        </section>

                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection