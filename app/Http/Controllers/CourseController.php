<?php


namespace App\Http\Controllers;


use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index(Request $request)
    {
        $str = $request->get('str', "");
        if ($str) {
            $courses = Course::where('name', 'like', '%' . $str . '%')->
            orWhere('description', 'like', '%' . $str . '%')->get();
        } else {
            $courses = Course::all();
        }

        return view('courses.index', ['courses' => $courses, 'str' => $str]);
    }

    public function angular(Request $request)
    {
        $str = $request->get('str', "");
        if ($str) {
            //$courses = Course::where('name', 'like', '%' . $str . '%')->
            //orWhere('description', 'like', '%' . $str . '%')->get();

            $courses = Course::search($str)->get();

        } else {
            $courses = Course::all();
        }

        return view('courses.angular', ['courses' => $courses, 'str' => $str]);
    }

    public function algolia(Request $request)
    {
        $str = $request->get('str', "");
        if ($str) {
            //$courses = Course::where('name', 'like', '%' . $str . '%')->
            //orWhere('description', 'like', '%' . $str . '%')->get();

            $courses = Course::search($str)->get();

        } else {
            $courses = Course::all();
        }

        return view('courses.algolia', ['courses' => $courses, 'str' => $str]);
    }

}
