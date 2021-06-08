<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $d = Department::all(); //select * from departments
        // $d = Department::find(2);
        // $d = Department::where('name','like','%บ%')->get();
        $d = Department::select('id','name')->orderBy('id', 'desc')->get();
        $total = Department::count();

        return response()->json([
            'total' => $total,
            'data' => $d
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new Department();
        $d->name = $request->name;
        $d->save();

        return response()->json([
            'message' => 'เพิ่มข้อมูลสำเร็จ',
            'data' => $d
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $d = Department::find($id);

        if ($d == null) {
            return response()->json([
               'errors' => [
                 'status_code' => 404,
                 'message' => 'ไม่พบข้อมูลนี้'
               ] 
            ], 404);//http status code
        }

        return response()->json($d, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Department::find($id);

        if ($d == null) {
            return response()->json([
               'errors' => [
                 'status_code' => 404,
                 'message' => 'ไม่พบข้อมูลนี้'
               ] 
            ], 404);//http status code
        }

        $d->delete();

        return response()->json([
            'message' => 'ลบข้อมูลสำเร็จ',
        ], 200);
    }
}
