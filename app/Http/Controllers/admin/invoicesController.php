<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;

class invoicesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (){
        
        $contracts = Contract::all();
        return view('admin.invoices.generate_invoices')->with([
            'contracts' => $contracts
        ]);
    }


    public function get_contract ($id ){

        $contract = Contract::find($id);
        $property_name = $contract->property->name ;
        $tenant_name = $contract->tenant->name;
        $amount = $contract->rent_amount;

        return response()->json([
            'contract' => $contract,
            'pName' => $property_name,
            'tName' => $tenant_name,
            'amount' => $amount,
        ]);
    }


    public function generate_pdf (Request $req){

        $contract = Contract::find($req->contract_id);

        $data = [
            'date' => $req->date,
            'contract' => $contract,
        ];

        $pdf = PDF::loadView('admin.invoices.invoice' , $data);

          return $pdf->download('invoice'.$req->contract_id.'_'.$req->date.'.pdf');
         // return redirect()->back();


    }
}
