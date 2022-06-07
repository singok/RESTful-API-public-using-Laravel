<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        return Teacher::all();
    }

    public function display($id)
    {
        return Teacher::find($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'nullable',
            'lname' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'email' => 'required | email | unique:teachers',
            'phone' => 'required',
            'address' => 'required'
        ]);
        
        $info = Teacher::create($request->all());
        if ($info) {
            return array('success' => 'Teacher Added Successfully.');
        } else {
            return array('failure' => 'Something went wrong.');
        }
    }

    public function destroy($id)
    {
        $info = Teacher::find($id)->delete();
        if ($info) {
            return array('success' => 'Teacher Deleted Successfully.');
        } else {
            return array('failure' => 'Something went wrong.');
        }
    }

    public function update(Request $request, $id)
    {
        $info = Teacher::find($id)->update($request->all());
        if ($info) {
            return array('success' => 'Teacher Updated Successfully.');
        } else {
            return array('failure' => 'Something went wrong.');
        }
    }
}
