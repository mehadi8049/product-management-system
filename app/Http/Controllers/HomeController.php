<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $user=Auth()->user();

        return view('home',compact('user'));
    }

    public function category()
    {
        $categories = Category::withCount('posts')->paginate(10);
        return view('category',compact('categories'));
    }
    public function products()
    {
        $products = Post::with('categories', 'features','user')
                        ->when(auth()->user()->user_type!='customer',function($q){
                           return $q->where('user_id', Auth::id());
                        })->paginate(10);
        return view('products',compact('products'));
    }
}
