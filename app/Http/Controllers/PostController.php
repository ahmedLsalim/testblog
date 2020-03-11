<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Auth;
use Carbon\Carbon;
use App\Mail\welcome;

class PostController extends Controller {

    public function index() {
        $posts = Post::latest();
        if ($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }
        $posts = $posts->get();
        $archives = Post::selectRaw('year(created_at)year,monthname(created_at)month,count(*)published')
                ->groupBY('year', 'month')
                ->orderByRaw('min(created_at)')
                ->get()
                ->toArray();
        return view('posts.index', compact('posts', 'archives'));
    }

    public function show($id) {
        $post = Post::find($id);
        $archives = Post::selectRaw('year(created_at)year,monthname(created_at)month,count(*)published')
                ->groupBY('year', 'month')
                ->orderByRaw('min(created_at)')
                ->get()
                ->toArray();
        return view('posts.show', compact('post', 'archives'));
    }

    public function create() {
        if (Auth::user()) {

            return view('posts.create');
        } else {
            return redirect('/login');
        }
    }

    public function store(Request $request) {

        
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'fileToUpload' => 'required'
        ]);
        $path = $request->file('fileToUpload')->store('public/avatars');
        //dd($path);
        post::create(
                [
                    'title' => $request->title,
                    'body' => $request->body,
                    'user_id' => Auth::user()->id,
                    'image' => $path
        ]);
        $user = Auth::user();
        \Mail::to($user)->send(new welcome($user));
        return redirect('/');
    }

    public function delete($id) {
        $post = Post::find($id);
        $post->delete($id);
        session()->flash('message', 'this post was deleted');
        return redirect('/');
    }

    public function edit($id) {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update($id, Request $request) {
        //dd($request->all());
        $post = Post::findOrFail($id);
        $post->update($request->all());
        $post->save();
        return redirect('/');
    }

}
