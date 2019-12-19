<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\rooms;   
use App\bookings;
use App\acceptance_bookings;
use App\customers;
use Session;
use Carbon\Carbon;
use DB;

class bookingController extends Controller
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
       $booking = DB::table('bookings')
       ->leftjoin('rooms','bookings.room_id','=','rooms.id')
       ->leftjoin('customers','bookings.customer_id','=','customers.id')
       ->select('bookings.*','rooms.room_number','customers.first_name')
       ->get();

        return view('bookings.index',compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookings = bookings::all();

        $customers = customers::all();

        $rooms = rooms::all();

        return view('bookings.create',compact('bookings','customers','rooms'));
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
            'time_from' => "nullable|date|before:time_to",
            'time_to' => "nullable|date|after:time_from",
            'additional_information' => "nullable",  
            'customer_name' => "nullable", 
            'room_number' => "nullable",
           
          
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $date = date('Y-m-d');

        $bookings = new bookings();
        $bookings->time_from = $request->time_from;
        $bookings->time_to = $request->time_to;
        $bookings->additional_information = $request->additional_information;
        $bookings->customer_id= $request->customer_name;
        $bookings->room_id = $request->room_number;
        $bookings->created_at=Carbon::now();
        $bookings->save();

        Session::flash('add','Booking create successfully !');
        return redirect('/bookings');
        
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
        $booking = bookings::find($id);

        $timestamp = strtotime($booking->time_from);
        $date = date('Y-m-d',$timestamp);

        $timestamp1 = strtotime($booking->time_to);
        $date1 = date('Y-m-d',$timestamp1);
       
        $customers = customers::all();
        $rooms = rooms::all();

        $bookings = DB::table('bookings')
        ->leftjoin('rooms','bookings.room_id','=','rooms.id')
        ->leftjoin('customers','bookings.customer_id','=','customers.id')
        ->select('bookings.*','rooms.room_number','customers.first_name')
        ->where('bookings.id','=',$id)
        ->first();

        


        return view('bookings.edit',compact('booking','date','date1','customers','rooms','bookings'));
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
            'time_from' => "nullable|date|before:time_to",
            'time_to' => "nullable|date|after:time_from",
            'additional_information' => "nullable",  
            'customer_name' => "nullable", 
            'room_number' => "nullable",
          
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $bookings = bookings::find($id);
        $bookings->time_from = $request->time_from;
        $bookings->time_to = $request->time_to;
        $bookings->additional_information = $request->additional_information;
        $bookings->customer_id = $request->customer_name;
        $bookings->room_id = $request->room_number;
        $bookings->save();
        Session::flash('edit','Bookings edited successfully !');
        return redirect('/bookings');

       
    }
    public function activation ($id){
        $bookings = bookings::find($id);
        if($bookings->is_active == 1){
        $bookings->is_active = 0;
         Session::flash('notActive','Disactive success');
        }
        else{
        $bookings->is_active = 1;
          Session::flash('active','Active success');
        }
        $bookings->save();
        return redirect('/bookings');       
    }

    public function activationAcceptance($id){
    

        $bookings = DB::table('acceptance_bookings')
        ->select('*')
        ->where('booking_id','=',$id)
        ->first();

        
        if($bookings->is_active == 1){
         
            DB::table('acceptance_bookings')
            ->select('*')
            ->where('booking_id','=',$bookings->booking_id)
            ->update([
                "is_active"=>0,

            ]);

       
         Session::flash('notActive','Disactive success');
        }
        else{
         
            DB::table('acceptance_bookings')
            ->select('*')
            ->where('booking_id','=',$bookings->booking_id)
            ->update([
                "is_active"=>1,

            ]);
          Session::flash('active','Active success');
        }
        
        return redirect('/accept_bookings');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $bookings = bookings::find($id);
      $bookings->delete();

      return redirect('/bookings');
    }

    public function acceptance($id){
    $booking = bookings::find($id);
    //dd($booking);

    $booking_acceptance = new acceptance_bookings();
    $booking_acceptance->booking_id = $booking->id;
    $booking_acceptance->time_from = $booking->time_from;
    $booking_acceptance->time_to = $booking->time_to;
    $booking_acceptance->additional_information = $booking->additional_information;
    $booking_acceptance->is_active = $booking->is_active;
    $booking_acceptance->created_at = $booking->created_at;
    $booking_acceptance->updated_at = $booking->updated_at;
    $booking_acceptance->deleted_at = $booking->deleted_at;
    $booking_acceptance->customer_id = $booking->customer_id;
    $booking_acceptance->room_id = $booking->room_id;
   $booking_acceptance->save();

   $booking->delete();

   session::flash('accept','accept booking done');
   return redirect()->back();

    }

    public function accept_bookings(){

        $booking_acceptance = acceptance_bookings::all();

        return view('bookings.accept_bookings',compact('booking_acceptance'));
    }

    public function destroyAcceptance($id){

        DB::table('acceptance_bookings')
        ->where('booking_id','=',$id)
        ->delete();

        return redirect()->back();
    }
}
