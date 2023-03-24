<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $this->authorize('create', [Book::class]); //這邊的Book::class會call BookPolicy
        $user = Auth::user();
        $validated = $this->validate($request, [
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

         return $user->books()->create($validated);
    }
}
