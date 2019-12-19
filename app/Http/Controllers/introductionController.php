<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\introduction;   

use Session;
use Carbon\Carbon;
use DB;

class introductionController extends Controller
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
       $introduction = introduction::all();

        return view('introduction.index',compact('introduction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('introduction.create');
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
        
            'description' => "required|string",  
            'video_url' => 'required|mimes:mp4,mov,ogg,qt|max:255',
           
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $date = date('Y-m-d');

        $introduction = new introduction();

        if ($request->file('video_url') == true) {
            $photo_url = $request->video_url;
            $photo_url_photo = str_random(30) . '.' . $photo_url->getClientOriginalExtension();
            $photo_url->move(public_path('uploads/introduction'), $photo_url_photo);
            $full_path_photo_url = Request()->root() . '/uploads/introduction/' . $photo_url_photo;
            $introduction->video_url = $full_path_photo_url;
        }
        $introduction->description = $request->description;
        $introduction->created_at=Carbon::now();
        $introduction->save();

        Session::flash('add','Introduction create successfully !');
        return redirect('/introduction');
        
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

    

public function edit($id)
{
    $introduction = introduction::find($id);

    return view('introduction.edit',compact('introduction'));
}
public function destroy($id)
{
  $introduction = introduction::find($id);
  $introduction->delete();

  return redirect('/introduction');
}
}
