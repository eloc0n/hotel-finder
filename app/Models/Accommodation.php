<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;
    // protected $table = 'bookings';
    protected $table = 'reviews';

    public $timestamps = false;
}
