<?php

namespace Modules\Timesheet\Http\Controllers;

use App\Models\activity\TimesheetModel;
use App\Models\hrd\EmployeesModel;
use App\Models\marketing\ServiceusedModel;
use App\Models\marketing\ProposalModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TimesheetController extends Controller
{
    public function index()
    {
        $rows = DB::table('timesheet')->get();

        $items = [];
        foreach ($rows as $r) {
            $employee = DB::connection('mysql_hrd')->table('employees')->where('id', $r->employees_id)->first();
            $service = DB::connection('mysql_marketing')->table('serviceused')->where('id', $r->serviceused_id)->first();
            $proposalNumber = '-';
            if ($service) {
                $proposal = ProposalModel::find($service->proposal_id);
                $proposalNumber = $proposal->number ?? '-';
            }

            $totalMinutes = 0;
            try {
                $start = Carbon::parse($r->timestart);
                $end = Carbon::parse($r->timefinish);
                $totalMinutes = $end->diffInMinutes($start);
            } catch (\Exception $ex) {
            }

            $h = intdiv($totalMinutes, 60);
            $m = $totalMinutes % 60;

            $items[] = (object)[
                'id' => $r->id,
                'date' => $r->date,
                'employee_name' => $employee->fullname ?? '- ',
                'proposal_number' => $proposalNumber,
                'service_name' => $service->service_name ?? '-',
                'timestart' => $r->timestart,
                'timefinish' => $r->timefinish,
                'total' => sprintf('%02d:%02d', $h, $m),
                'description' => $r->description ?? ''
            ];
        }

        return view('timesheet::index', ['items' => $items]);
    }

    public function create()
    {
        // employees from HRD
        $employees = DB::connection('mysql_hrd')->table('employees')->get();
        $services = ServiceusedModel::get();

        return view('timesheet::create', compact('employees', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'timestart' => 'required',
            'timefinish' => 'required',
            'employees_id' => 'required|integer',
            'serviceused_id' => 'required|integer'
        ]);

        DB::table('timesheet')->insert([
            'date' => $request->input('date'),
            'timestart' => $request->input('timestart'),
            'timefinish' => $request->input('timefinish'),
            'employees_id' => $request->input('employees_id'),
            'serviceused_id' => $request->input('serviceused_id'),
            'description' => $request->input('description') ?? ''
        ]);

        return redirect()->route('timesheet.index')->with('success', 'Timesheet created');
    }

    public function destroy($id)
    {
        DB::table('timesheet')->where('id', $id)->delete();
        return redirect()->route('timesheet.index')->with('success', 'Timesheet deleted');
    }
}
