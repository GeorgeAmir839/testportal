<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Companies = Company::orderBy('created_at', 'desc');
        $items = $Companies->paginate(15);
        return view('companies.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $Companies = Company::all();
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            request(),
            [
                // 'name' => 'required|max:120',
                // 'email' => 'required|email|unique:Companies,email,' . $id,
                // "banner"  => "required",
                // "banner"  => "dimensions:max_width=300,max_height=300",

                // 'Company_type' => 'required',
                // 'phone' => 'required|unique:Companies,phone,'. $id,
            ]
        );
        
        Company::create($request->all());
        
            return redirect()->route('companies.index')->with('message', 'IT WORKS!');
      
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view("companies.edit", compact('company'));
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
        $Company= Company::findOrFail($id);
         $Company->update($request->all());
       
            return redirect()->route('companies.index')->with('message', 'IT WORKS!');
       
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::findOrFail($id)->delete();

        return redirect()->route('companies.index')->with('message', 'IT WORKS!');
    }
}
