<?php

namespace App\Http\Controllers;

use App\InvestmentLedger;
use App\Ledger;
use App\Loan;
use App\LoanAmount;
use App\Notifications\NotifyMessage;
use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
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
    public function index(Request $request)
    {
        // /customerPage
        $customers =  Customer::all();

        return view('customerPage/index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // /customerPage/create
        return view('customerPage/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // /customerPage/store

        $this->validate($request, [
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'home_add' => 'required',
            'birthday' => 'required',
            'cell_no' => 'required|unique:customers,cell_no|size:11',
        ]);
        $customer = new Customer;

        $originalDate = $request->birthday;
        $newDate = date("Y-m-d", strtotime($originalDate));

        $customer->fname = $request->fname;
        $customer->mname = $request->mname;
        $customer->lname = $request->lname;
        $customer->home_add = $request->home_add;
        $customer->comp_add = $request->comp_add;
        $customer->birthday = $newDate;
        $customer->cell_no = $request->cell_no;
        if($request->afp_serial === " "){
            $customer->afp_serial = null;
        }else{
            $customer->afp_serial = $request->afp_serial;
        }

        $customer->save();

        auth()->user()->notify(new NotifyMessage($customer));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Customer $id, Ledger $ledger, InvestmentLedger $investmentLedger)
    {
        $customer = $id;
        $invId = $investmentLedger->findLatestId($id->id);
        if($customer->ledger->count() > 0) {
            $ledgerId = $ledger->findLatestId($id->id)->id;

            if($request->ajax()){
                $loan = new LoanController();
                return $loan->generateIntrst($id, $ledger);
            }
        }

        return view('customerPage/customer', compact('customer', 'ledgerId', 'invId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $id)
    {
        // /customerPage/customer{id}/edit

        $cstData = $id;
        $fname = $cstData->fname;
        $mname = $cstData->mname;
        $lname = $cstData->lname;
        $homeAdd = $cstData->home_add;
        $compAdd = $cstData->comp_add;
        $cellNo = $cstData->cell_no;
        $birthday = $cstData->birthday;
        $id = $cstData->id;

        return view('customerPage.edit', compact('fname', 'mname', 'lname', 'homeAdd', 'compAdd', 'cellNo', 'birthday', 'id'));
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

        $originalDate = $request->birthday;
        $newDate = date("Y-m-d", strtotime($originalDate));

        $customer = Customer::find($id);

        $customer->fname = $request->fname;
        $customer->mname = $request->mname;
        $customer->lname = $request->lname;
        $customer->home_add = $request->home_add;
        $customer->comp_add = $request->comp_add;
        $customer->birthday = $newDate;
        $customer->cell_no = $request->cell_no;

        $customer->save();

        return redirect('/customerPage/customer'.$id);
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
