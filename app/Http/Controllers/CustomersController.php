<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // /customerPage
        $customers = Customer::all();
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
    public function store()
    {
        // /customerPage/store
        $this->validate(request(), [
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'home_add' => 'required',
            'comp_add' => 'required',
            'birthday' => 'required',
            'cell_no' => 'required',
        ]);

        $customer = new Customer;

        $originalDate = request('birthday');
        $newDate = date("Y-m-d", strtotime($originalDate));



        $customer->fname = request('fname');
        $customer->mname = request('mname');
        $customer->lname = request('lname');
        $customer->home_add = request('home_add');
        $customer->comp_add = request('comp_add');
        $customer->birthday = $newDate;
        $customer->cell_no = request('cell_no');
        $customer->save();

//        return request()->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $id)
    {
        // /customerPage/customer{id}
        $customer_id = $id;
        return view('customerPage/customer', compact('customer_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // /customerPage/customer{id}/edit
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
