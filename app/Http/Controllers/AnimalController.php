<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AnimalController extends Controller
{
    public function showAll()
    {
        return view('animals', ['animals' => Animal::with('employees', 'feeds')->get()]);
    }
}
