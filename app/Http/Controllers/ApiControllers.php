<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;

class ApiControllers extends Controller
{
    public function create(Request $request)
    {
      $doctor = new Doctor();

      $doctor->fname = $request->input('fname');
      $doctor->lname = $request->input('lname');
      $doctor->email = $request->input('email');
      $doctor->password = $request->input('password');

      $doctor->save();
      return response()->json($doctor);
    }

    public function index()
    {
        $doctor = Doctor::all();
        return response()->json($doctor);
    }

    public function showbyid($id)
    {
        $doctor = Doctor::find($id);
        return response()->json($doctor);
    }

    public  function updatebyid(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->fname = $request->input('fname');
        $doctor->lname = $request->input('lname');
        $doctor->email = $request->input('email');
        $doctor->password = $request->input('password');

        $doctor ->save();
        return response()->json($doctor);
    }
    public function deletebyid(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor ->delete();

        return response()->json($doctor);

    }
}