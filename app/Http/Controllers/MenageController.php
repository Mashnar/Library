<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Book;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class MenageController extends Controller
{
    //



     public function add()
    {
        return view('book');
    }

    public function submit(Request $request)
    {
        
         $validatedData = $request->validate([
        'name' => 'required|unique:books',
        'author' => 'required',
        'description'=>'required|unique:books',
    ]);

$book=new Book();

$book->name=$validatedData['name'];
$book->author=$validatedData['author'];
$book->description=$validatedData['description'];

$book->save();
return redirect()->route('admin');
    }


    public function show()
    {
    	$book = Book::all()->sortBy("author");
    	
    	return view("book_table",["book"=>$book]);
    }


    public function take()
    {
        $book = Book::all()->sortBy("author");
         //$user=User::find(Auth::user()->getId());
       
     
return view("book_take",["book"=>$book]);

    }


    public function wypozycz($id)
    {

    $user=User::findOrFail(Auth::user()->getId());
    $user->book()->attach($id);
/*
        DB::table('book_user')->insert(
    ['book_id' =>  $id_book, 'user_id' => $id_user,'created_at'=>\Carbon\Carbon::now(),"updated_at" => \Carbon\Carbon::now()]
);
*/


        return redirect()->back();

    }


    public function list()
    {
          $user=User::find(Auth::user()->getId());
     
return view("your_books",["book"=>$user]);
    }


public function show_personal()
{
    echo "string";
     $books=User::find(Auth::user()->getId())->your_book;
     var_dump($books);
}


}
