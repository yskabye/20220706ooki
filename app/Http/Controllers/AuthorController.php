<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    /*public function index()
    {
        $authors = Author::all();
        //$items = Author::all();
        //dd($items); // 追加
        return view('index', ['authors' => $authors]);
    }*/

    public function index()
    {
        $data = [
            'content' => '自由に入力してください',
        ];
        return view('index', $data);
    }

	public function find()
    {
        return view('find', ['input' => '']);
    }
    public function search(Request $request)
    {
        $author = Author::where('name', 'LIKE',"%{$request->input}%")->first();
        $param = [
            'input' => $request->input,
            'author' => $author
        ];
        return view('find', $param);
    }

    public function add()
    {
        return view('add');
    }

    public function create(AuthorRequest $request)
    {
        $form = $request->all();
        //$items = $request->all();
        //dd($items); // 追加
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $author = Author::find($request->id);
        return view('edit', ['form' => $author]);
    }

    public function update(AuthorRequest $request)
    {
        $form = $request->all();
        //$items = $request->all();
        //dd($items); // 追加    
        unset($form['_token']);
        Author::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete', ['form' => $author]);
    }
    
    public function remove(Request $request)
    {
        Author::find($request->id)->delete();
        return redirect('/');
    } 

    public function bind(Author $author)
    {
        $data = [
            'author'=>$author,
        ];
        return view('binds', $data);
    }

    public function relate(Request $request)
    {
        $authors = Author::all();
        return view('author.index', ['authors' => $authors]);
    }
}
