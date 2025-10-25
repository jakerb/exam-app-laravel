<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamsController extends Controller {
    
    function index() {
        $exams = \App\Models\Exam::orderBy('status')->paginate(5);
        return view('exams.index', ['exams' => $exams]);
    }

    function show(\App\Models\Exam $exam) {
        return view('exams.show', [
            'exam' => $exam,
            'bookings' => $exam->bookings()->paginate(10),
        ]);
    }
    

}
