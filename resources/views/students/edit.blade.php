@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Student</h1>
    <form action="{{ route('students.update', $student['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">First name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $student['first_name'] }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last name 1</label>
            <input type="text" name="last_name_1" class="form-control" value="{{ $student['last_name_1'] }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last name 2</label>
            <input type="text" name="last_name_2" class="form-control" value="{{ $student['last_name_2'] }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control" value="{{ $student['age'] }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to Students</a>
</div>
@endsection
