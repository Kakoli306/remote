<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index($languageId)
    {
        $language = Language::find($languageId);

        return $language->developers;
    }
}
