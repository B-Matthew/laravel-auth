<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Pilot;
use App\Brand;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
     {
         return view('home');
     }

     public function edit($id) {

       $brands = Brand::all();
       $pilots= Pilot::all();
       $car=Car::FindOrFail($id);
       return view('pages.edit',compact('car','brands','pilots'));
     }

     public function update(Request $request , $id) {

       $validate = $request -> validate ([
         'name' => 'required|string|min:1',
         'model' => 'required|string|min:1',
         'kw' => 'required|integer',
         'brand_id' => 'required|exists:App\Brand,id|integer',
          'pilot_id.*' => 'required_if:current,1|distinct|exists:App\Pilot,id|integer'
       ]);
       $car=Car::FindOrFail($id);
       $car -> update($validate);

       $car->brand()-> associate($request ->brand_id);
       $car->save();

       $car->pilots() -> sync($request ->pilot_id);

       return redirect() -> route('homepage');
     }

     public function delete($id) {

       $car=Car::FindOrFail($id);
       $car -> deleted = true;
       $car->save();

       return redirect() -> route('homepage');
     }
   }
