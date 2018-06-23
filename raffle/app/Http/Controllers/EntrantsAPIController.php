<?php


namespace App\Http\Controllers;

use App\Http\Controllers\APIBaseController as APIBaseController;
use Illuminate\Support\Facades\DB;


class EntrantsAPIController extends APIBaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Select the data from the entrants table
        $entrants = DB::table('entrants')->select('id', 'entrant as name', 'email', 'tickets as ticket_count')->get();

        //Select the data from the raffle table
        $tickets = DB::table('raffle')->select('id', 'entrant as name', 'email', 'status as ticket_status', 'created_at as date')->get();

        //Return the response and pass in the data
        return $this->sendResponse(['Entrants'=>$entrants->toArray(), 'Tickets'=>$tickets->toArray()], 'Data retrieved successfully.');
    }
}