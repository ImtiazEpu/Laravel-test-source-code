<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller {

	public function index() {
		echo 'Showing User list';
	}

	public function show($id, Request $request) {
		echo $request->userAgent();
		echo 'Showing details of user id: ' . $id;
	}
}
