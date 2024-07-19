<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    use HasFactory;

    protected $fillable = [
        'interested',
        'product_title',
        'user_email',
        'purchase_date',
        'price',
        'promotion',
    ];
}
