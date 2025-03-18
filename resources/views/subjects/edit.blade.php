@extends('layouts.app')

@section('title', 'Edit Subject')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Subject</h1>

        <form action="{{ route('subjects.update', $subject['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Subject Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $subject['name'] }}" required>
            </div>

            <div class="mb-3">
                <label for="course_level" class="form-label">Course Level</label>
                <select class="form-control" id="course_level" name="course_level" required>
                    <option value="1r" {{ $subject['course_level'] == '1r' ? 'selected' : '' }}>1r</option>
                    <option value="2n" {{ $subject['course_level'] == '2n' ? 'selected' : '' }}>2n</option>
                    <option value="3r" {{ $subject['course_level'] == '3r' ? 'selected' : '' }}>3r</option>
                    <option value="4t" {{ $subject['course_level'] == '4t' ? 'selected' : '' }}>4t</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Subject</button>
        </form>

        <a href="{{ route('subjects.index') }}" class="btn btn-secondary mt-3">Back to Subjects</a>
    </div>
@endsection
