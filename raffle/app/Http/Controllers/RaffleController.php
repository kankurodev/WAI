<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Entrant;
use App\Winner;

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
        $tickets = Ticket::paginate(20);

        return view('pages.raffle', compact('tickets'));
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

        //Select all the data from the Entrant model and paginate it by 20
        $entrants = Entrant::paginate(20);

        //Return the view and pass in the entrants data
        return view('pages.entrants', compact('entrants'));
    }

    /**
     * Display a listing of the past raffle winners.
     *
     * @return \Illuminate\Http\Response
     */
    public function winners() {

        //Select all the data from the Winner model and paginate it by 10
        $pastWinners = Winner::paginate(10);

        //Return the view and pass in the pastWinners data
        return view('pages.raffle-winners', compact('pastWinners'));
    }
}
