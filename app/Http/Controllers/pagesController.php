<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){

      $data = "This is the data was passsed with the view method";
      return view('pages.index', compact('data'));
    }

    public function about(){
      return view('pages.about');
    }

    public function contact(){
      return view('pages.contact');
    }
}
