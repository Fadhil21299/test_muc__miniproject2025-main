@extends('master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Timesheet</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>All Timesheets</span>
                    <a href="{{ route('timesheet.create') }}" class="btn btn-primary btn-sm">Add Timesheet</a>
                </div>
                <div class="card-body">
                    @if(count($items) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Employee</th>
                                        <th>Proposal Number</th>
                                        <th>Service Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Total Hours</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $it)
                                        <tr>
                                            <td>{{ $it->date }}</td>
                                            <td>{{ $it->employee_name }}</td>
                                            <td>{{ $it->proposal_number }}</td>
                                            <td>{{ $it->service_name }}</td>
                                            <td>{{ $it->timestart }}</td>
                                            <td>{{ $it->timefinish }}</td>
                                            <td>{{ $it->total }}</td>
                                            <td>
                                                <form action="{{ route('timesheet.destroy', $it->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Delete timesheet?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">No timesheets found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
