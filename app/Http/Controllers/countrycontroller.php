<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\countries;
use Session;
use Carbon\Carbon;
use DB;

class countrycontroller extends Controller
{
    private $messages = [
        'required' => 'must enter value !',
        'numeric' => 'must enter numeric value !',
        'unique' => 'يجب ادخال قيمة مختلفه',
        'max' => 'يجب ان لا يتعدى عدد الحروف او الارقام المسموح به',
        'min' => 'يجب ان لا يقل عن عدد الحروف او الارقام المسموح به',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      

      $countries = countries::all();

        return view('countries.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries =countries::all();

        return view('countries.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'shortcode' =>  "required|max:191",
            '	title' => "required|max:191",
         
           
          
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $date = date('Y-m-d');

        $countries = new countries();
        $countries->shortcode= $request->shortcode;
        $countries->title = $request->title;
        $countries->created_at=Carbon::now();
        $countries->save();

        Session::flash('add','country create successfully !');
        return redirect('/countries');
        
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
        $countries = countries::find($id);
        if(empty($countries)){

            session::flash('err','not found');
            return redirect()->back();
         
        }

        return view('countries.edit',compact('countries'));
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
       
        $rules = [
           
            'shortcode' =>  "required|max:191",
            'title' => "required|max:191",      
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $countries = countries::find($id);
       
        $countries->shortcode= $request->shortcode;
        $countries->title = $request->title;
       
        $countries->save();
        Session::flash('edit','countries edited successfully !');
        return redirect('/countries');

       
    }
  
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $countries= countries::find($id);
      //dd($countries);
      $countries->delete();

      return redirect('/countries');
    }
}
