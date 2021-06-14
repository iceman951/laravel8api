<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $of = Officer::with(['department:id,name', 'user:id,email'])->get();

        return response()->json([
            'data' => $of
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $of = new Officer();

            if ($request->has('picture')) {
                $base64_image = $request->picture;
                @list($type, $file_data) = explode(';', $base64_image);
                @list(, $file_data) = explode(',', $file_data);

                $new_filename = uniqid() . '.png';

                if ($file_data != "") {
                    Storage::disk('public')->put('upload/' . $new_filename, base64_decode($file_data));
                }
                $of->firstname = $request->firstname;
                $of->lastname = $request->lastname;
                $of->dob = $request->dob;
                $of->salary = $request->salary;
                $of->user_id = $request->user_id;
                $of->department_id = $request->department_id;
                $of->picture = $new_filename;
            } else {
                $of->firstname = $request->firstname;
                $of->lastname = $request->lastname;
                $of->dob = $request->dob;
                $of->salary = $request->salary;
                $of->user_id = $request->user_id;
                $of->department_id = $request->department_id;
            }

            $of->save();
            DB::commit();

            return response()->json([
                'message' => 'เพิ่มข้อมูลพนักงานเรียบร้อย'
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => 'เกิดข้อผิดพลาดในการเพิ่มข้อมูล',
                'system message' => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
