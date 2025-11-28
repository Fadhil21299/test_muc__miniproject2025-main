<?php

namespace Modules\Serviceused\Http\Controllers;

use App\Models\marketing\ServiceusedModel;
use App\Models\marketing\ProposalModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceusedController extends Controller
{
    public function index()
    {
        $services = ServiceusedModel::get();

        // compute total timespent per service (in minutes)
        foreach ($services as $s) {
            $times = DB::table('timesheet')->where('serviceused_id', $s->id)->get();
            $totalMinutes = 0;
            foreach ($times as $t) {
                try {
                    $start = Carbon::parse($t->timestart);
                    $end = Carbon::parse($t->timefinish);
                    $totalMinutes += $end->diffInMinutes($start);
                } catch (\Exception $ex) {
                    // ignore parsing errors
                }
            }
            $h = intdiv($totalMinutes, 60);
            $m = $totalMinutes % 60;
            $s->timespent = sprintf('%02d:%02d', $h, $m);

            // get proposal number
            $proposal = ProposalModel::find($s->proposal_id);
            $s->proposal_number = $proposal->number ?? '-';
        }

        return view('serviceused::index', compact('services'));
    }

    public function create()
    {
        $proposals = ProposalModel::get();
        return view('serviceused::create', compact('proposals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proposal_id' => 'required|integer',
            'service_name' => 'required|string|max:255',
            'status' => 'required|in:pending,ongoing,done'
        ]);

        ServiceusedModel::create([
            'proposal_id' => $request->input('proposal_id'),
            'service_name' => $request->input('service_name'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('serviceused.index')->with('success', 'Service created');
    }

    public function edit($id)
    {
        $service = ServiceusedModel::findOrFail($id);
        $proposals = ProposalModel::get();
        return view('serviceused::edit', compact('service', 'proposals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'proposal_id' => 'required|integer',
            'service_name' => 'required|string|max:255',
            'status' => 'required|in:pending,ongoing,done'
        ]);

        $s = ServiceusedModel::findOrFail($id);
        $s->proposal_id = $request->input('proposal_id');
        $s->service_name = $request->input('service_name');
        $s->status = $request->input('status');
        $s->save();

        return redirect()->route('serviceused.index')->with('success', 'Service updated');
    }

    public function destroy($id)
    {
        $s = ServiceusedModel::findOrFail($id);
        $s->delete();

        return redirect()->route('serviceused.index')->with('success', 'Service deleted');
    }
}
