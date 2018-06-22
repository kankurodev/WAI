@extends('layouts.app')
@section('title', 'Add Ticket | Raffler')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('ticket-added'))

                    <div class="container mt-1 mb-5 alert alert-success alert-dismissible fade show text-center" role="alert">
                        <button type="button" class="close pt-2" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>{{ session('ticket-added') }}</p>
                        <span>{{ session('entrant') }}'s current ticket count is now {{ session('ticket-count') }}!</span>
                    </div>

                @endif

                {{-- Extend the card component --}}
                @component('components.card')

                    {{-- Assign the card's title --}}
                    @slot('cardTitle')
                        Add New Ticket
                    @endslot

                    {{-- Assign the card's body --}}
                    @slot('cardBody')

                        <form method="post" action="{{url('raffle')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label class="text-light" class="text-light" for="entrant">Name</label>
                                    <input class="form-control" type="text" name="entrant" id="entrant" placeholder="John Doe" required>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="text-light" for="email">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" placeholder="example@example.com" required>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="text-light" for="game">Phone</label>
                                    <input class="form-control" type="text" name="phone" id="phone" placeholder="1231231234" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label class="text-light" for="gender">Gender</label>
                                    <select class="form-control" name="gender" id="gender" required>
                                        <option value="">Choose...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="text-light" for="age">Age</label>
                                    <input class="form-control" type="number" name="age" id="age" placeholder="27" required>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="text-light" for="status">Ticket Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="">Choose...</option>
                                        <option value="In Queue">In Queue</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Denied">Denied</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-4">Add Ticket</button>
                        </form>

                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection