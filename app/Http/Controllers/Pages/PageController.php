<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Slug;


class PageController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderbyDesc('id')->get();
        $slugs = Slug::orderbyDesc('id')->get();

        return view('welcome', compact('blogs','slugs'));

    }

    public function contact()
    {
        $phone = '59596457684';
        $email='gbuss@mail.ros';
        $arr = [ 'Name' => 'giorgi', 'SurnName' => 'bututi', 'gmail' => 'uti@gmail.com', ];
        
        return view('contact', compact('phone', 'email', 'arr'  ));

    }
    public function aboutUs()
    {
        $phone = '59596457684';
        $email='hellloow world this is the begin of my programing';
        $arr = [ 'Name' => 'giorgi', 'SurnName' => 'bututi', 'gmail' => 'uti@gmail.com', ];
        
        return view('aboutUs', compact('phone', 'email', 'arr'  ));

    }
    public function prices()
    {
        $phone = 'ფასები';
        $email='ფასები';
        $arr = [ 'Name' => 'giorgi', 'SurnName' => 'bututi', 'gmail' => 'uti@gmail.com', ];
        
        return view('prices', compact('phone', 'email', 'arr'  ));

    }
    public function blog_show($id)
    {
        $blog = Blog::findorfail($id);
        return view('blog/index', compact('blog'));

    }
}
