@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">First name</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last name 1</label>
            <input type="text" name="last_name_1" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last name 2</label>
            <input type="text" name="last_name_2" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Student</button>
    </form>

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to Students</a>
</div>
@endsection
