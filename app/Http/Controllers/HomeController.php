<?php

namespace App\Http\Controllers;

use App\Models\Works;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($type = NULL){

      $data = array(
        'works' => Works::all(),
        'materials' => $this->getMaterials(),
      );

      return view('home.index',$data);
    }
}
