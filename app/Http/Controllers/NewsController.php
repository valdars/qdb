<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models as Models;

class NewsController extends Controller
{
    public function index()
    {
        $news = Models\News::orderBy('created', 'desc')->get();
        return view('news.list', [
            'news' => $news
        ]);
    }
}