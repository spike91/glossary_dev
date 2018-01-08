<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;
use LaravelLocalization;

class AutoCompleteController extends Controller
{
    public function index(){
        return redirect()-back();
   }
    public function autoComplete(Request $request) {
        $query = $request->get('term','');
        $lang = strtolower(LaravelLocalization::getCurrentLocaleName());
        
        $searchResult = Word::where('english','ilike',"$query%")
        ->orWhere('russian','ilike',"$query%")
        ->orwhere('estonian','ilike',"$query%")
        ->take(5)
        ->get();
        
        $data=array();
        foreach ($searchResult as $result) {
                $data[]=array('value'=>$result->$lang,'id'=>$result->id);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }
}
