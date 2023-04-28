<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialLoans extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name','loan_amount','added_tax','number_of_months','number_of_payments_paid','monthly_payment'
    ];
}
