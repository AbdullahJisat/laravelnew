<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function index()
    {
       $departments = Department::all();
       return view('department.index')->with(['datas'=>$departments]);
   }
   public function create()
   {
       return view('department.create');
   }
   public function store(Request $request)
   {
        $this->validate($request,[
            'code' => 'string|max:255',
            'name' => 'required|string|max:255',
        ]);
        $data = [
            'code'=> $request->name,
            'name'=> $request->name,
            'action' => 'Inserted',
            'actionBy' => 'Me',
            'actionTime' => date("Y-m-d H:i:s"),
            'is_delete' => 0,
        ];

        Department::create($data);
        return redirect()->route('department.index')
        ->with('success','created successfully.');
    }
    public function edit($id)
    {
        $data=Department::find($id);
        return view('department.edit')->with(['data' => $data]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'code' => 'string|max:255',
            'name' => 'required|string|max:255',
        ]);
        $data = [
            'code'=> $request->name,
            'name'=> $request->name,
            'action' => 'Updated',
            'actionBy' => 'Me',
            'actionTime' => date("Y-m-d H:i:s"),
            'is_delete' => 0,
        ];

        Department::find($id)->update($data);
        return 'update successful';
    }
    public function destroy($id)
    {
        Department::find($id)->update([
            'action'=>'Removed',
            'actionBy' => 'Me',
            'actionTime' => date("Y-m-d H:i:s"),
            'is_delete' => 1,
        ]);
        return redirect()->back()->with('message',' Delete successful');
    }
}
