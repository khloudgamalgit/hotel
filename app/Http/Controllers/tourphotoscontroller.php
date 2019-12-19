<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\tour_photos;   

use Session;
use Carbon\Carbon;
use DB;

class tourPhotoscontroller extends Controller
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
       $tour_photos = DB::table('tour_photos')
       ->join('tours','tour_photos.tour_id','=','tours.id')
       ->select('tour_photos.*','tours.title as tours')
       ->get() ;

        return view('tour_photos.index',['tour_photos'=>$tour_photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tour_photos.create');
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

        $tourPhotos = new tour_photos();

        if ($request->file('img') == true) {
            $photo_url = $request->img;
            $photo_url_photo = str_random(30) . '.' . $photo_url->getClientOriginalExtension();
            $photo_url->move(public_path('uploads/phototour'), $photo_url_photo);
            $full_path_photo_url = Request()->root() . '/uploads/phototour' . $photo_url_photo;
            $tourPhotos->img = $full_path_photo_url;
        }
       
        $tourPhotos->created_at=Carbon::now();
        $tourPhotos->save();

        Session::flash('add','tourPhotos create successfully !');
        return redirect('/tourPhotos');
        
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
      $tourPhotos =tour_photos::find($id);
      $tourPhotos->delete();

      return redirect('/tourPhotos ');
    }
}

