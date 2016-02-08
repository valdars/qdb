<?php
/**
 * Created by PhpStorm.
 * User: valda
 * Date: 17.01.2016
 * Time: 23:59
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models as Models;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Models\Quote::orderBy('created', 'desc')->get();
        return view('quotes.list', [
            'quotes' => $quotes
        ]);
    }

    public function top()
    {
        $quotes = Models\Quote::orderBy('rating', 'desc')->get();
        return view('quotes.list', [
            'quotes' => $quotes
        ]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'content' => 'required',
            ]);

            /*if ($validator->fails()) {
                redirect()->back()->withInput();
            }*/

            $quote = new Models\Quote();
            $quote->content = $request->input('content');
            $quote->save();
            return redirect('quotes/quote/' . $quote->id);
        }
        return view('quotes.form');
    }

    public function view($id)
    {
        $quote = Models\Quote::find($id);
        return view('quotes.view', [
            'quote' => $quote
        ]);
    }

    public function rate(Request $request)
    {
        $ratings = $request->session()->get('ratings', []);
        $rating = $request->input('rating');
        $id = $request->input('id');
        $quote = Models\Quote::find($id);
        if (!in_array($id, $ratings)) {
            if ($rating > 0) {
                $quote->rating += 1;
            } else {
                $quote->rating -= 1;
            }
            $quote->save();
            $ratings[] = $id;
            $request->session()->put('ratings', $ratings);
        }
        return response()->json(['rating' => $quote->rating]);
    }
}