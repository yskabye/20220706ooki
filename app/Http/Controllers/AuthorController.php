<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('index', ['authors' => $authors]);
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $author = Author::find($request->input);
        $param = [
            'author' => $author,
            'input' => $request->input
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
        Author::create($form);
        return redirect('/');
    }
}
