<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * undocumented class variable.
     *
     * @var string
     **/
    protected $students;

    /**
     * Create a controller instance.
     *
     * @param \App\Studnt $student
     **/
    public function __construct(Student $student)
    {
        $this->students = $student;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->students->paginate(16);

        return view('students.index', compact('students'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Student $student
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Student $student
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Student             $student
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$student->id,
            'reg_no' => 'required|string|max:255|unique:students,reg_no,'.$student->id,
            'phone_number' => 'required', ]);
        $student->update($request->all());
        if ($student->user) {
            $student->user()->update($request->all());
        }

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Student $student
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Student $student
     *
     * @return \Illuminate\Http\Response
     */
    public function blockAccount(Student $student)
    {
        $student->account()->update(['active' => false]);

        return redirect()->route('students.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Student $student
     *
     * @return \Illuminate\Http\Response
     */
    public function unblockAccount(Student $student)
    {
        $student->account()->update(['active' => true]);
        
        return redirect()->route('students.index');
    }
}
