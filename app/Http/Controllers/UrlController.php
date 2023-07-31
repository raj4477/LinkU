<?php

namespace App\Http\Controllers;
use App\Models\Url;
use Str;

use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index(){
        $data = Url::latest()->get();
        return view("index",compact('data'));
    }
    public function store(Request $request){
        $request->validate([
            'link'=>'required|url'
        ]);
        $input['link'] = $request->link;
        $input['code'] = Str::random(6);
        $input['click'] = 0;
        Url::create($input);

        return redirect()->route('home')->withSuccess('Shortened Link!!');
    }
    public function shortLink($code){
        $find = Url::where('code',$code)->first();
        $find->click++;
        $find->save();
        return redirect($find->link);
    }
}
