<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Services\Alertservice;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('frontend.dashboard.account.index');
    }

    public function profileUpdate(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:150', 'unique:users,email,' . auth('web')->user()->id],
        ]);

        $user = auth('web')->user();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();
        // save red underline is ok, because of auth.

        Alertservice::updated();
        
        return redirect()->back();
    }
}
