<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;

class rentPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $contracts = Contract::all();
        return view('admin.rents.rented_properties')->with('contracts', $contracts);
    }
    public function rent_index (){
        
        $properties = Property::where('isRented','0')->get();
        $tenants = Tenant::where('contract_id' , null)->get();

        return view('admin.rents.rent_property')->with([
            'properties' => $properties,
            'tenants' => $tenants
        ]);
    }

    public function property_index($id) {

        $contract = Contract::find($id);
        return view('admin.rents.rented_property')->with('contract' , $contract);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $req->validate([
            'property' => 'required',
            'tenant' => 'required',
            'image' => 'required',
            'rent_type' => 'required',
            'rent_amount' => 'required',
        ]);

        
        $newImageName = date('Y-m-d').'_'.$req->image->extension();
        $req->image->move(\public_path('contracts/') , $newImageName);


        $contract = Contract::create([
            'rent_type' => $req->rent_type,
            'rent_amount' => $req->rent_amount,
            'date' => date("Y-m-d"),
            'image' => $newImageName,
            'close_date' => $req->close_date
        ]);
        $contract->save();
        $property = Property::where('id' , $req->property)->first();
        $property->isRented = 1;
        $property->contract_id = $contract->id;
        $property->save();

        $tenant = Tenant::where('id' , $req->tenant)->first();
        $tenant->contract_id = $contract->id;
        $tenant->save();

        return redirect()->back()->with('success' , 'Property rented Successfully');

    }

    public function getTenant ($id){
        $tenant = Tenant::find($id);
        

        $name = $tenant->name;
        $number = $tenant->phone_number;
        $email = $tenant->email;
        $address = $tenant->address;
        $city = $tenant->city;

        return response()->json([
            'id' => $id,
            'name' => $name,
            'number' => $number,
            'email' => $email,
            'city' => $city,
            'address' => $address,
         ]);
    }

    public function getProperty ($id){
        $property = Property::find($id);

        return response()->json([
            'property' => $property,
        ]);

    }

}
