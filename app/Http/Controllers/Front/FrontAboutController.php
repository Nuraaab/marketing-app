<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontAboutController extends Controller
{
   public function getAbout(){
    return view('front.main-pages.about');
   }
}
