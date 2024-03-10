<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function updateLanguage(Request $request)
    {
        $request->session()->put('locale', $request->input('locale'));
        return response()->json(['success' => true]);
    }
}
