<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $categories = Schema::hasTable('categories') ? DB::table('categories')->count() : 0;
        $articles = Schema::hasTable('articles') ? DB::table('articles')->count() : 0;

        $recentArticles = collect();

        if (Schema::hasTable('articles')) {
            $recentArticles = DB::table('articles')
                ->leftJoin('categories', 'articles.category_id', '=', 'categories.id')
                ->leftJoin('users', 'articles.user_id', '=', 'users.id')
                ->select(
                    'articles.title',
                    'articles.created_at',
                    'categories.name as category',
                    'users.name as author'
                )
                ->orderByDesc('articles.created_at')
                ->limit(5)
                ->get();
        }

        return view('admin.dashboard', compact('users', 'categories', 'articles', 'recentArticles'));
    }
}
