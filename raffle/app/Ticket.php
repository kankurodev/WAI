<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //Link the model with the proper table
    protected $table = 'raffle';
}
