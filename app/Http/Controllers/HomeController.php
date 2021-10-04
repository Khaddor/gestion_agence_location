<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tenant_count = Tenant::count();
        $property_vaccant_count = Property::where('isRented' , '0')->count();
        $property_occupied_count = Property::where('isRented' , '1')->count();
        
        return view('admin.home')->with([
            'tenant_count' => $tenant_count,
            'property_vaccant_count' => $property_vaccant_count,
            'property_occupied_count' => $property_occupied_count
        ]);
    }
}
