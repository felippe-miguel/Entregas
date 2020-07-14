<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CustomersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Customer;
use Session;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            Session::flash('message','Cliente não encontrado.');
            Session::flash('status','danger');
            
            return redirect(route('home'));
        }
        
        return view('customers.show', compact('customer'));
    }

    public function import() 
    {
        Excel::import(new CustomersImport, request()->file('file'));
        Session::flash('message','Clientes importados com sucesso.');
        Session::flash('status','success');

        return redirect('/')->with('success', 'All good!');
    }
}
