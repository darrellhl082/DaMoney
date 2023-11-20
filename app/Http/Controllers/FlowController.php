<?php

namespace App\Http\Controllers;

use App\Models\Flow;
use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FlowController extends Controller
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
        //
    }
    public function create_outcome(Book $book)
    {
        return view('layouts.add_outcome', [
            "title" => "Tambah",
            "book" => $book,
            "user" =>  auth()->user()->username
        ]);
    }
    public function create_income(Book $book)
    {
        return view('layouts.add_income', [
            "title" => "Tambah",
            "book" => $book,
            "user" =>  auth()->user()->username
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'label' => 'required',
            'amount'=> 'required',
            "book_id" => 'required'

        ]);
        if ($request->date == null){
            $validatedData["date"] = Carbon::now("Asia/Jakarta")->toDateString();
        } else {
            $validatedData["date"] = $request->date;
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData["desc"] = $request -> desc;
        Flow::create($validatedData);  
        if($request->label == 'Pengeluaran'){
            return redirect("buku/".$book->key."/pengeluaran")->with('success', 'Data ditambahkankan!');
        }
        return redirect("buku/".$book->key."/pemasukan")->with('success', 'Data ditambahkankan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flow $flow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flow $flow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flow $flow)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'label' => 'required',
            'amount'=> 'required',
            "book_id" => 'required'

        ]);
        $validatedData["desc"] = $request->desc;
        $validatedData["date"] = $request->date;
       
        Flow::where('id', $flow->id)->update($validatedData);
        return back()->with('success', 'Data Telah Diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flow $flow)
    {
        
        Flow::destroy($flow->id);
        return back()->with('success', 'Data dihapus!');
    }
}
