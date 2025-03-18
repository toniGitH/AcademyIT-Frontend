@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Grade</h2>
    
    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="student_id">Student</label>
            <select id="student_id" name="student_id" class="form-control" required>
                <option value="">Select a Student</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $student->id == $grade->student_id ? 'selected' : '' }}>
                        {{ $student->first_name }} {{ $student->last_name_1 }} {{ $student->last_name_2 }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="subject_id">Subject</label>
            <select id="subject_id" name="subject_id" class="form-control" required>
                <option value="">Select a subject</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $subject->id == $grade->subject_id ? 'selected' : '' }}>
                        {{ $subject->name }} - {{ $subject->course_level }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Campo para la nota -->
        <div class="form-group mb-3">
            <label for="grade">Grade</label>
            <input type="number" id="grade" name="grade" class="form-control" step="0.01" min="0" max="10" value="{{ $grade->grade }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Grade</button>
    </form>

    <a href="{{ route('grades.index') }}" class="btn btn-secondary mt-3">Back to Grades</a>
</div>
@endsection
