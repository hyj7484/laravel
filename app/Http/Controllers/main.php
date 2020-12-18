<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\tag;

class main extends Controller
{
  function __invoke(){
    return view('main', ['tagList' => tag::getTagList()]);
  }
}
