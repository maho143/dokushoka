<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class WelcomeController extends Controller
{
    public function index()
    {
        $items = Book::orderBy('updated_at', 'desc')->paginate(20);
        return view('welcome', [
            'items' => $items,
        ]);
    }
}
