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
        UserInterest::create([
            'interested' => $validated['interest'] === 'yes',
            'purchase_date' => $validated['buyDate'],
        ]);

        // Redirect to the password reset view
        return Redirect::route('auth.password-reset-request');
    }
}
