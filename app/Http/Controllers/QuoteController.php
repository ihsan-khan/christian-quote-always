<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
        if($request->has('upload_quote')){
            $request->validate([
                'quote_image' => 'required',
            ]);
        }
        else{
            $request->validate([
                'content' => 'required|max:300|unique:quotes',
            ]);
        }

        $quote = new Quote;

        if($request->hasfile('quote_image')) {
            $quote_image = 'quote_image_'.time().'.'.$request->quote_image->getClientOriginalExtension();
            $request->quote_image->storeAs('images/quotes', $quote_image, 'public');
            $quote->image = $quote_image;
        }

        $quote->author = $request->author;
        $quote->content = $request->content;
        $quote->quote_type = $request->quote_type;
        $quote->permission = 'denied';
        $quote->user_id = $request->user()->id;

        if ($quote->save()) {
            // Mail::send(new sendMail());
            return response()->json($quote, 200);
        } else {
            return response()->json([
                'message' => 'Some error occured, Please try again!',
                'status_code' => 500
            ], 500);
        }
    }
    
}
