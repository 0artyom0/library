<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $limit = 2;        

        if($request->ajax() && isset($request->page) && !empty($request->page)) {
            $page = $request->page;
            if ($page < 1) {
                $page = 1;
            }

            $start = ($page - 1) * $limit;
            $books = Books::offset($start)->limit($limit)->get();

            return view('result', ['books' => $books]);        
        }
        else{
            $books = Books::offset(0)->limit($limit)->get();
            return view('books.index',['books'=>$books]);
        }

    }

    public function indexWIthFuncitonalityLaravel(Request $request){
        $books = Books::paginate(2);
        
        if ($request->ajax()) {
            return view('result', ['books'=>$books]);
        }
    }
}
