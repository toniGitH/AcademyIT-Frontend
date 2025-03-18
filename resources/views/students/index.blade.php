@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="container">
    <h1 class="mb-4">Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Create New Student</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name 1</th>
                <th>Last name 2</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student['first_name'] }}</td>
                    <td>{{ $student['last_name_1'] }}</td>
                    <td>{{ $student['last_name_2'] ?? '-' }}</td>
                    <td>{{ $student['age'] }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student['id']) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a href="{{ route('students.expedient', $student['id']) }}" class="btn btn-info btn-sm">Expedient</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
