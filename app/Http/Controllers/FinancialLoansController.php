<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinancialLoansRequest;
use App\Http\Requests\UpdateFinancialLoansRequest;
use App\Models\FinancialLoans;
use App\Models\Payments;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FinancialLoansController extends Controller
{
    /**
     * Show the form for a Loan.
     */
    public function index()
    {
        
        return view('home');
    }

    /**
     * create a New Loan.
     */
    public function create(Request $request)
    {
        try{
        $loan = new FinancialLoans;
        $loan->client_name = $request->client_name;
        $loan->loan_amount = $request->loan_amount;
        $added_tax_req=intval($request->loan_amount);
        $added_tax_value=$added_tax_req*20/100;
        $loan->added_tax = $added_tax_value;
        $loan->number_of_months = $request->number_of_months;
        $payment=($added_tax_req+$added_tax_value)/intval($request->number_of_months);
        $loan->monthly_payment=$payment;
        $loan->save();
        $table=1;
        $data2 = [];
        $date = Carbon::now();
        for ($x = 1; $x <= $request->number_of_months; $x++) {
            $data2[] = [
                'payment' => $payment,
                'number' => $x,
                'month' => $date->format('Y/m/d')
                 ];
                 $date->addMonth();
          }        
        return redirect('home')->with('status', 'تم اضافة القرض')->with('table', $data2)->with('name', $request->client_name)->with('amount', $added_tax_req+$added_tax_value);
        }
        catch (\Exception $e) {
          return  redirect('home')->with('error', 'لم تتم إضافة القرض لإن اسم المقترض مكرر يرجو ادخال اسم فريد');
        
    }
    
}

     /**
     * Show the form for Search In Loans.
     */
    public function searchInLoans(Request $request)
    {
     return view('searchInLoans');
    }

     /**
     * Show the result for Search In Loans.
     */
    
    public function LoansDeatils(Request $request)
    {
        $get_client_name=FinancialLoans::where('client_name',$request->client_name)->first();
        $total_loan_amount=$get_client_name->loan_amount + $get_client_name->added_tax;
        $loans_data[] = [
            'client_name' => $get_client_name->client_name,
            'total_loan_amount' => $total_loan_amount,
            'number_of_months' => $get_client_name->number_of_months,
            'number_of_payments_paid' => $get_client_name->number_of_payments_paid,
            'monthly_payment' => $get_client_name->monthly_payment,
            'created_at' => $get_client_name->created_at->format('Y/m/d')
             ];
             $get_loans_deatils=Payments::where('financial_id',$get_client_name->id)->get();         
             return redirect('search_in_loans')->with('loans_data',$loans_data)->with('loans_deatils',$get_loans_deatils)->with('id', $get_client_name->id)->with('name', $get_client_name->client_name);

    }

}
