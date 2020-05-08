<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;

class CourseController extends Controller
{
    public function index()
    {
         $datas=DB::table('courses')
                ->join('departments','courses.department_id', '=','departments.id')
                ->select('courses.code','courses.id','courses.name as crs_name','departments.name as dep_name')
                ->where('courses.is_delete','=',0)->where('departments.is_delete','=',0)
                ->get();
                /*$datas = Course::all();*/
       return view('course.index')->with(['datas'=>$datas]);
   }
   public function create()
   {
        $datas = DB::table('departments')
                    ->pluck('code','id');
        return view('course.create')->with(['datas'=>$datas]);
   }
   public function store(Request $request)
   {
        $this->validate($request,[
            'code' => 'string|max:255',
            'name' => 'required|string|max:255',
            'department_id' => 'sometimes|nullable',
        ]);
        $data = [
            'code'=> $request->code,
            'name'=> $request->name,
            'department_id' => $request->department_id,
            'action' => 'Inserted',
            'actionBy' => 'Me',
            'actionTime' => date("Y-m-d H:i:s"),
            'is_delete' => 0,
        ];

        Course::create($data);
        return redirect()->route('course.index')
            ->with('success','created successfully.');
    }

    public function edit($id)
    {
        $datas  = Course::find($id);
        // $dep = DB::table('departments')
        //         ->pluck('code','id');
        $dep = Department::all()->where('is_delete','=',0);
        return view('Course.edit')->with(['data' => $datas, 'dep'=>$dep]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'code' => 'string|max:255',
            'name' => 'required|string|max:255',
            'department_id' => 'sometimes|nullable',
        ]);
        $data = [
            'code'=> $request->code,
            'name'=> $request->name,
            'department_id' => $request->department_id,
            'action' => 'Updated',
            'actionBy' => 'Me',
            'actionTime' => date("Y-m-d H:i:s"),
            'is_delete' => 0,
        ];

        Course::find($id)->update($data);
        return redirect()->route('Course.index')
            ->with('success','update successfully.');
    }
    public function destroy($id)
    {
        Course::find($id)->update([
            'action'=>'Removed',
            'actionBy' => 'Me',
            'actionTime' => date("Y-m-d H:i:s"),
            'is_delete' => 1,
        ]);
        return redirect()->back()->with('message','Delete successful');
    }
}
