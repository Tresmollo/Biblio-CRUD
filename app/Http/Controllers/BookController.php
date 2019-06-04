<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBook;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(15);

        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Book::class);

        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBook  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBook $request)
    {
        $this->authorize('create', Book::class);

        $book = new Book();

        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->synopsys = $request->synopsys;
        $book->date_published = $request->date_published;
        $book->isbn13 = $request->isbn13;

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $this->authorize('view', [auth()->user(), Book::class]);

        $users = \App\User::all();

        $book::with('users');

        return view('books.show')->with('book', $book)->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $this->authorize('update', [auth()->user(), Book::class]);

        return view('books.edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreBook  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBook $request, Book $book)
    {
        $this->authorize('update', Book::class);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->synopsys = $request->synopsys;
        $book->date_published = $request->date_published;
        $book->isbn13 = $request->isbn13;

        $book->save();

        return redirect()->route('books.show', $book->id)->with('success', 'Book Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize('delete', Book::class);
    }

    /**
     * Update the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function borrow(Request $request, Book $book)
    {
        $this->authorize('update', [auth()->user(), Book::class]);

        try {
            if($book->inStock) {
                $book->inStock = false;
                $book->save();
                $book->users()->attach($request->user, ['date_out' => Carbon::now()]);

                return redirect()->route('books.show', $book->id)->with('success', 'Book Borrowed');
            }
        } catch (Exception $e) {
            report($e);
        }
    }

    /**
     * Update the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function return(Book $book, $userId)
    {
        $this->authorize('update', [auth()->user(), Book::class]);

        try {
            if(!$book->inStock) {
                $book->inStock = true;
                $book->save();
                $book->users()->updateExistingPivot($userId, ['date_in' => Carbon::now()]);

                return redirect()->route('books.show', $book->id)->with('success', 'Book Returned');
            }
        } catch (Exception $e) {
            report($e);
        }
    }
}
