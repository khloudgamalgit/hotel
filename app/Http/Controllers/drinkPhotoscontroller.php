<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\drink_photos;   

use Session;
use Carbon\Carbon;
use DB;

class drinkPhotoscontroller extends Controller
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
       $drink_photos = DB::table('drink_photos')
       ->join('drinks','drink_photos.drink_id','=','drinks.id')
       ->select('drink_photos.*','drinks.name as drinks')
       ->get() ;

        return view('drink_photos.index',['drink_photos'=>$drink_photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drink_photos.create');
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

        $drinkPhotos = new drink_photos();

        if ($request->file('img') == true) {
            $photo_url = $request->img;
            $photo_url_photo = str_random(30) . '.' . $photo_url->getClientOriginalExtension();
            $photo_url->move(public_path('uploads/photodrinks'), $photo_url_photo);
            $full_path_photo_url = Request()->root() . '/uploads/photodrinks/' . $photo_url_photo;
            $photodrinks->img = $full_path_photo_url;
        }
       
        $drinkPhotos->created_at=Carbon::now();
        $drinkPhotos->save();

        Session::flash('add','drinkPhotos create successfully !');
        return redirect('/drinkPhotos');
        
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
      $drinkPhotos =drink_photos::find($id);
      $drinkPhotos->delete();

      return redirect('/drinkPhotos ');
    }
}

