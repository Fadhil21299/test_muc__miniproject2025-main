@extends('master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Create New Proposal</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('proposal.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Number</label>
                            <input name="number" class="form-control" value="{{ old('number') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <input name="year" class="form-control" type="number" value="{{ old('year', date('Y')) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="pending">Pending</option>
                                <option value="agreed">Agreed</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>

                        <button class="btn btn-primary" type="submit">Create</button>
                        <a class="btn btn-secondary" href="{{ route('proposal.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
