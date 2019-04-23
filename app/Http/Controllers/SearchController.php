<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request, $q)
    {
        $url = 'https://api.vk.com/method/newsfeed.search?q='.$q.'&user_ids=6957337&fields=id&access_token=9b80f3379b80f3379b80f337949beada2e99b809b80f337c73e296bdd16491b81a8d7b2&v=5.95';
//        dd($q.'<br>'.$url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $result = json_decode($response);
//        dd($result);
        $items = $result->response->items;
        $err = curl_error($ch);
        curl_close ($ch);
        return view('newsList', compact('items','q'));
    }

    public function newsSingle(Request $request)
    {
        if($request->has('news')) {
            $news = json_decode($request->news);
            return view('single-news', compact('news'));
        }

        return redirect('/');
    }
}
