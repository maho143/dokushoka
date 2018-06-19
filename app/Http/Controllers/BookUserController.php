<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Book;

class BookUserController extends Controller
{
    public function want()
    {
        $isbn = request()->isbn;

        // Search items from "isbn"
        $client = new \RakutenRws_Client();
        $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
        $rws_response = $client->execute('BooksTotalSearch', [
            'isbn' => $isbn,
        ]);
        $rws_item = $rws_response->getData()['Items'];

        // create Item, or get Item if an item is found
        $item = Book::firstOrCreate([
            'isbn' => $rws_item['isbn'],
            'title' => $rws_item['title'],
            'url' => $rws_item['itemUrl'],
            // remove "?_ex=128x128" because its size is defined
            'image_url' => str_replace('?_ex=120x120', '', $rws_item['mediumImageUrl']),
        ]);

        \Auth::user()->want($item->id);

        return redirect()->back();
    }

    public function dont_want()
    {
        $isbn = request()->isbn;

        if (\Auth::user()->is_wanting($isbn)) {
            $title = Book::where('isbn', $tite)->first()->id;
            \Auth::user()->dont_want($title);
        }
        return redirect()->back();
    }
}
