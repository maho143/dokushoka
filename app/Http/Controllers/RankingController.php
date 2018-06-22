<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Book;

class RankingController extends Controller
{
    public function want()
    {
        $items = \DB::table('book_user')->join('books', 'book_user.book_id', '=', 'books.id')->select('books.*', \DB::raw('COUNT(*) as count'))->where('type', 'want')->groupBy('books.id', 'books.isbn', 'books.name', 'books.url', 'books.image_url','books.created_at', 'books.updated_at')->orderBy('count', 'DESC')->take(10)->get();

        return view('ranking.want', [
            'items' => $items,
        ]);
    }
    
    public function read()
    {
        $items = \DB::table('book_user')->join('books', 'book_user.book_id', '=', 'books.id')->select('books.*', \DB::raw('COUNT(*) as count'))->where('type', 'want')->groupBy('books.id', 'books.isbn', 'books.name', 'books.url', 'books.image_url','books.created_at', 'books.updated_at')->orderBy('count', 'DESC')->take(10)->get();

        return view('ranking.read', [
            'items' => $items,
        ]);
    }
}
