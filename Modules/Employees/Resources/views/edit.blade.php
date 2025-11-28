@extends('master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Edit Employee Status</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input class="form-control" value="{{ $employee->fullname ?? '-' }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="active" {{ ($employee->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ ($employee->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-secondary" href="{{ route('employees.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
