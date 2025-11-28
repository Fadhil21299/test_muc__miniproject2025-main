@extends('master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Serviceused List</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>All Services</span>
                    <a href="{{ route('serviceused.create') }}" class="btn btn-primary btn-sm">Add Service</a>
                </div>
                <div class="card-body">
                    @if($services->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Proposal Number</th>
                                        <th>Service Name</th>
                                        <th>Status</th>
                                        <th>Timespent</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $s)
                                        <tr>
                                            <td>{{ $s->proposal_number ?? '-' }}</td>
                                            <td>{{ $s->service_name ?? '-' }}</td>
                                            <td>
                                                @php
                                                    $st = $s->status ?? 'pending';
                                                @endphp
                                                @if($st == 'pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @elseif($st == 'ongoing')
                                                    <span class="badge bg-info text-dark">Ongoing</span>
                                                @elseif($st == 'done')
                                                    <span class="badge bg-success">Done</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ $st }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $s->timespent ?? '00:00' }}</td>
                                            <td>
                                                <a href="{{ route('serviceused.edit', $s->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                                <form action="{{ route('serviceused.destroy', $s->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Delete service?')">
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
                        <div class="alert alert-info">
                            No services found.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
