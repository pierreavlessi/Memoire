<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;


class SalleController extends Controller
{
    //
    public function create()
   {

   
       return view('admin.salle.salle');
      }

      public function index()
      {
        //
        //$Profils = Profil::latest()->get();
        $salle = Salle::all();
        return view("admin.salle.index", compact("salle"));
      }
    }
