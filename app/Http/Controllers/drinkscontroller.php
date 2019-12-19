<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\drinks;
use Session;
use Carbon\Carbon;
use DB;

class drinkscontroller extends Controller
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
       
       $drinks = drinks::all();
    
        return view('drinks.index',compact('drinks'));
    }

    public function create()
    {
        $drinks = drinks::all();

        return view('drinks.create',compact('drinks'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' =>  "required|max:255",
           
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $date = date('Y-m-d');

        $drinks = new drinks();
       
        $drinks->name = $request->name;
    
        $drinks->save();

        Session::flash('add','drinks create successfully !');
        return redirect('/drinks');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $drinks = drinks::find($id);
      $drinks->delete();

      return redirect('/drinks');
    }
}
