<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Phone;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Customer::with('getPhone')->get();
        return view('onetoone.index', compact('data'));
    }

    public function create()
    {
        return view('onetoone.create');
    }

    public function store(Request $request)
    {
        $store = new Customer;
        $store->name = $request->name;
        $store->phone_id = $request->phone_id;
        $store->save();
        return redirect('onetoone');
    }

    public function show($id)
    {
        $show = Customer::find($id);    
        return view('onetoone.show', compact('show'));
    }

    public function edit(Customer $customer)
    {
        //
    }

    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy($customer)
    {
        // dd($customer);
        $delete = Customer::find($customer);
        $delete->delete();
        return redirect('onetoone');

    }
}
