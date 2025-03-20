@extends('layouts.app')

@section('title', 'Create Subject')

@section('content')
    <div class="container">
        <h1>Create New Subject</h1>

        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Subject Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="course_level" class="form-label">Course Level</label>
                <select class="form-control" id="course_level" name="course_level" required>
                    <option value="1r">1r</option>
                    <option value="2n">2n</option>
                    <option value="3r">3r</option>
                    <option value="4t">4t</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Subject</button>
        </form>

        <a href="{{ route('subjects.index') }}" class="btn btn-secondary mt-3">Back to Subjects</a>
    </div>
@endsection
