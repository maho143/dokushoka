<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

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
                $item->publisherName = $rws_item['Item']['publisherName'];
                $item->author = $rws_item['Item']['author'];
                $item->itemCaption = $rws_item['Item']['itemCaption'];
                $item->image_url = str_replace('?_ex=120x120', '', $rws_item['Item']['mediumImageUrl']);
                $items[] = $item;
            }
        }

        return view('books.create', [
            'keyword' => $keyword,
            'items' => $items,
        ]);
    }
    
    public function show($id)
    {
      $item = Book::find($id);
      $want_users = $item->want_users;
      $read_users = $item->read_users;

      return view('books.show', [
          'item' => $item,
          'want_users' => $want_users,
          'read_users' => $read_users,
          
      ]);
    }
    
}
