<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialController extends Controller {

  public function index($material = NULL) {
    $material = $this->getMaterials($material);
    if(! empty($material)){
      $material = [
        'menu' => $this->getMaterials(),
        'data' => $material,
      ];
      return view('material.index', $material);
    }
    return redirect()->route('home');
  }

}
