<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Loan;
use App\Employee;


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
        $employee = Employee::all();
        $customer = $id;

        return view('loanPages.addLoan',compact('employee', 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAmtApp()
    {
        //
        return view('loanPages.approveAddLoan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            $loanData = new Loan;
            $customer = new Customer;

            $originalDateApp = request('date_app');
            $newDateApp = date("Y-m-d", strtotime($originalDateApp));

            $originalDatePrep = request('date_prep');
            $newDatePrep = date("Y-m-d", strtotime($originalDatePrep));

            $loanData->date_app = $newDateApp;
            $loanData->date_prep = $newDatePrep;
            $loanData->loaned_by = 1;
            $loanData->prep_by = request('prep_by');
            $loanData->amt_app = request('amt_app');
            $loanData->col_off = request('col_off');
            $loanData->co_makers = request('co_makers');
            $loanData->save();
    }

    public function storeAmtApp(Request $request, Loan $loanData, Customer $customer)
    {
        //
        dd($loanData);
        $loanData->amt_apr = $request->amount;
        $loanData->less = $request->less;
        $loanData->interest = $request->interest;
        $loanData->serv_change = $request->serv_change;
        $loanData->notarial = $request->notarial;
        $loanData->others = $request->others;
        $loanData->prev_loan = $request->prev_loan;
        $loanData->total = $request->total;

        $loanData->save();
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
    public function show($id)
    {
        //
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
