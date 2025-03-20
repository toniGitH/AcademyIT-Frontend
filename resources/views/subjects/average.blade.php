@extends('layouts.app')

@section('title', 'Subject Average')

@section('content')
    <div class="container">

        <h1 class="mb-4">{{ $subjectAverage['subject_name'] }} {{ $subjectAverage['subject_level'] }}</h1>
        
        <div class="alert alert-info p-3 mb-4">
            AVERAGE GRADE:<strong class="ms-3">{{ $subjectAverage['average_grade'] }}</strong>
        </div>

        <a href="{{ route('subjects.index') }}" class="btn btn-secondary mt-3">Back to Subjects</a>
    </div>
@endsection
