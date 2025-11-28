@extends('master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Edit Service</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('serviceused.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Proposal</label>
                            <select name="proposal_id" class="form-control">
                                @foreach($proposals as $p)
                                    <option value="{{ $p->id }}" {{ $p->id == $service->proposal_id ? 'selected' : '' }}>{{ $p->number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Service name</label>
                            <input name="service_name" class="form-control" value="{{ old('service_name', $service->service_name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="pending" {{ ($service->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="ongoing" {{ ($service->status ?? '') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="done" {{ ($service->status ?? '') == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-secondary" href="{{ route('serviceused.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
