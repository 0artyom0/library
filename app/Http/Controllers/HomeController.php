<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $limit = 2;
        $booksCount = Books::count();
        $pageCount = 0;

        if($request->ajax() && isset($request->page) && !empty($request->page)) {
            
            $page = $request->page;
            if ($page < 1) {
                $page = 1;
            }

            $start = ($page - 1) * $limit;

            $books = Books::offset($start)->limit($limit)->get(); 

            if($booksCount>0)
            {                    
                $count = count($books);

                $countValue = $booksCount / $count;
                $number=number_format(ceil($countValue));
                $pageCount=(int)$number;
            }
            return view('result',['books'=>$books, 'pageCount'=>$pageCount]);
        }
        else{
            $books = Books::offset(0)->limit($limit)->get();      
            if($booksCount>0)
            {                    
                $count = count($books);

                $countValue = $booksCount / $count;
                $number=number_format(ceil($countValue));
                $pageCount=(int)$number;
            }     
            
            return view('books.index',['books'=>$books, 'pageCount'=>$pageCount]);
        }        
    }

    public function indexWIthFuncitonalityLaravel(Request $request){
        $books = Books::paginate(2);
        
        if ($request->ajax()) {
            return view('result', ['books'=>$books]);
        }
    }
}
