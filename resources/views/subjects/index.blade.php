@extends('layouts.app')

@section('title', 'Subjects')

@section('content')
    <div class="container">
        <h1 class="mb-4">Subjects</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('subjects.create') }}" class="btn btn-primary mb-3">Create New Subject</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Course Level</th>
                    <th>Overall Average Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjectsWithAverage as $subject)
                    <tr>
                        <td>{{ $subject['name'] }}</td>
                        <td>{{ $subject['course_level'] }}</td>
                        <td>{{ $subject['average_grade'] }}</td>
                        <td>
                            <a href="{{ route('subjects.edit', $subject['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('subjects.destroy', $subject['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
