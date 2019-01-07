<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
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

		$data['posts'] = Post::with('category', 'user')->select('id', 'title', 'user_id', 'category_id', 'status')->paginate(20);
		return view('Backend.post.index', $data);
	}

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     *
     */
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
        $data['categories'] = Category::select('name','id')->get();

        return view('Backend.post.create', $data);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request) {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //Database insert
        Post::create([
            'title'             => trim($request->input('title')),
            'content'           => trim($request->input('content')),
            'category_id'       => $request->input('category_id'),
            'status'            => $request->input('status'),
            'thumbnail_path'    => 'default.png',
            'user_id'           => auth()->user()->id,
        ]);

        //Redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Post Added.');

        return redirect()->route('posts.index');
	}

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
     */
	public function show($id) {
		//
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return void
     */
	public function edit($id) {
		//
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return void
     */
	public function update(Request $request, $id) {
		//
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     */
	public function destroy($id) {
		//
	}
}
