<?php

namespace App\Http\Controllers;

use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class MenuController extends Controller
{
    public function show($id)
    {
        $viewData = User::findOrFail($id);
        return view('menu', [$viewData->id], compact("viewData"));
    }
}
