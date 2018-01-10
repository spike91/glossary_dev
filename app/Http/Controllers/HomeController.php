<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use Auth;
use Input;
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
        return view("layouts.app");
    }

    public function dashboard()
    {
        $users=App\User::all();
        return view("admin.dashboard", compact('users'));
    }

    public function categoryAdd()
    {
        return view("category.add");
    }

    public function categorySave($id = null)
    {
        if($id == null){
        DB::table('categories')->insert([
            ['english' => Input::get('english'), 'estonian' => Input::get('estonian'), 'russian' => Input::get('russian')]
        ]);
        } else {
            DB::table('categories')->where('id', $id)->update([
                'english' => Input::get('english'), 'estonian' => Input::get('estonian'), 'russian' => Input::get('russian')
            ]);
        }
        return view("layouts.app");
    }

    public function categoryEdit($id)
    {
        $category=Category::find($id);
        return view("category.edit", compact('category'));
    }

    public function wordAdd()
    {
        $categories=App\Category::all();
        return view("word.add", ['categories'=>$categories]);
    }

    public function wordSave()
    {
        if(empty(Input::get('image'))){
            $image = null;
        }else        $image = Input::get('image');
        $word_english =Input::get('word_english');
        $word_estonian =Input::get('word_estonian');
        $word_russian =Input::get('word_russian');

        $word=DB::table("words")    
        ->where('words.english','ilike',"$word_english")
        ->where('words.russian','ilike',"$word_russian")
        ->where('words.estonian','ilike',"$word_estonian")
        ->select('words.*')->get();

        if(count($word)==0){
            DB::table('words')->insert([
                ['english' => $word_english, 'estonian' =>  Input::get('word_estonian'), 'russian' => Input::get('word_russian')]
            ]);

            $word=DB::table("words")    
        ->where('words.english','ilike',"$word_english")
        ->where('words.russian','ilike',"$word_russian")
        ->where('words.estonian','ilike',"$word_estonian")
        ->select('words.*')->get();
        }
        $wordId=$word[0]->id;     


        DB::table('descriptions')->insert([
            ['english' => Input::get('desc_english'), 'estonian' => Input::get('desc_estonian'), 
            'russian' => Input::get('desc_russian'), 'image' => Input::get('image'), 'category_fk' => Input::get('category'), 'word_fk' => $wordId]
        ]);

        return view("layouts.app");
    }

    public function search()
    {
        $name = Input::get('search_text');
        $words = DB::table("words")
        ->join('descriptions', 'words.id', '=', 'descriptions.word_fk')
        ->join('categories', 'categories.id', '=', 'descriptions.category_fk')     
        ->where('words.english','ilike',"$name%")
        ->orWhere('words.russian','ilike',"$name%")
        ->orwhere('words.estonian','ilike',"$name%")
        ->select('words.*', 'categories.id as id_category', 
        'categories.english as english_category', 
        'categories.estonian as estonian_category', 
        'categories.russian as russian_category')->get();

        return view('pages.getwordsearch', ['words' => $words]);
    }

    public function WordIsExistInGlossary($user,$description)
    {
        $raws=DB::table("userglossaries")  
        ->where('userglossaries.user_fk','=',"$user")
        ->where('userglossaries.description_fk','=',"$description")->get();

        if(count($raws)>0) return true;
        else return false;
    }

    public function isAdmin($user)
    {
        $user=App\User::find($user);

        if($user && $user->isadmin) return true;
        return false;
    }

    public function getCategoryByDescriptionId($id)
    {
        $category=App\Category::find($id);
        return $category;
    }

    public function glossaryByUserId($id)
    {
        $words=DB::table("words")
        ->join('descriptions', 'words.id', '=', 'descriptions.word_fk')
        ->join('categories', 'categories.id', '=', 'descriptions.category_fk')
        ->join('userglossaries', 'userglossaries.description_fk', '=', 'descriptions.id')    
        ->where('userglossaries.user_fk','=',"$id")
        ->select('words.*', 'categories.id as id_category', 
        'categories.english as english_category', 
        'categories.estonian as estonian_category', 
        'categories.russian as russian_category')->get();

        return view('pages.glossary', ["words"=>$words]);
    }

    public function glossaryAddWord($id)
    {
        DB::table('userglossaries')->insert(
            ['description_fk' => $id, 'user_fk' => Auth::user()->id]
        );

        return redirect()->back();  
    }

    public function glossaryDeleteWord($id)
    {
        DB::table('userglossaries')->where('description_fk', '=', $id)->where('user_fk', '=', Auth::user()->id)->delete();

        return redirect()->back();  
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

        $category=\App\Category::find($category_id);
        return view("pages.getdescription",["word"=>$word,"description"=>$description[0],"category"=>$category]);
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
