<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use App\Models\Student;

class StudentController extends Controller
{
    //
 /*   public function store(){
        Student::create([
            'name'=>'Anurag',
            'email'=>'anurag@gmail.com',
            'age'=>25,
        ]);
        return 'Student added successfully';
    } */

   /* public function update(){
        $student=Student::find(1);
        if ($student) {
            $student->name='Anurag';
            $student->save();
            
            return 'student updated successfully'; 
        }
        return 'student not found';
    }*/

    /*public function destroy(){
        $student= student::find(1);
       if ($student) {
        $student->delete();
        
        return 'student deleted successfully';# code...
       }
       return 'student not found';
    }*/
    public function create(){
        return view('student.create');
    }
    public function store(Request $request ){
       $validated = $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:student,email',
    'age' => 'required|integer|min:1',
]);
            student::create($validated);
            return redirect('/student/create')->with('success','student added successfully');
    }

    public function index()
{
    $student = Student::all();

    return view('student.index', compact('student'));
}


public function edit($id)
{
    $student = Student::findOrFail($id);

    return view('student.edit', compact('student'));
}
   
public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:student,email,' . $student->id,
        'age' => 'required|integer|min:1',
    ]);

    $student->update($validated);

    return redirect('/student')->with(
        'success',
        'Student updated successfully!'
    );
 }
 public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect('/student')->with(
        'success',
        'Student deleted successfully!'
    );
}
}
    
