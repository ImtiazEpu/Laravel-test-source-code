<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller {
	public function index() {
		$data = [];
		$data['site_title'] = 'Sourcecypher Blog';
		$data['links'] = [
			'Facebook' => 'https://facebook.com',
			'Twitter' => 'https://twitter.com',
			'Google' => 'https://google.com',
			'Youtube' => 'https://youtube.com',
			'LinkedIn' => 'https://linkedin.com',
		];

		$data['categories'] = Category::select('id', 'name', 'slug', 'status')->paginate(10);
		return view('Backend.category.index', $data);
	}

	public function create() {
		$data = [];
		$data['site_title'] = 'Sourcecypher Blog';
		$data['links'] = [
			'Facebook' => 'https://facebook.com',
			'Twitter' => 'https://twitter.com',
			'Google' => 'https://google.com',
			'Youtube' => 'https://youtube.com',
			'LinkedIn' => 'https://linkedin.com',
		];

		return view('Backend.category.create', $data);
	}

	public function store(Request $request) {

		$rules = [
			'name' => 'required|min:4|unique:categories,name',
			'status' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}

		//Database insert
		Category::create([
			'name' => (trim($request->input('name'))),
			'slug' => str_slug(trim($request->input('name'))),
			'status' => $request->input('status'),
		]);

		//Redirect
		session()->flash('type', 'success');
		session()->flash('message', 'Category Added.');

		return redirect()->route('categories.index');

	}

	public function show($id) {
		$data = [];
		$data['site_title'] = 'Sourcecypher Blog';
		$data['links'] = [
			'Facebook' => 'https://facebook.com',
			'Twitter' => 'https://twitter.com',
			'Google' => 'https://google.com',
			'Youtube' => 'https://youtube.com',
			'LinkedIn' => 'https://linkedin.com',
		];
		$data['category'] = Category::select('id', 'name', 'slug', 'status', 'created_at')->find($id);

		return view('Backend.category.show', $data);
	}

	public function edit($id) {
		$data = [];
		$data['site_title'] = 'Sourcecypher Blog';
		$data['links'] = [
			'Facebook' => 'https://facebook.com',
			'Twitter' => 'https://twitter.com',
			'Google' => 'https://google.com',
			'Youtube' => 'https://youtube.com',
			'LinkedIn' => 'https://linkedin.com',
		];
		$data['category'] = Category::select('id', 'name', 'slug', 'status', 'created_at')->find($id);

		return view('Backend.category.edit', $data);
	}

	public function update($id, Request $request) {

		$rules = [
			'name' => 'required|min:4|unique:categories,name,' . $id,
			'status' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}

		//Database Update

		$category = Category::find($id);
		$category->update([
			'name' => (trim($request->input('name'))),
			'slug' => str_slug(trim($request->input('name'))),
			'status' => $request->input('status'),
		]);

		//Redirect
		session()->flash('type', 'success');
		session()->flash('message', 'Category Updated.');

		return redirect()->back();
	}

	public function delete($id) {
		$category = Category::find($id);
		$category->delete();

		//Redirect
		session()->flash('type', 'success');
		session()->flash('message', 'Category Deleted.');

		return redirect()->route('categories.index');

	}
}
