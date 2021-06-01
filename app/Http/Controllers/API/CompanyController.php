<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        return "Hello World Date: ". now();
    }

    public function show($id) {
        return "Hello Staff id: " . $id;
    }
}
