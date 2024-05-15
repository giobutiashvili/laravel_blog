<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        if($request->input('from')){
            $from = $request->input('from');

        }else{
            $from= 0;
        }    
        if($request->input('to')){
            $to = $request->input('to');
        }else{
            $to = 100000;
        }    

        
        $blogs = Blog::where('title','LIKE','%'.$query.'%')
                        // orwhere('text','LIKE','%'.$query.'%')->
                        ->when($query, function($param)use($query){
                            return $param->orwhere('text','LIKE','%'.$query.'%');
                        })
                        ->whereBetween('views', [$from, $to]) 
                        ->get();
         
        return view('search', compact('blogs'))->with([

            'value' => $query,
            'from'  => $request->input('from'),
            'to'    => $request->input('to'),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
