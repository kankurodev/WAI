@extends('layouts.app')
@section('title', 'Edit Ticket | Raffler')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- Extend the card component --}}
                @component('components.card')

                    {{-- Assign the card's title --}}
                    @slot('cardTitle')
                        Edit Ticket
                    @endslot

                    {{-- Assign the card's body --}}
                    @slot('cardBody')

                        <form method="post" action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label class="text-light" class="text-light" for="entrant">Name</label>
                                    <input class="form-control" type="text" name="entrant" id="entrant" value="{{ $ticket->entrant }}" required>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="text-light" for="email">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" value="{{ $ticket->email }}" required>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="text-light" for="game">Phone</label>
                                    <input class="form-control" type="text" name="phone" id="phone" value="{{ $ticket->phone }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label class="text-light" for="gender">Gender</label>
                                    <select class="form-control" name="gender" id="gender" required>
                                        <option value="">Choose...</option>
                                        <option @if($ticket->gender=="male") selected @endif value="Male">Male</option>
                                        <option @if($ticket->gender=="female") selected @endif value="Female">Female</option>
                                        <option @if($ticket->gender=="other") selected @endif value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="text-light" for="age">Age</label>
                                    <input class="form-control" type="number" name="age" id="age" value="{{ $ticket->age }}" required>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="text-light" for="status">Ticket Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="">Choose...</option>
                                        <option @if($ticket->status=="In Queue") selected @endif value="In Queue">In Queue</option>
                                        <option @if($ticket->status=="Approved") selected @endif value="Approved">Approved</option>
                                        <option @if($ticket->status=="Denied") selected @endif value="Denied">Denied</option>
                                        <option @if($ticket->status=="Canceled") selected @endif value="Canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Edit Ticket</button>
                        </form>

                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection