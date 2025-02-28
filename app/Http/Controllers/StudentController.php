<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index(Request $request){

        $query = Student::query();

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
    
            $query->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('ic', 'like', '%' . $searchTerm . '%')
                         ->orWhere('name', 'like', '%' . $searchTerm . '%');
            });
        }
    
        $students = $query->paginate(10);
    
        return view('student.index', compact('students'));
    }
}
