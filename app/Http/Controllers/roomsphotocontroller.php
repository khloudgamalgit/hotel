<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\room_photos;   

use Session;
use Carbon\Carbon;
use DB;

class roomsphotocontroller extends Controller
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
       $room_photos = DB::table('room_photos')
       ->join('rooms','room_photos.room_id','=','rooms.id')
       ->select('room_photos.*','rooms.img as imgs')
       ->get() ;

        return view('room_photos.index',['room_photos'=>$room_photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room_photos.create');
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
        
           
          //  'img' => 'required|mimes:mp4,mov,ogg,qt|max:255',
           
           
        ];

        // vaildate the form
        $this->validate($request, $rules, $this->messages);

        $date = date('Y-m-d');

        $roomPhotos = new room_photos();

        if ($request->file('img') == true) {
            $photo_url = $request->img;
            $photo_url_photo = str_random(30) . '.' . $photo_url->getClientOriginalExtension();
            $photo_url->move(public_path('uploads/photorooms'), $photo_url_photo);
            $full_path_photo_url = Request()->root() . '/uploads/photorooms/' . $photo_url_photo;
            $photodrinks->img = $full_path_photo_url;
        }
       
        $roomPhotos->created_at=Carbon::now();
        $roomPhotos->save();

        Session::flash('add','roomPhotos create successfully !');
        return redirect('/roomPhotos');
        
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
      $roomPhotos =room_photos::find($id);
      $roomPhotos->delete();

      return redirect('/roomPhotos ');
    }
}

