<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Book;

class BooksController extends Controller
{
    public function create()
    {
        $keyword = request()->keyword;
        $items = [];
        if ($keyword) {
            $client = new \RakutenRws_Client();
            $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));

            $rws_response = $client->execute('BooksTotalSearch', [
                'keyword' => $keyword,
                'imageFlag' => 1,
                'hits' => 20,
            ]);

            // Creating "Item" instance to make it easy to handle.（not saving）
            foreach ($rws_response->getData()['Items'] as $rws_item) {
                $item = new Book();
                $item->isbn = $rws_item['Item']['isbn'];
                $item->name = $rws_item['Item']['title'];
                $item->url = $rws_item['Item']['itemUrl'];
                $item->image_url = str_replace('?_ex=120x120', '', $rws_item['Item']['mediumImageUrl']);
                $items[] = $item;
            }
        }

        return view('books.create', [
            'keyword' => $keyword,
            'items' => $items,
        ]);
    }
    
}
