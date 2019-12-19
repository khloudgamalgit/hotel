<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\rooms;
use Session;
use Carbon\Carbon;
use DB;

class roomController extends Controller
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
      

      $rooms = rooms::all();

        return view('rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = rooms::all();

        return view('rooms.create',compact('rooms'));
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
            'room_number' => "required|numeric|digits_between:1,191",
            'floor' => "nullable|digits_between:1,11",
            'description' => "nullable",
           
          
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $date = date('Y-m-d');

        $rooms = new rooms();
        $rooms->room_number = $request->room_number;
        $rooms->floor = $request->floor;
        $rooms->description = $request->description;
        $rooms->created_at=Carbon::now();
        $rooms->save();

        Session::flash('add','Room create successfully !');
        return redirect('/rooms');
        
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
        $rooms = rooms::find($id);

        return view('rooms.edit',compact('rooms'));
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
            'room_number' => "required|numeric|digits_between:1,191",
            'floor' => "nullable|digits_between:1,11",
            'description' => "nullable",
          
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $rooms = rooms::find($id);
        $rooms->room_number = $request->room_number;
        $rooms->floor = $request->floor;
        $rooms->description = $request->description;
        $rooms->save();
        Session::flash('edit','Room edited successfully !');
        return redirect('/rooms');

       
    }
    public function activation ($id){
        $user = users::find($id);
        if($user->is_active == 1){
        $user->is_active = 0;
         Session::flash('notActive','Disactive success');
        }
        else{
        $user->is_active = 1;
          Session::flash('active', 'active success');
        }
        $user->save();
        return redirect('/users');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $rooms = rooms::find($id);
      $rooms->delete();

      return redirect('/rooms');
    }
}
