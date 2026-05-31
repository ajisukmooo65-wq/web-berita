<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $categories = Category::count();
        $articles = Article::count();
        $publishedArticles = Article::where('status', 'published')->count();
        $recentArticles = Article::with(['category', 'author'])->published()->latest('published_at')->limit(6)->get();

        return view('admin.dashboard', compact('users', 'categories', 'articles', 'publishedArticles', 'recentArticles'));
    }
}
