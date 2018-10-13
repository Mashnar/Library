<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Book;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\PersonalLibrary;

class MenageController extends Controller
{
    //


    public function add()
    {

        return view('book');
    }


    public function submit(Request $request)
    {


        if (Auth::user()->getRole() == 'Admin') {

            $validatedData = $request->validate([
                'name' => 'required|unique:books',
                'author' => 'required',
                'description' => 'required|unique:books',
            ]);

            $book = new Book();

            $book->name = $validatedData['name'];
            $book->author = $validatedData['author'];
            $book->description = $validatedData['description'];
            $book->wypozyczona = false;

            $book->save();
            return redirect()->route('admin');
        } else {
            $pers = User::find(Auth::user()->getId())->your_book;

            foreach ($pers as $check) {
                if ($request['name'] == $check['name'] && $request['author'] == $check['author'] && $request['description'] == $check['description']) {
                    return back();
                }
            }
            $validatedData = $request->validate([
                'name' => 'required',
                'author' => 'required',
                'description' => 'required',
            ]);

            $book = new PersonalLibrary();
            $book->name = $validatedData['name'];
            $book->author = $validatedData['author'];
            $book->description = $validatedData['description'];
            $book->user_id = Auth::user()->getId();

            $book->save();

            return redirect()->route('home');


        }

    }


    public function show()
    {
        $book = Book::all()->sortBy("author");


        return view("book_table", ["book" => $book]);
    }


    public function take()
    {
        $book = Book::all()->sortBy("author")->where('wypozyczona', '0');


        // $user=User::find(Auth::user()->getId());


        return view("book_take", ["book" => $book]);

    }


    public function wypozycz($id)
    {

        $user = User::findOrFail(Auth::user()->getId());
        $user->book()->attach($id);
        $book = Book::findOrFail($id);


        $book->wypozyczona = true;
        $book->count_borrow = $book->count_borrow + 1;
        $book->save();
        /*
                DB::table('book_user')->insert(
            ['book_id' =>  $id_book, 'user_id' => $id_user,'created_at'=>\Carbon\Carbon::now(),"updated_at" => \Carbon\Carbon::now()]
        );
        */


        return redirect()->back();

    }

    public function oddaj($id)
    {

        $user = User::findOrFail(Auth::user()->getId());
        $history = new History();
        $user->book()->detach($id);


        $history->book_id = $id;
        $history->user_id = (Auth::user()->getId());
        $history->save();

        $book = Book::findOrFail($id);
        $book->wypozyczona = false;
        $book->save();


        /*
                DB::table('book_user')->insert(
            ['book_id' =>  $id_book, 'user_id' => $id_user,'created_at'=>\Carbon\Carbon::now(),"updated_at" => \Carbon\Carbon::now()]
        );
        */


        return redirect()->back();

    }


    public function list()
    {
        $user = User::find(Auth::user()->getId());

        return view("your_books", ["book" => $user]);
    }


    public function show_personal()
    {

        $pers = User::find(Auth::user()->getId())->your_book;

        return view("personal", ["book" => $pers]);

    }

    public function details($id)
    {
        
        $book = Book::findOrFail($id);
      
        return view("history", ["book" => $book]);
       // $user = User::findOrFail(Auth::user()->getId());


     // $user = User::findMany([])  ;


    }
}
