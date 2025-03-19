@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Create New Grade</h2>
    
    <form action="{{ route('grades.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="student_id">Student</label>
            <select id="student_id" name="student_id" class="form-control" required>
                <option value="">Select a Student</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name_1 }} {{ $student->last_name_2 }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="subject_id">Subject</label>
            <select id="subject_id" name="subject_id" class="form-control" required>
                <option value="">Select a subject</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }} - {{ $subject->course_level }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="grade">Grade</label>
            <input type="number" id="grade" name="grade" class="form-control" step="0.01" min="0" max="10">
        </div>
        
        <button type="submit" class="btn btn-primary">Save Grade</button>
        
    </form>

    <a href="{{ route('grades.index') }}" class="btn btn-secondary mt-3">Back to Grades</a>
</div>
@endsection
