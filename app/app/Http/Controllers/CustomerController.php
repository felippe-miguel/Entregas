<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CustomersImport;
use App\Exports\CustomersExport;
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

        return redirect(route('customers.index'));
    }

    public function export()
    {
        return Excel::download(new CustomersExport, 'clientes.csv');
    }

    public function clearCustomersFromDatabase()
    {
        Customer::truncate();
        Session::flash('message','Base de clientes limpa com sucesso.');
        Session::flash('status','success');

        return redirect(route('customers.index'));
    }

    public function generateRoute()
    {
        $customers = Customer::all();

        if (count($customers) == 0) {
            Session::flash('message','Sem clientes registrados para traçar rota.');
            Session::flash('status','danger');

            return redirect(route('home'));
        }

        $params = [];
        $params['waypoints'] = ['optimize:true'];
        $params['origin'] = env('DEFAULT_ORIGIN_ADDRESS');
        $params['destination'] = env('DEFAULT_DESTINY_ADDRESS', env('DEFAULT_ORIGIN_ADDRESS'));
        $params['language'] = 'pt-BR';

        foreach ($customers as $key => $customer) {
            array_push($params['waypoints'], 'place_id:'.$customer->place_id);
        }

        $response = \GoogleMaps::load('directions')->setParam($params)->get();
        $route = json_decode($response)->routes[0];

        return view('customers.route', compact('route'));
    }
}
