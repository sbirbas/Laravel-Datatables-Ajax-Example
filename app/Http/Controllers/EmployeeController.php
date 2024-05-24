<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DataTables;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::select('*');
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('index');
    }

    public function store(Request $request)
    {
        $employeeId = $request->id;
        $employee = Employee::updateOrCreate(
            ['id' => $employeeId],
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address
            ]
        );

        return response()->json($employee);
    }

    public function edit(Request $request)
    {
        $employee = Employee::find($request->id);
        return response()->json($employee);
    }

    public function destroy(Request $request)
    {
        $employee = Employee::find($request->id)->delete();
        return response()->json($employee);
    }
}
