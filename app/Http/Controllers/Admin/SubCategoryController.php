<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function allsubcategory() {
        return view('allsubcategory');
    }
    public function addsubcategory() {
        return view('addsubcategory');
    }
}
