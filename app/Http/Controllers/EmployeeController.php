<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    public function showAll()
    {
        return view('employees', ['employees' => Employee::with('animals')->get()]);
    }

    public function showEmployeeData(int $id)
    {
        $employee = Employee::with('animals')->find($id);
        if ($employee === null) {
            return response('Employee not found', 404);
        }

        return view('employeeData', ['employee' => $employee]);
    }
}
