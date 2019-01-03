<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware {
	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return string
	 */
	protected function redirectTo($request) {
		if (!$request->expectsJson()) {
			session()->flash('type', 'danger');
			session()->flash('message', 'You must be logged in to viwe this page.');
			return route('login');
		}
	}
}
