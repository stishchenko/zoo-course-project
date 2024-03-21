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

    public function showAnimalData(int $id)
    {
        $animal = Animal::with('employees', 'feeds')->find($id);
        if ($animal === null) {
            return response('Animal not found', 404);
        }

        return view('animalData', ['animal' => $animal]);
    }
}
