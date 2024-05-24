<?php
 
 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\EmployeeController;
 use Illuminate\Support\Facades\DB;

Route::get('/query', function () {
    $employees = DB::table('employees')->get();

    return response()->json($employees);
});

 Route::get('/', function () {
     return view('index');
 });
 
 Route::get('ajax-crud-datatable', [EmployeeController::class, 'index']);
 Route::post('store', [EmployeeController::class, 'store']);
 Route::post('edit', [EmployeeController::class, 'edit']);
 Route::post('delete', [EmployeeController::class, 'destroy']);
 
