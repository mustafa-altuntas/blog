<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
        $data['articles'] = Article::orderBy('created_at', 'DESC')->paginate(1);
        $data['articles']->withPath(url('sayfa'));

        $data['categories'] = Category::inRandomOrder()->get();
        $data['pages']=Page::orderBy('order','ASC')->get();
        return view('front.home', $data);
    }

    public function single($category, $slug)
    {
        $category = Category::where('slug', $category)->first() ?? abort(403, 'Böyle bir yazı bulunamadı.');

        $article = Article::where('slug', $slug)->whereCategoryId($category->id)->first() ?? abort(403, 'Böyle bir yazı bulunamadı.');

        $article->increment('hit');

        $data['article'] = $article;
        $data['categories'] = Category::inRandomOrder()->get();

        return view('front.single', $data);
    }

    public function category($slug)
    {
        $category = Category::whereSlug($slug)->first() ?? abort(403, 'Böyle bir yazı bulunamadı.');
        $data['category'] = $category;
        $data['categories'] = Category::inRandomOrder()->get();

        $data['articles'] = Article::where('category_id', $category->id)->orderBy('created_at', 'DESC')->paginate(1);


        return view('front.category', $data);
    }
}
