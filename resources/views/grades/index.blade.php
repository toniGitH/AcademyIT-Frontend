@extends('layouts.app')

@section('title', 'Grades')

@section('content')
<div class="container">
    <h1 class="mb-4">Grades</h1>
    <a href="{{ route('grades.create') }}" class="btn btn-primary mb-3">Add New Grade</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Student</th>
                <th>Subject</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade['student']['first_name'] }} {{ $grade['student']['last_name_1'] }} {{ $grade['student']['last_name_2'] }}</td>
                    <td>{{ $grade['subject']['name'] }}</td>
                    <td>{{ $grade['grade'] }}</td>
                    <td>
                        <a href="{{ route('grades.edit', $grade['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('grades.destroy', $grade['id']) }}" method="POST" style="display: inline-block;">
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
