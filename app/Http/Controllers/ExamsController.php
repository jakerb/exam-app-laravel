<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateExamRequest;
use App\Http\Requests\StoreExamRequest;
use Illuminate\Http\Request;

class ExamsController extends Controller {
    
    public function index() {
        $exams = \App\Models\Exam::orderBy('status')->paginate(5);
        return view('exams.index', ['exams' => $exams]);
    }

    public function show(\App\Models\Exam $exam) {
        return view('exams.show', [
            'exam' => $exam,
            'bookings' => $exam->bookings()->paginate(10),
        ]);
    }

    public function edit(\App\Models\Exam $exam) {
        return view('exams.edit', ['exam' => $exam]);
    }

    public function update(UpdateExamRequest $request, \App\Models\Exam $exam) {
        $exam->update($request->validated());

        if ($exam->start_date < now()) {
            $exam->status = 'inactive';
            $exam->save();
        }

        return redirect()->route('exams.show', $exam)->with('status', 'Exam updated successfully.');
    }   

    public function create() {
        
        return view('exams.create', ['exam' => new \App\Models\Exam()]);
    }

    function store(StoreExamRequest $request) {

        $exam = \App\Models\Exam::create($request->validated());

        if ($exam) {
         
            if ($exam->start_date < now()) {
                $exam->status = 'inactive';
                $exam->save();
            }

            return redirect()->route('exams.show', $exam)->with('status', 'Exam created successfully.');
        } else {
            return redirect()->back()->withErrors('Failed to create exam. Please check your input and try again.');
        }
    }

    function destroy(\App\Models\Exam $exam) {
        $exam->delete();
        return redirect()->route('exams.index')->with('status', 'Exam deleted successfully.');
    }
    

}
