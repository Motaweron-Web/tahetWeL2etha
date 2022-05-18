<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = Admin::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($admins)
                ->addColumn('actions', function ($admin) {
                    if ($admin->id == admin()->user()->id) {
                        $html = "
                    <button  class='btn mb-2 btn-secondary editButton' data-id='" . $admin->id . "'> <i class='fa fa-edit'></i></button>";
                    } else {
                        $html = "
                    <button  class='btn mb-2 btn-secondary editButton' data-id='" . $admin->id . "'> <i class='fa fa-edit'></i></button>
                   <button class='btn mb-2 btn-danger  delete' data-id='" . $admin->id . "'><i class='fa fa-trash'></i> </button>";

                    }
                    return $html;
                })
                ->escapeColumns([])->make(true);
        }

        return view('admin.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.parts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
        ]);
        $data['password'] = bcrypt($data['password']);
        Admin::create($data);
        return response()->json(['success' => true, 'message' => 'تم اضافة المشرف بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.parts.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:admins,phone,' . $admin->id,
            'email' => 'required|email|unique:admins,email,' . $admin->id,

            'password' => 'nullable',
        ]);
        $data['password'] = bcrypt($data['password']);
        $admin->update($data);
        return response()->json(['success' => true, 'message' => 'تم تعديل المشرف بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        Admin::destroy($id);
        return response()->json(['success' => true, 'message' => 'تم حذف المشرف بنجاح']);
    }
}
