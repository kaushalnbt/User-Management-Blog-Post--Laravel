<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class BlogCountController extends Controller
{
    public function index()
    {
        return Entry::with('getBlogs')->get();
    }
}
