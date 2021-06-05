<?php

namespace App\Http\Controllers;
use App\Car;
use Illuminate\Http\Request;

class myController extends Controller
{

  public function homepage() {

    $cars = Car::Where('deleted',false)->get();
    return view('pages.homepage', compact('cars'));
  }
}
