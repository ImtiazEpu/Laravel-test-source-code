<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FrontController extends Controller {
	//Font viwe
	public function index() {
		return view('index');
	}
}
