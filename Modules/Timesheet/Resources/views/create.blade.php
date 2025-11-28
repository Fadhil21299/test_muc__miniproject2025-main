@extends('master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Create Timesheet</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('timesheet.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Employee</label>
                            <select name="employees_id" class="form-control">
                                @foreach($employees as $e)
                                    <option value="{{ $e->id }}">{{ $e->fullname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Service</label>
                            <select name="serviceused_id" class="form-control">
                                @foreach($services as $s)
                                    <option value="{{ $s->id }}">{{ $s->service_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Start time</label>
                            <input type="time" name="timestart" class="form-control" value="09:00" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">End time</label>
                            <input type="time" name="timefinish" class="form-control" value="17:00" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-secondary" href="{{ route('timesheet.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
