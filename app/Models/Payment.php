<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

	protected $table = 'payment';
  protected $fillable = [
  'id',
  'user_id',
  'tran_id',
  'first_name',
  'last_name',
  'address',
  'city',
  'state',
  'country',
  'zip_code',
  'email',
  'amount',
  'currency',
  'country',
  'card_no',
  'exp_month',
  'exp_year',
  'cvv',
  'reason',
  'status',
  ];
  
}
