<?php

namespace Modules\Employees\Http\Controllers;

use App\Models\hrd\EmployeesModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // Ambil data dari database HRD
        $employees = EmployeesModel::get();


        return view('employees::index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('employees::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $employee = DB::connection('mysql_hrd')
            ->table('employees')
            ->where('id', $id)
            ->first();

        return view('employees::show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $employee = DB::connection('mysql_hrd')
            ->table('employees')
            ->where('id', $id)
            ->first();

        return view('employees::edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        DB::connection('mysql_hrd')
            ->table('employees')
            ->where('id', $id)
            ->update(['status' => $request->input('status'), 'updated_at' => now()]);

        return redirect()->route('employees.index')->with('success', 'Employee status updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}