@extends('layouts.app')

@section('title', 'Expedient')

@section('content')
<div class="container">
    <h1 class="mb-4">Expedient for Student {{ $student['first_name'] }} {{ $student['last_name_1'] }} {{ $student['last_name_2'] ?? '' }}</h1>

    @if(count($grades) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Course Level</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grades as $grade)
                    <tr>
                        <td>{{ $grade['subject_name'] }}</td>
                        <td>{{ $grade['course_level'] }}</td>
                        <td>{{ $grade['grade'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No grades found for this student.</p>
    @endif

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to Students</a>
</div>
@endsection
