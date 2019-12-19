<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\foods;
use Session;
use Carbon\Carbon;
use DB;

class foodscontroller extends Controller
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

       $foods = DB::table('foods')
       ->join('rooms','foods.room_id','=','rooms.id')
       ->select('foods.*','rooms.room_number as rooms')
       ->get();

        return view('foods.index',compact('foods'));
    }
      
     
   

    public function create()
    {
        $foods= foods::all();

        return view('foods.create',compact('foods'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' =>  "required|max:255",
           
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $date = date('Y-m-d');

        $foods = new foods();
       
        $foods->name = $request->name;
       // $countries->created_at=Carbon::now();
        $foods->save();

        Session::flash('add','foods create successfully !');
        return redirect('/foods');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $foods= foods::find($id);
      $foods->delete();

      return redirect('/foods');
    }
}
