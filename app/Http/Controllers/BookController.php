<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BookController extends Controller
{

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'publishing_house' => 'required',
            'year' => 'required|numeric'
        ]);

        Book::create(
            Arr::collapse([
                $request->all(), 
                ['user_id' => auth()->id()]
            ])
        );

        return response('success');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:books,id',
            'name' => 'required',
            'author' => 'required',
            'publishing_house' => 'required',
            'year' => 'required|numeric'
        ]);

        Book::find($request->id)
            ->update(
                $request->except(['id']) 
            );

        return response('success');

    }

    public function delete($book_id)
    {
        Book::destroy($book_id);
        return response('success');
    }

    public function list()
    {
        return auth()->user()
            ->books
            ->sortBy('id')
            ->values()
            ->all();
    }

    public function get($book_id)
    {
        return Book::find($book_id);
    }
}
