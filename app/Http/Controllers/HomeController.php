<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Loan;
use App\LoanAmount;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Loan $loan, Customer $customer, LoanAmount $loanAmount)
    {
        $customers = $customer->count();
        $noLoans = $loan->count();
        $amounts = $loanAmount->count();
        $totalLoans = $noLoans + $amounts;
        $amount = $loanAmount->countAllForAppr();
        $amountAppr = $loanAmount->countAllApproved();

        return view('dashboard/index', compact('customers', 'totalLoans', 'amount', 'amountAppr'));
    }

}
