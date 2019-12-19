<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\users;
use App\roles;
use App\customers;
use Session;
use Carbon\Carbon;
use DB;

class customerController extends Controller
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

       $customers = DB::table('customers')
       ->join('countries','customers.country_id','=','countries.id')
       ->select('customers.*','countries.title as countries_name')
       ->get();

        return view('customers.index',compact('customers'));
    }

   
    public function activation ($id){
        $customers = customers::find($id);
        if($customers->is_active == 1){
        $customers->is_active = 0;
         Session::flash('notActive','Disactive Success');
        }
        else{
        $customers->is_active = 1;
          Session::flash('active','Active Success');
        }
        $customers->save();
        return redirect('/customers');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $customers = customers::find($id);
      $customers->delete();

      return redirect('/customers');
    }
}
