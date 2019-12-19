<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\city;
use Session;
use Carbon\Carbon;
use DB;

class citycontroller extends Controller
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
       // $users = users::all();

     
       $city = DB::table('city')
       ->join('countries','city.country_id','=','city.id')
       ->select('city.*','city.name as cities')
       ->get();

    
        return view('city.index',compact('city'));
    }

    public function create()
    {
        $city = city::all();

        return view('city.create',compact('city'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' =>  "required|max:255",
           
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $date = date('Y-m-d');

        $city = new city();
       
        $city->name = $request->name;
       $city->created_at=Carbon::now();
        $city->save();

        Session::flash('add','city create successfully !');
        return redirect('/cities');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $city = city::find($id);
      $city->delete();

      return redirect('/cities');
    }
}
