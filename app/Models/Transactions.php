<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions'; // Correctly defined property

    protected $fillable = [
        'user_id',
        'transaction_type',
        'amount',
        'fee',
        'transaction_date' // Ensure this matches your form field name
    ];
}
