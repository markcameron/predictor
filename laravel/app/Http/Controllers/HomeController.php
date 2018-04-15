<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthenticatedController;

class HomeController extends AuthenticatedController {

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    parent::__construct();
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('home')
        ->withUser($this->user);
  }

}
