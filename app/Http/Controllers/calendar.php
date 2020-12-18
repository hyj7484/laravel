<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\tag;

class calendar extends Controller
{
  function __invoke(){
    return view('calendar', ['tagList' => tag::getTagList()]);
  }

  function updateCalendar(){
    return view('updateCalendar', ['tagList' => tag::getTagList()]);
  }
}
