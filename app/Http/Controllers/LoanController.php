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
    public function index(Loan $loan, LoanAmount $loanAmount){

        $loans = $loan->all();
        $apprLoans = $loanAmount->all();

        return view('loanPages.index', compact('loans', 'apprLoans'));
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

    public function approveLoan(Request $request, LoanAmount $amountData, Ledger $ledgerData)
    {
        $amount = $amountData->find($request->amount_id);
        $amount->approved = date('Y-m-d');
        $amount->save();

        $interest = $amount->interest;
        $theAmount = $amount->amt_apr;

        $ledgerData->customer_id = $amount->loan->customer_id;
        $ledgerData->date = $amount->approved;
        $ledgerData->transaction = $amount->transaction;
        $ledgerData->amount =  $theAmount;
        $ledgerData->interest = $interest;
        $ledgerData->balance = $theAmount;
        $ledgerData->save();

    }

    public function payLoanPage(Customer $id, $ledId)
    {
        $loans=Loan::all();
        return view('loanPages.payloan', compact('loans', 'id', 'ledId'));

    }

    public function payLoan(Request $request, Ledger $ledger, Customer $customer, Payment $payment){
        $customerId = $request->customer_id;

        //save to payments table

        $payment->customer_id = $customerId;
        $payment->payment_for = $request->payment_for;
        $payment->amount = $request->amount;
        $payment->ledger_id = $request->ledId;
        $payment->save();

        $ledgerArray = $customer->find($request->customer_id)->ledger;
        $arrayLength = sizeof($ledgerArray) - 1;

        $balance = $ledgerArray[$arrayLength]->balance;
        $payAmount =  $request->amount;

        $ledger->customer_id = $customerId;
        $ledger->transaction = "withdraw";
        $ledger->date = date('Y-m-d');
        $ledger->payments = $payAmount;
        $ledger->balance = $balance - $payAmount;
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

    public function generateIntrst(Customer $id, Ledger $ledgerData){

        $ledgerArray = $id->ledger;
        $arrayLength = sizeof($ledgerArray);
        for($i=0;$i < $arrayLength; $i++ ) {
            if ($ledgerArray[$i]->transaction === "interest") {
                $date = $ledgerArray[$i]->date;
            }else{
                $date = $ledgerArray[0]->date;
            }
        }

        foreach ($id->ledger as $loans) {
            $currentDate = date('Y-m-d');
            $dateAppr = date_create($date);
            date_add($dateAppr, date_interval_create_from_date_string('15 days'));
            $intrstDate = date_format($dateAppr, 'Y-m-d');

            if($intrstDate){
                    $ledgerArray =  $id->ledger;
                    $arrayLength = sizeof($ledgerArray)-1;

                    $balance = $ledgerArray[$arrayLength]->balance;

                    $interest = $loans->interest / 100;
                    $currentBal = $balance;
                    $amountInt = $currentBal * $interest;
                    $newBal = $currentBal + $amountInt;

                    $ledgerData->customer_id = $id->id;
                    $ledgerData->transaction = "interest";
                    $ledgerData->date = $intrstDate;
                    $ledgerData->interest = $amountInt;
                    $ledgerData->balance = $newBal;
                    $ledgerData->save();
            }
        }
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
