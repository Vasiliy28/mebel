<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($type = NULL){

      $data = array(
        'type_works' => $this->getTypeWork(),
        'materials' => $this->getMaterials(),
      );

      return view('home.index',array('data' => $data));
    }
}
