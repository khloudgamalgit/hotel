<?php
namespace App\Exceptions;
use Illuminate\Support\Facades\Log;

 class users extends \Exception{

     public function render(){
         return redirect('/home');
     }
      
     public function report(){
         log::info("here is exeption");
     }

     }
 