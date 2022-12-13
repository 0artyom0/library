<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            if (Hash::check($request->password, $user->password, [])) {
                $books = Books::where('publicator_id', $user->id)->get();

                if(count($books)>0)
                {
                    foreach($books as $book)
                    {
                        $book['publication'] = $user->name;
                        $book['author'] = ($book->author);

                        unset($book->id);
                        unset($book->publicator_id);
                        unset($book->created_at);
                        unset($book->updated_at);
                    }                    
                }
                return response()->json([
                    "message" => "Book List",
                    "data" => $books
                ]);
            }
        }
        
        abort(401);
    }

    public function create(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            if (Hash::check($request->password, $user->password, [])) {
                $validator = Validator::make($request->all(), [
                    'book_name' => 'required',
                    'authors' => 'required',

                ]);
                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()], 401);
                }
                $createBook = new Books();
                $createBook->uuid = Str::uuid()->toString();
                $createBook->book_name = $request->book_name;
                $createBook->publicator_id = $user->id;
                $createBook->author = json_decode($request->authors);
                $createBook->save();
                return response()->json([
                    "data" => $createBook->uuid
                ]);
            }
        }

        abort(401);
    }

    public function update(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            if (Hash::check($request->password, $user->password, [])) {
                $validator = Validator::make($request->all(), [
                    'book_name' => 'required',
                    'authors' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()], 400);
                }
                $book = Books::where('uuid', $request->uuid)->first();
                if(!empty($book))
                {
                    $book->book_name = $request->book_name;
                    $book->author = json_decode($request->authors);
                    $book->save();

                    $book['author'] = $book->author;

                    unset($book->id);
                    unset($book->publicator_id);
                    unset($book->created_at);
                    unset($book->updated_at);
                    
                    return response()->json([
                        "success" => true,
                        "message" => "Book updated successfully.",
                        "data" => $book
                    ]);
                }
                else{
                    return response()->json(['error' => 'Book not found'], 400);
                }
            }
        }
        
        abort(401);
    }

    public function destroy(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            if (Hash::check($request->password, $user->password, [])) {
                $validator = Validator::make($request->all(), [
                    'uuid' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()], 400);
                }

                $book = Books::where('uuid', $request->uuid)->first();      
                
                if($book!=null && !empty($book))
                {  
                    $book->delete();
                    return response()->json([
                        "success" => true,
                        "message" => "Book deleted successfully.",
                    ]);
                }
                else{
                    return response()->json(['error' => 'Book not found'], 400);
                }
            }
        }
        
        abort(401);
    }
}
