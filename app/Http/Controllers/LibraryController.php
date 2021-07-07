<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {

        $books=Book::all();
        return view('index')->with(['books' => $books]);
   }

    public function create(Request $request)
    {


        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:6048',
        ]);

        $fileModel = new Book;
        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);


        $fileModel->cover = $fileName;
        $fileModel->isbn = $request->isbn;
        $fileModel->name = $request->name;
        $fileModel->author = $request->author;
        $fileModel->save();
        return back()
            ->with('message','Kitap eklendi.');

   }

}
