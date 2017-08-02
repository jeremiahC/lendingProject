<?php

namespace App\Http\Controllers;

use App\Customer;
use App\InvestAmount;
use App\InvestmentLedger;
use App\Investments;
use App\Ledger;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investments = Investments::all();
        $investamount = InvestAmount::all();

        return view('investments.index', compact('investments', 'investamount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $id)
    {
        $employee = Auth::user()->name;
        $employeeId = Auth::id();
        $customer = $id;

        return view('investments.addInvestments', compact('employee','employeeId','customer'));
    }

    public function createAmtApp(Investments $id)
    {
        //
        return view('investments.approveAddInv', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Investments $investments)
    {
        $originalDateApp = request('date_app');
        $newDateApp = date("Y-m-d", strtotime($originalDateApp));

        $originalDatePrep = request('date_prep');
        $newDatePrep = date("Y-m-d", strtotime($originalDatePrep));

        $investments->date_app = $newDateApp;
        $investments->date_prep = $newDatePrep;
        $investments->customer_id = $request->customer_id;
        $investments->prep_by = request('prep_by');
        $investments->amt_app = request('amt_app');
        $investments->save();

        return $investments->id;
    }

    public function storeInvAmt(Request $request, InvestAmount $investAmount)
    {
        $originalDate = $request->date_start;
        $newDate = date("Y-m-d", strtotime($originalDate));

        $investAmount->investments_id = $request->investment_id;
        $investAmount->amt_apr = $request->amount;
        $investAmount->interest = $request->interest;
        $investAmount->interest_month = $request->int_month;
        $investAmount->total = $request->total;
        $investAmount->approved = null;
        $investAmount->transaction = $request->transaction;
        $investAmount->date_start = $newDate;
        $investAmount->save();

        return redirect('investments/show/'.$request->investment_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Investments $id, User $userId, Customer $customerId)
    {
        $user = $userId->find($id->prep_by);
        $customer = $customerId->find($id->customer_id);
        return view('investments.show', compact('id', 'user', 'customer'));

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

    public function approve(Request $request, InvestAmount $investAmount, InvestmentLedger $investmentLedger)
    {
        $amount = $investAmount->find($request->amount_id);
        $amount->approved = "yes";
        $amount->save();

        $interest = $amount->interest;
        $theAmount = $amount->amt_apr;

        $investmentLedger->customer_id = $request->customer_id;
        $investmentLedger->date = $amount->date_start;
        $investmentLedger->deposit = $theAmount;
        $investmentLedger->interest = $interest;
        $investmentLedger->transaction = "DEPOSIT";
        $investmentLedger->balance = $theAmount;
        $investmentLedger->save();
    }

    public function disapprove(Request $request, LoanAmount $amountData){
        $amount = $amountData->find($request->amount_id);
        $amount->approved = "no";
        $amount->save();
    }

    public function getInterest(Customer $id, InvestmentLedger $investmentLedger){
        $loanIntrate = $id->findFirstInvId($id->id);
        $currentBal = $investmentLedger->findLatestId($id->id)->balance;

        return view('investments.addInterest', compact('id', 'loanIntrate', 'currentBal'));
    }

    public function postInterest(Request $request, InvestmentLedger $investmentLedger){
        $intRate = $request->intrate/100;
        $currtBal = str_replace(',','',$request->currtBal);

        $amountInt = $currtBal * $intRate;
        $newBal = $currtBal + $amountInt;

        $investmentLedger->customer_id = $request->id;
        $investmentLedger->transaction = "Interest";
        $investmentLedger->interest = round($amountInt);
        $investmentLedger->balance = round($newBal);
        $investmentLedger->save();

        return redirect('/customerPage/customer'. $request->id);
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
