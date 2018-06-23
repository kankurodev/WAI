<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
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

        //Create variables for the form data
        $formEntrant = $request->get('entrant');
        $formEmail = $request->get('email');
        $formPhone = $request->get('phone');
        $formGender = $request->get('gender');
        $formAge = $request->get('age');
        $formStatus = $request->get('status');

        $ticketCount = DB::table('entrants')->where('email', $formEmail)->value('tickets'); //Select the tickets column

        //Create new Ticket object
        $entrant = new Entrant();

        //Check if entrant exists
        if (DB::table('entrants')->where('email', '=', $formEmail)->exists()) {

            //If entrant exists, add 1 to their ticket count
            DB::table('entrants')->where('email', $formEmail)->update(['tickets' => $ticketCount +1]); //Update the ticket column count

            //Add 1 to ticketCount variable
            $ticketCount = $ticketCount +1;
        } else {

            //If entrant doesn't exist create and populate it
            $entrant->entrant = $formEntrant;
            $entrant->email = $formEmail;
            $entrant->phone = $formPhone;
            $entrant->gender = $formGender;
            $entrant->age = $formAge;
            $entrant->tickets = DB::table('entrants')->where('email', $formEmail)->value('tickets') +1;
            $entrant->save();
        }

        //Create the new ticket
        $ticket = new Ticket();

        //Populate the ticket with the form data
        $ticket->entrant = $formEntrant;
        $ticket->email = $formEmail;
        $ticket->phone = $formPhone;
        $ticket->gender = $formGender;
        $ticket->age = $formAge;
        $ticket->status = $formStatus;

        //Save the ticket to the database
        $ticket->save();

        //Create session variables to pass in data on success
        Session::flash('ticket-added', "The Ticket has been added");
        Session::flash('ticket-count', $ticketCount);
        Session::flash('entrant', $formEntrant);

        //Return the user to the create page
        return redirect('/raffle/create');

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
        //Select the ticket that matches the id
        $ticket = Ticket::find($id);

        //Display the edit form and pass in the ticket and id
        return view('pages.edit-ticket', compact('ticket', 'id'));
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
        //Select the ticket that matches the id
        $ticket = Ticket::find($id);

        //Update the ticket's values with the form data
        $ticket->entrant = $request->get('entrant');
        $ticket->email = $request->get('email');
        $ticket->phone = $request->get('phone');
        $ticket->gender = $request->get('gender');
        $ticket->age = $request->get('age');
        $ticket->status = $request->get('status');

        //Save the ticket's new values
        $ticket->save();

        //Create a session variable to alert the user that the ticket was updated
        Session::flash('ticket-updated', 'The ticket was successfully updated!');

        //Redirect the user to the raffle
        return redirect('raffle');
    }

    /**
     * Remove the specified ticket from the raffle.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Select the ticket from the database using the id passed in
        $ticket = DB::table('raffle')->where('id', $id);

        //Select the entrant from the database using the id passed in
        $entrant = DB::table('raffle')->where('id', $id)->value('email');

        //Delete the selected ticket
        $ticket->delete();

        //Select the tickets column from the entrants table to be updated
        $tickets = DB::table('entrants')->where('email', $entrant)->value('tickets');

        //Check the value of the tickets column
        if ($tickets > 1) {

            //If the value is more than 1 then subtract 1
            DB::table('entrants')->where('email', $entrant)->update(['tickets' => $tickets -1]);
        } else {

            //If the value isn't more than 1 then delete the entrant
            DB::table('entrants')->where('email', $entrant)->delete();
        }

        //Create a session variable to alert the user that the ticket was deleted
        Session::flash('ticket-deleted', 'The ticket was successfully deleted!');

        //Redirect the user back to the raffle page
        return redirect('raffle');
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
