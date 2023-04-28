<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;
use App\Models\Payments;
use App\Models\FinancialLoans;
use Illuminate\Http\Request;
use Carbon\Carbon;



class PaymentsController extends Controller
{
      /**
     * Show the form for Search.
     */
    public function index()
    {
        //
        return view('addPayment');
    }

    /**
     * Show the result of search.
     */
    public function search(Request $request)
    {
        $get_client_name=FinancialLoans::where('client_name',$request->client_name)->first();
     $total_loan_amount=$get_client_name->loan_amount + $get_client_name->added_tax;
        $client_data[] = [
            'client_name' => $get_client_name->client_name,
            'total_loan_amount' => $total_loan_amount,
            'number_of_months' => $get_client_name->number_of_months,
            'number_of_payments_paid' => $get_client_name->number_of_payments_paid,
            'created_at' => $get_client_name->created_at->format('Y/m/d')
             ];
      return  redirect('add_payment')->with('client_details',$client_data)->with('id', $get_client_name->id);
    }

    /**
     * Store a newly created Payment in storage.
     */
    public function makePayment(Request $request)
    {
        $get_client=FinancialLoans::where('id',$request->id)->first();
        if($get_client->number_of_months==$get_client->number_of_payments_paid){
            return  redirect('add_payment')->with('error', 'تم تسديد جميع دفعات القرض ');
        }else{
        try{
           
            $payment = new Payments;
            $payment->financial_id = $get_client->id;
            $payment->number_of_payment = $get_client->number_of_payments_paid + 1;
            $payment->payment_value=$get_client->monthly_payment;
            $payment->save();
            $get_client->number_of_payments_paid = $get_client->number_of_payments_paid + 1;
            $get_client->save();
            
            return  redirect('add_payment')->with('status', 'تم اضافة الدفعة بنجاح');
            }
            catch (\Exception $e) {
              return  redirect('add_payment')->with('error', 'لم تتم إضافة الدفعة يرجى إعادة المحاولة ');
            
        }
    }
    }

}
