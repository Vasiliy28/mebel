<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurWorkController extends Controller {

  public function index($type = NULL) {
    $title = $this->getTypeWork($type);

    if (!empty($title)) {
      $work = array(
        'menu' => $this->getTypeWork(),
        'data' => $this->getTypeWork($type),
      );

      return view('our_work.index', $work);
    }
    return redirect()->route('home');
  }

  private function getWorkData($type = NULL) {

  }

  public function create(){

  }
}
