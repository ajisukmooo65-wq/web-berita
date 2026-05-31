<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $latestArticles = Article::with(['category', 'author'])->published()->latest('published_at')->limit(6)->get();
        $featured = Article::with(['category', 'author'])->published()->latest('published_at')->limit(3)->get();
        $categories = Category::withCount(['articles'])->orderBy('name')->get();

        return view('front.home', compact('latestArticles', 'featured', 'categories'));
    }

    public function news(Request $request)
    {
        $query = Article::with(['category', 'author'])->published();

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")->orWhere('excerpt', 'like', "%{$search}%");
        }

        $articles = $query->latest('published_at')->paginate(9)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('front.news.index', compact('articles', 'categories', 'search'));
    }

    public function showArticle($slug)
    {
        $article = Article::with(['category', 'author'])->published()->where('slug', $slug)->firstOrFail();
        $related = Article::with(['category', 'author'])->published()->where('category_id', $article->category_id)->where('id', '!=', $article->id)->latest('published_at')->limit(3)->get();

        return view('front.news.show', compact('article', 'related'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $articles = Article::with(['category', 'author'])->published()->where('category_id', $category->id)->latest('published_at')->paginate(9);
        $categories = Category::orderBy('name')->get();

        return view('front.category', compact('category', 'articles', 'categories'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }
}
