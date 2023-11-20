<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Flow;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Carbon\Carbon;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_book', [
            "title" => 'Buku Baru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        $validatedData['description'] = $request->description;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData["key"] = bin2hex(random_bytes(10));
        if(Book::where('key', $validatedData["key"])){
            $validatedData["key"] = bin2hex(random_bytes(10));
        }     
        Book::create($validatedData);  
        return redirect('/')->with('success', 'New playlist has been created!');
    }

    /**
     * Display the specified resource.
     */

    public function show(Book $book)
    {
        return view('report',[
            "title" => $book->name,
            'book'=>$book,
            'start' => '',
            'end' => Carbon::now("Asia/Jakarta")->toDateString(),
            'flows' => Flow::where('user_id', auth()->user()->id)->where('book_id', $book->id)->orderBy('date', 'desc')->get()
        ]);
    }
    public function period(Request $request, Book $book)
    {
        return view('report',[
            "title" => $book->name,
            'book'=>$book,
            'flows' => Flow::where('user_id', auth()->user()->id)->where('book_id', $book->id)->where('date', '>=', $request->start)->where('date', '<=', $request->end)->orderBy('date', 'desc')->get(),
            'start' => $request->start,
            'end' => $request->end
        ]);
    }
    public function analisis(Request $request, Book $book)
    {
        if(!$request->end){
            $end = Carbon::now("Asia/Jakarta")->toDateString();
        } else {
            $end = $request->end;
        }
        if(!$request->start){
            $start = '';
        } else {
            $start = $request->start;
        }
        $flows = Flow::where('user_id', auth()->user()->id)->where('book_id', $book->id)->where('date', '>=', $start)->where('date', '<=', $end)->orderBy('date', 'desc')->get();
        
        return view('analysis',[
            "title" => $book->name,
            'book'=>$book,
            'flows' => $flows,
            'start' => $start,
            'end' => $end
        ]);
    }
   
    public function urutan(Request $request, Book $book)
    {
        if($request->type == "outcome"){
            if($request->param == "date"){
                if($request->order == "asc"){
                    return view('outcome',[
                        "title" => $book->name,
                        'book'=>$book,      
                        'flows' => Flow::where(['user_id'=> auth()->user()->id, 'label' => 'Pengeluaran'])->where('book_id', $book->id)->orderBy('date', 'asc')->get(),
                        'param' => 'date',
                        'order' => "asc"

                    ]);    
                } else {
                    return view('outcome',[
                        "title" => $book->name,
                        'book'=>$book,      
                        'flows' => Flow::where(['user_id'=> auth()->user()->id, 'label' => 'Pengeluaran'])->where('book_id', $book->id)->orderBy('date', 'desc')->get(),
                        'param' => 'date',
                        'order' => "desc"
                    ]); 
                }
            } else {
                if($request->order == "asc"){
                    return view('outcome',[
                        "title" => $book->name,
                        'book'=>$book,      
                        'flows' => Flow::where(['user_id'=> auth()->user()->id, 'label' => 'Pengeluaran'])->where('book_id', $book->id)->orderBy('amount', 'asc')->get(),
                        'param' => 'amount',
                        'order' => "asc"
                    ]);    
                } else {
                    return view('outcome',[
                        "title" => $book->name,
                        'book'=>$book,      
                        'flows' => Flow::where(['user_id'=> auth()->user()->id, 'label' => 'Pengeluaran'])->where('book_id', $book->id)->orderBy('amount', 'desc')->get(),
                        'param' => 'amount',
                        'order' => "desc"
                    ]); 
                }
            }
        } else {
            if($request->param == "date"){
                if($request->order == "asc"){
                    return view('income',[
                        "title" => $book->name,
                        'book'=>$book,      
                        'flows' => Flow::where(['user_id'=> auth()->user()->id, 'label' => 'Pengeluaran'])->where('book_id', $book->id)->orderBy('date', 'asc')->get(),
                        'param' => 'date',
                        'order' => "asc"
                    ]);    
                } else {
                    return view('income',[
                        "title" => $book->name,
                        'book'=>$book,      
                        'flows' => Flow::where(['user_id'=> auth()->user()->id, 'label' => 'Pengeluaran'])->where('book_id', $book->id)->orderBy('date', 'desc')->get(),
                        'param' => 'date',
                        'order' => "desc"
                    ]); 
                }
            } else {
                if($request->order == "asc"){
                    return view('income',[
                        "title" => $book->name,
                        'book'=>$book,      
                        'flows' => Flow::where(['user_id'=> auth()->user()->id, 'label' => 'Pengeluaran'])->where('book_id', $book->id)->orderBy('amount', 'asc')->get(),
                        'param' => 'amount',
                        'order' => "asc"
                    ]);    
                } else {
                    return view('income',[
                        "title" => $book->name,
                        'book'=>$book,      
                        'flows' => Flow::where(['user_id'=> auth()->user()->id, 'label' => 'Pengeluaran'])->where('book_id', $book->id)->orderBy('amount', 'desc')->get(),
                        'param' => 'amount',
                        'order' => "desc"
                    ]); 
                }
            }
        }
       
    }
    public function show_outcome(Book $book)
    {
       
        return view('outcome',[
            "title" => $book->name,
            'book'=>$book,      
            'flows' => Flow::where(['user_id'=> auth()->user()->id, 'label' => 'Pengeluaran'])->where('book_id', $book->id)->orderBy('date', 'desc')->get(),
            'param' => "date",
            'order' => "asc"
        ]);
    }


    public function show_income(Book $book)
    {
        return view('income',[
            "title" => $book->name,
            'book'=>$book,      
            'flows' => Flow::where(['user_id'=> auth()->user()->id, 'label' => 'Pemasukan'])->where('book_id', $book->id)->orderBy('date', 'desc')->get(),
            'param' => "date",
            'order' => "asc"
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);
        return redirect('/')->with('success', 'Buku Dihapus!!');
    }
}
