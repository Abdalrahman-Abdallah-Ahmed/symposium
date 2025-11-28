<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceFavoriteController extends Controller
{
    public function store(Conference $conference)
    {
        $user = auth()->user();
        $user->favoriteConferences()->attach($conference->id);

        return redirect()->back();
    }

    public function destroy(Conference $conference)
    {
        $user = auth()->user();
        $user->favoriteConferences()->detach($conference->id);

        return redirect()->back();
    }
}
