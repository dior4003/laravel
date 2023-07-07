<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view("main");
    }
     public function about()
    {
        return view("about");
    }   
    public function services()
    {
        return view("services");
    }

    public function portifolio()
    {
        return view("portifolio");
    }
        public function contact()
    {
        return view("contact");
    }
         public function blog()
    {
        return view("blog");
    }
    public function login()
    {
         return view("login");
    }
}