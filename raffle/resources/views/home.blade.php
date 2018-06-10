@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-darker">
                <div class="card-header red-header">Dashboard</div>

                <div class="card-body bg-dark text-light">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome back {{ Auth::user()->name }}! You are now logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
