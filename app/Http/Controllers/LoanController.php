<?php

namespace App\Http\Controllers;

use App\Customer;
use App\LoanAmount;
use App\User;
use Illuminate\Http\Request;
use App\Loan;
use App\Employee;
use Illuminate\Support\Facades\Auth;


class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Customer $id)
    {
        //redirect in form

        $employee = Auth::user()->name;
        $employeeId = Auth::id();
        $customer = $id;

        return view('loanPages.addLoan',compact('employee', 'customer', 'employeeId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAmtApp($id)
    {
        //
        return view('loanPages.approveAddLoan', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Loan $loanData, $id)
    {
            $originalDateApp = request('date_app');
            $newDateApp = date("Y-m-d", strtotime($originalDateApp));

            $originalDatePrep = request('date_prep');
            $newDatePrep = date("Y-m-d", strtotime($originalDatePrep));

            $loanData->date_app = $newDateApp;
            $loanData->date_prep = $newDatePrep;
            $loanData->customer_id = $id;
            $loanData->prep_by = request('prep_by');
            $loanData->amt_app = request('amt_app');
            $loanData->col_off = request('col_off');
            $loanData->co_makers = request('co_makers');
            $loanData->save();
    }

    public function storeAmtApp(Request $request, LoanAmount $loanData)
    {
        $loanData->loan_id = $request->loan_id;
        $loanData->amt_apr = $request->amount;
        $loanData->less = $request->less;
        $loanData->interest = $request->interest;
        $loanData->serv_charge = $request->serv_charge;
        $loanData->notarial = $request->notarial;
        $loanData->others = $request->others;
        $loanData->prev_loan = $request->prev_loan;
        $loanData->total = $request->total;
        $loanData->approved = null;
        $loanData->transaction = $request->transaction;
        $loanData->save();

        return redirect('/customerPage');
    }

    public function approveLoan(Request $request, LoanAmount $amountData){
        $amount = $amountData->find($request->amount_id);
        $amount->approved = date('Y-m-d');
        $amount->save();
    }

    public function payLoan()
    {
        $loans=Loan::all();
        return view('loanPages.payloan', compact('loans'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $id, User $userId, Customer $customerId)
    {
        //
        $user = $userId->find($id->prep_by);
        $customer = $customerId->find($id->customer_id);
        return view('loanPages.show', compact('id', 'user', 'customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
