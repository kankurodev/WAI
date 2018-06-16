<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RaffleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.raffle');
    }

    /**
     * Show the form for creating a new ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add-ticket');
    }

    /**
     * Store a newly created ticket in the raffle.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified ticket in the raffle.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified ticket from the raffle.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the raffle entrants.
     *
     * @return \Illuminate\Http\Response
     */
    public function entrants() {
        
        return view('pages.entrants');
    }

    /**
     * Display a listing of the raffle entrants.
     *
     * @return \Illuminate\Http\Response
     */
    public function winners() {

        return view('pages.raffle-winners');
    }
}
