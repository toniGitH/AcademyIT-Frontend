<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GradeController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_URL') . '/grades';
    }

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $grades = $response->json();

        $overallResponse = Http::get(env('API_URL') . '/overallAverageGrade');
        
        if ($overallResponse->successful()) {
            $overallAverageGrade = $overallResponse->json()['overall_average_grade'];
        } else {
            $overallAverageGrade = $overallResponse->json()['message'];
        }

        return view('grades.index', compact('grades', 'overallAverageGrade'));
    }

    public function create()
    {
        $students = collect(Http::get(env('API_URL') . '/students')->json())->map(fn($student) => (object) $student);
        $subjects = collect(Http::get(env('API_URL') . '/subjects')->json())->map(fn($subject) => (object) $subject);

        return view('grades.create', compact('students', 'subjects'));
    }

    public function store(Request $request)
    {
        $response = Http::post($this->apiUrl, $request->all());

        if ($response->successful()) {
            return redirect()->route('grades.index')->with('success', 'Grade successfully created');
        }

        return redirect()->route('grades.index')->with('error', 'Failed to create grade.');
    }

    public function edit($id)
    {
        $grade = (object) Http::get("{$this->apiUrl}/{$id}")->json();

        $students = collect(Http::get(env('API_URL') . '/students')->json())->map(fn($student) => (object) $student);
        $subjects = collect(Http::get(env('API_URL') . '/subjects')->json())->map(fn($subject) => (object) $subject);

        return view('grades.edit', compact('grade', 'students', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("{$this->apiUrl}/{$id}", $request->all());

        if ($response->successful()) {
            return redirect()->route('grades.index')->with('success', 'Grade successfully updated');
        }

        return redirect()->route('grades.index')->with('error', 'Failed to update grade.');
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            return redirect()->route('grades.index')->with('success', 'Grade successfully deleted');
        }

        return redirect()->route('grades.index')->with('error', 'Failed to delete grade.');
    }
}
