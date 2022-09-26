<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;

class TeacherController extends Controller
{
    //
    public function addTeacher(){
        return view('add-teacher');
    }

    public function storeTeacher(Request $request)
    {
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $teacher = new Teacher();
        $teacher->name = $name;
        $teacher->profileimage = $imageName;
        $teacher->save();
        return redirect('/teachers')->with("record_added", 'New record has been created successfully!');

    }

    public function teachers()
    {
        $teachers = Teacher::all();
        return view('teachers', compact('teachers'));
    }

    public function editTeacher($id)
    {
        $teacher = Teacher::find($id);
        return view('edit-teacher', compact('teacher'));
    }

    public function updateTeacher(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $teacher = Teacher::find($request->id);
        $teacher->name = $request->name;
        $teacher->profileimage = $imageName;
        $teacher->save();
        return redirect('/teachers');
    }

    public function deleteTeacher($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect('/teachers');

    }
}
