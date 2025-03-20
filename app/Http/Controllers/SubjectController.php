<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubjectController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_URL') . '/subjects';
    }

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $subjects = $response->json();

        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $response = Http::post($this->apiUrl, $request->all());

        if ($response->successful()) {
            return redirect()->route('subjects.index')->with('success', 'Subject successfully created');
        }

        return redirect()->route('subjects.index')->with('error', 'Failed to create subject. ' . $response->json()['error']);
    }

    public function edit($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}");
        $subject = $response->json();

        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        Http::put("{$this->apiUrl}/{$id}", $request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject successfully updated');
    }

    public function destroy($id)
    {
        Http::delete("{$this->apiUrl}/{$id}");

        return redirect()->route('subjects.index')->with('success', 'Subject successfully deleted');
    }

    public function average($id){
        
        $response = Http::get(env('API_URL') . "/averageBySubject/{$id}");
        $subjectAverage = $response->json();

        return view('subjects.average', compact('subjectAverage'));  
    }
}
