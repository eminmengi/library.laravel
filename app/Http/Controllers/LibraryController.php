<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {

        $book=Book::all();
        return view('index')->with(['books' => $book]);
   }

    public function create(BookRequest $book)
    {


        $fileModel = new Book;
        if($book->file()) {
            $fileName = time() . '.' . $book->file->extension();
            $book->file->move(public_path('uploads'), $fileName);
            $fileModel->cover = $fileName;
        }


        $fileModel->isbn = $book->isbn;
        $fileModel->name = $book->name;
        $fileModel->author = $book->author;
        $fileModel->save();
        return back()
            ->with('message','Kitap eklendi.');

   }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->back()->with('message', 'Kitap başarılı bir şekilde silindi.');
    }

    public function edit($id)
    {
        $book = Book::where('id', $id)->first();
        return view('edit_book')->with(['book' => $book]);

    }

    public function update(BookRequest $book, $id)
    {

        $array = [
            'name' => $book->name,
            'author' => $book->author,
            'isbn' => $book->isbn,

        ];
        if($book->file()){
            $fileName = time().'.'.$book->file->extension();
            $book->file->move(public_path('uploads'), $fileName);
            $array['cover']= $fileName;
        }
        Book::where('id', $id)->update($array);

        return redirect()->back()->with('message', 'Kitap başarılı bir şekilde güncellendi.');
    }
    public function detail($id)
    {
        $book = Book::where('id', $id)->first();
        return view('detail_book')->with(['book' => $book]);

    }
}
