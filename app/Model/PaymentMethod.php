<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class PaymentMethod extends Model
{

    protected $table = 'payment_methods';
    protected $fillable = ['title','status','image'];
}