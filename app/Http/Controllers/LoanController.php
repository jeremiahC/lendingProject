<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Ledger;
use App\LoanAmount;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use App\Loan;
use App\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $loans = Loan::all();
        $amounts = LoanAmount::all();

        return view('loanPages.index', compact('loans', 'amounts'));
    }

    public function create(Customer $id)
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
    public function createAmtApp(Loan $id)
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
            $loanData->short_term = request('short_term');
            $loanData->months_to_pay = request('months');
            $loanData->save();

            return $loanData->id;
    }

    public function storeAmtApp(Request $request, LoanAmount $loanData)
    {
        $originalDate = $request->date_start;
        $newDate = date("Y-m-d", strtotime($originalDate));

        $loanData->loan_id = $request->loan_id;
        $loanData->amt_apr = $request->amount;
        $loanData->less = $request->less;
        $loanData->interest = $request->interest;
        $loanData->interest_month = $request->int_month;
        $loanData->serv_charge = $request->serv_charge;
        $loanData->notarial = $request->notarial;
        $loanData->others = $request->others;
        $loanData->prev_loan = $request->prev_loan;
        $loanData->total = $request->total;
        $loanData->approved = null;
        $loanData->transaction = $request->transaction;
        $loanData->gives = $request->gives;
        $loanData->date_start = $newDate;
        $loanData->save();

        return redirect('/show/loan/'.$request->loan_id);
    }

    public function newTransac($id){
        return view('loanPages.newTransaction', compact('id'));
    }

    public function storeTransac(Request $request){
        $ledger = new Ledger();

        $balance =  $ledger->findLatestId($request->customer_id)->balance;
        $newBal = $balance + $request->amount;

        $ledger->transaction = $request->transaction;
        $ledger->customer_id = $request->customer_id;

        if($request->transaction === "CASH" ||
            $request->transaction === "Cash" ||
            $request->transaction === "Palawan" ||
            $request->transaction === "P-PADALA" ||
            $request->transaction === "ATTY. FEE") {

            $ledger->loan = $request->amount;
        }else{
            $ledger->amount = $request->amount;
        }

        $ledger->balance = $newBal;
        $ledger->save();

        return redirect('/customerPage');
    }

    public function approveLoan(Request $request, LoanAmount $amountData)
    {
        $amount = $amountData->find($request->amount_id);
        $amount->approved = "yes";
        $amount->save();

        $interest = $amount->interest;
        $theAmount = $amount->amt_apr;

        if($amount->loan->short_term === "yes"){
            $months = $amount->loan->months_to_pay * 2;
            for($i = 0; $i < $months; $i++) {
                $ledgerData = new Ledger();
                $ledgerData->date = $amount->date_start;
                $ledgerData->gives = $amount->gives;
                $ledgerData->customer_id = $amount->loan->customer_id;
                $ledgerData->amount = $theAmount;
                $ledgerData->interest = $interest;
                $ledgerData->save();
            }
        }else{
            $ledgerData = new Ledger();
            $ledgerData->customer_id = $amount->loan->customer_id;
            $ledgerData->amount = $theAmount;
            $ledgerData->interest = $interest;
            $ledgerData->date = $amount->date_start;
            $ledgerData->transaction = $amount->transaction;
            $ledgerData->balance = $theAmount;
            $ledgerData->save();
        }

    }

    public function disapproveLoan(Request $request, LoanAmount $amountData){
        $amount = $amountData->find($request->amount_id);
        $amount->approved = "no";
        $amount->save();
    }


    public function payLoanPage(Customer $id, Ledger $ledgId)
    {
        $loans = Loan::all();
        return view('loanPages.payLoan', compact('loans', 'id', 'ledgId'));

    }

    public function payLoan(Request $request, Customer $customer, Payment $payment){
        $customerId = $request->customer_id;
        $cust = $customer->find($customerId);
        //save to payments table

        $payment->customer_id = $customerId;
        $payment->payment_for = $request->payment_for;
        $payment->amount = $request->amount;
        $payment->ledger_id = $request->ledId;
        $payment->save();

        $balance = $request->balance;
        $payAmount =  $request->amount;



        foreach ($cust->loan as $loan){
            if($loan->short_term === "yes") {
                $ledger = Ledger::find($request->ledId);
                $ledger->withdraw = $payAmount;
                $ledger->net = $payAmount - $balance;
            }else{
                $ledger = new Ledger();
                $ledger->customer_id = $customerId;
                $ledger->date = date('Y-m-d');
                $ledger->payments = $payAmount;
                $ledger->transaction = "withdraw";
                $ledger->balance = $balance - $payAmount;
            }
        }

        $ledger->save();

        return  $balance - $payAmount;
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

    public function getIntrst(Customer $id, Ledger $ledger){
        $loanIntrate = $id->findFirstId($id->id);
        $currentBal = $ledger->findLatestId($id->id)->balance;

        return view('loanPages.addInterest', compact('id', 'loanIntrate', 'currentBal'));
    }

    public function storeIntrst(Request $request, Ledger $ledger){
        $intRate = $request->intrate/100;
        $currtBal = str_replace(',','',$request->currtBal);
        $cutomerId = $request->id;

        $amountInt = $currtBal * $intRate;
        $newBal = $currtBal + $amountInt;

        $ledger->customer_id = $request->id;
        $ledger->transaction = "Interest";
        $ledger->interest = round($amountInt);
        $ledger->balance = round($newBal);
        $ledger->save();

        return redirect('/customerPage/customer'. $request->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $id)
    {
        return view('loanPages.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanAmount $id)
    {
        $originalDate = $request->date_start;
        $newDate = date("Y-m-d", strtotime($originalDate));

        $loanData = $id;

        $loanData->loan_id = $request->loan_id;
        $loanData->amt_apr = $request->amount;
        $loanData->less = $request->less;
        $loanData->interest = $request->interest;
        $loanData->serv_charge = $request->serv_charge;
        $loanData->notarial = $request->notarial;
        $loanData->others = $request->others;
        $loanData->prev_loan = $request->prev_loan;
        $loanData->total = $request->total;
        $loanData->transaction = $request->transaction;
        $loanData->gives = $request->gives;
        $loanData->date_start = $newDate;
        $loanData->save();

        return redirect('/show/loan/'.$request->loan_id);
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
