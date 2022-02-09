<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{

    public function index(){
        return view('shortenLink',
        [
            'shortLinks' => ShortLink::latest()->get()
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'link'=>'required|url',
        ]);

        ShortLink::create([
            'link' => $request->link,
            'code' => str_random(6)
        ]);

        return redirect()->route('generate.shorten.link')
                         ->with('success', 'shorten link is successfully generated!');
    }

    public function shortenLink($code){
        $link = ShortLink::where('code', $code)->first();
        $link->save();

        return redirect($link->link);
    }
}
