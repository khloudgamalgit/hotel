<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\introduction;   
use App\tours;
use Session;
use Carbon\Carbon;
use DB;

class toursController extends Controller
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
       $tours = DB::table('tours')
       ->leftjoin('countries','tours.country_id','=','countries.id')
       ->leftjoin('city','tours.city_id','=','city.id')
       ->select('tours.*','countries.title as country_name','city.name as city_name')
       ->get();

        return view('tours.index',compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $country = DB::table('countries')
        ->select('*')
        ->get();

        $city = DB::table('city')
        ->select('*')
        ->get();

      

        return view('tours.create',compact('country','city'));
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
           'title' =>"required|max:255" ,     
            'description' => "required|string",  
           
           
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $date = date('Y-m-d');

;
     
       $tour = new tours();
       //select_country 
       //select_city
        //$tour= tours::find($id);
        $tour->title = $request->title;
        $tour->description = $request->description;
        $tour->country_id = $request->select_country;
        $tour->city_id= $request->select_city;
        $tour->save();
        Session::flash('edit','tours edited successfully !');
        return redirect('/tours');


       
        
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
    public function destroy($id)
    {
      $tours = tours::find($id);
      $tours->delete();

      return redirect('/tours');
    }
}


