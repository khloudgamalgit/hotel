<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\food_photos;   

use Session;
use Carbon\Carbon;
use DB;

class foodsPhotocontroller extends Controller
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
       $food_photos = DB::table('food_photos')
       ->join('foods','food_photos.food_id','=','foods.id')
       ->select('food_photos.*','foods.img as foods')
       ->get();

        return view('food_photos.index',compact('food_photos '));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food_photos.create');
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
        
           
            'img' => 'required|mimes:mp4,mov,ogg,qt|max:255',
           
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $date = date('Y-m-d');

        $food_photos = new food_photos();

        if ($request->file('img') == true) {
            $photo_url = $request->img;
            $photo_url_photo = str_random(30) . '.' . $photo_url->getClientOriginalExtension();
            $photo_url->move(public_path('uploads/photofoods'), $photo_url_photo);
            $full_path_photo_url = Request()->root() . '/uploads/photofoods/' . $photo_url_photo;
            $food_photos->img = $full_path_photo_url;
        }
       
        $food_photos->created_at=Carbon::now();
        $food_photos->save();

        Session::flash('add','photofoods create successfully !');
        return redirect('/foodphotos');
        
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
    public function destroy($id)
    {
        $food_photos =food_photos::find($id);
        $food_photos->delete();

      return redirect('/foodphotos ');
    }
}

