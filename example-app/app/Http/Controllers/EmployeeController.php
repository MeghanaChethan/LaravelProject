<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
// use Barryvdh\DomPDF\PDF;
use Excel;
use Illuminate\Http\Request;
use PDF;

class EmployeeController extends Controller
{
    //
    public function addEmployee(){
        $employees = [
            ["name"=>"Alice", "email"=>"alice@gmail.com", "phone"=>"3214567890", "salary"=>"24000", "department"=>"Accounting"],
            ["name"=>"Andrew", "email"=>"andrew@gmail.com", "phone"=>"3214567891", "salary"=>"25000", "department"=>"Marketing"],
            ["name"=>"Mike", "email"=>"mike@gmail.com", "phone"=>"3214567892", "salary"=>"23000", "department"=>"Quality"],
            ["name"=>"Sophie", "email"=>"sophie@gmail.com", "phone"=>"3214567895", "salary"=>"24000", "department"=>"Accounting"],
            ["name"=>"Steve", "email"=>"steve@gmail.com", "phone"=>"3214567896", "salary"=>"25000", "department"=>"Marketting"],

        ];

        Employee::insert($employees);
        return "Record has been created successfully";
    }

    public function exportIntoExcel()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }

    public function exportIntoCSV(){
        return Excel::download(new EmployeeExport, 'employees.csv');
    }

// pdf
    public function getAllEmployee(){
        $employees = Employee::all();
        return view('employees', compact('employees'));
    }
    public function downloadPDF()
    {
        $employees = Employee::all();
        $pdf = PDF::loadView('employees', compact('employees'));
        return $pdf->download('employee-list.pdf');
    }
    //import
    public function importForm(){
        return view('import-form');
    }

    public function import(Request $request)
    {
        Excel::import(new EmployeeImport, $request->file);
        return redirect('/get-all-employee');
    }

}
