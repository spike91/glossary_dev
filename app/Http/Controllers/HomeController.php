<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use App\Http\LaravelLocalization;
use App\Word;
use App\Category;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=\App\Category::all();
        return view("layouts.app",["categories"=>$categories]);
    }

    public function locale($locale)
    {    
        LaravelLocalization::setLocale($locale);
        return redirect()->back();   
    }

    public function wordByID($id)
    {
        $word=\App\Word::find($id);
        return view('pages.getword', compact('word'));
    }

    public function getWordsByName()
    {
        $name = $_POST['find'];
        $words=DB::table("words")
        ->join('descriptions', 'words.id', '=', 'descriptions.word_fk')
        ->join('categories', 'categories.id', '=', 'descriptions.category_fk')     
        ->where('words.english','ilike',"%$name%")
        ->orWhere('words.russian','ilike',"%$name%")
        ->orwhere('words.estonian','ilike',"%$name%")
        ->select('words.id','words.english','categories.id as categoryID','categories.english as categoryEnglish')->get();
        $categories=\App\Category::all();
        return view('pages.getwordsearch', ["words"=>$words,"categories"=>$categories]);
    }

    public function descriptionByWordAndCategoryID($category_id, $word_id)
    {
        $word=\App\Word::find($word_id);
        $description=DB::table('descriptions')
        ->join('categories', 'categories.id', '=', 'descriptions.category_fk')
        ->where('categories.id', $category_id)
        ->where('descriptions.word_fk', $word_id)
        ->select('descriptions.*')
        ->get(); 
        $categories=\App\Category::all();
        return view("pages.getdescription",["word"=>$word,"description"=>$description,"categories"=>$categories]);
    }

    public static function categories()
    {
        return \App\Category::all();        
    }

    public function getWordsByCategory($id)
    {
        $words=DB::table('words')
        ->join('descriptions', 'words.id', '=', 'descriptions.word_fk')
        ->join('categories', 'categories.id', '=', 'descriptions.category_fk')
        ->where('categories.id', $id)
        ->select('words.id', 'words.english', 'words.russian', 'words.estonian')
        ->get(); 
        $category=\App\Category::find($id);
        $categories=\App\Category::all();
        return view("pages.getword",["words"=>$words,"categories"=>$categories,"category"=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $word=Word::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
