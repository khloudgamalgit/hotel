<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\users;
use App\roles;
use Session;
use Carbon\Carbon;
use DB;

class usersController extends Controller
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

       $users = DB::table('users')
       ->join('roles','users.role_id','=','roles.id')
       ->select('users.*','roles.title as role_name')
       ->get();

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = roles::all();

        return view('users.create',compact('roles'));
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
            'name' => "required|max:191",
            'email' => "required|unique:users,email|email|max:191",
            'password' => "required|max:191",
            'user_role' => "nullable",
          
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $date = date('Y-m-d');

        $user = new users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->user_role;
        $user->created_at=Carbon::now();
        $user->save();

        Session::flash('add','User create successfully !');
        return redirect('/users');
        
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
        $user = users::find($id);

        $user_role = DB::table('users')
        ->join('roles','users.role_id','=','roles.id')
        ->select('roles.title as role_name')
        ->where('users.id','=',$id)
        ->first();

        $roles = roles::all();

        return view('users.edit',compact('user','user_role','roles'));
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
            'name' => "required|max:191",
            'email' => ['required', 'max:191', Rule::unique('users')->ignore($request->id)],
            'password' => "nullable|max:191",
            'user_role' => "nullable",
          
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $user = users::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password !==NULL){
        $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->user_role;
        $user->save();
        Session::flash('edit','user edited successfully !');
        return redirect('/users');

       
    }
    public function activation ($id){
        $user = users::find($id);
        if($user->is_active == 1){
        $user->is_active = 0;
         Session::flash('notActive','Disactive success');
        }
        else{
        $user->is_active = 1;
          Session::flash('active','active success');
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
      $users = users::find($id);
      $users->delete();

      return redirect('/users');
    }
}
