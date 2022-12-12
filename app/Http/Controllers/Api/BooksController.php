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
                $books = Books::where('publication', $user->name)->get();
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
                    'author' => 'required',

                ]);
                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()], 401);
                }
                $createBook = new Books();
                $createBook->uuid = Str::uuid()->toString();
                $createBook->book_name = $request->book_name;
                $createBook->publication = $user->name;
                $createBook->author = json_encode($request->author);
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
                    'author' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()], 400);
                }
                $books = Books::where('uuid', $request->uuid)->first();
                if(!empty($books))
                {
                    $books->book_name = $request->book_name;
                    $books->publication = $user->name;
                    $books->author = json_encode($request->author);
                    $books->save();
                    return response()->json([
                        "success" => true,
                        "message" => "Book updated successfully.",
                        "data" => $books
                    ]);
                }
                else{
                    abort(400);
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
                $books = Books::where('uuid', $request->uuid)->first();
                if(!empty($books))
                {
                    $books->delete();
                    return response()->json([
                        "success" => true,
                        "message" => "Book deleted successfully.",
                        "data" => $books
                    ]);
                }
                else{
                    abort(400);
                }
            }
        }
        
        abort(401);
    }
}
