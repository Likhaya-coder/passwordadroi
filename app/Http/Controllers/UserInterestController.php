<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterestFormRequest;
use App\Models\UserInterest;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class UserInterestController extends Controller
{
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    public function store(InterestFormRequest $request)
    {
        // Validate the request using InterestFormRequest
        $validated = $request->validated();

        // Store user's interest and purchase date     
        try {
            // Store the user's interest and other details
            UserInterest::create([
                'interested' => $validated['interest'] === 'yes',
                'product_title' => $validated['product_title'],
                'user_email' => $validated['user_email'] ?: 'Not Interested',
                'purchase_date' => $validated['buyDate'],
                'price' => $validated['price'],
                'promotion' => $validated['promotion'],
            ]);
    
            // Redirect to the password reset view
            return Redirect::route('auth.password-reset-request');
        } catch (\Exception $e) {
            // Handle errors and redirect back with an error message
            return redirect()->withInput($request->only('email'))
            ->withErrors(['email' => 'There was an error']);
        }
    }
}
