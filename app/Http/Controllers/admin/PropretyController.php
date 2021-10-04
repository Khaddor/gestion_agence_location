<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropretyController extends Controller
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
        $properties = Property::all();

        return view('admin.properties.properties')->with([
            'properties' => $properties
        ]);
    }

    public function index_add () {

        return view('admin.properties.add_property');
    }

    public function index_edit ($id){
        $property = Property::where('id' , $id)->first();
        return view('admin.properties.edit_property')->with('property' , $property);
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
        
        $req->validate([
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'description' => 'required',
            'image' => 'required',
            'type' => 'required',
        ]);
     /*  $image = $req->file('image');
        $newImageName = time().'_'.$req->name.'.jpeg';
        $image->move('propertiesImages/' , $newImageName);*/

           

            $newImageName = time() .'_'.$req->name .'.'.$req->image->extension();

            $req->image->move(\public_path('propertiesImages'),$newImageName);

        $property = Property::create([
            'name' => $req->name,
            'city' => $req->city,
            'address' => $req->address,
            'description' => $req->description,
            'image' => $newImageName,
            'type' => $req->type,
        ]);

        return redirect()->back()->with('success' , 'Property added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $property = Property::where('id',$req->id)->first();

        $req->validate([
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        $property->name = $req->name;
        $property->city = $req->city;
        $property->address = $req->address;
        $property->type = $req->type;
        $property->description = $req->description;
        $property->update();


        return redirect()->route('properties_index')->with('success' , 'Property Updated successfully');
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
