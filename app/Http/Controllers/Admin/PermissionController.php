<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index(){
        $permissions = Permission::orderBy('id', 'DESC')->paginate(10);
        return view('modules.admin.pages.permissions.index', compact('permissions'));
    }

    public function show($id){
        $permission = Permission::findOrFail($id);
        return view('modules.admin.pages.permissions.show', compact('permission'));
    }

    public function create(){
        return view('modules.admin.pages.permissions.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        $permission = Permission::create([
            'name' => $request->input('name'),
            'guard_name' => 'web'
        ]);

        return redirect()->route('permissions.index')
            ->with('success','Permission created successfully');

    }

    public function edit($id){
        $permission = Permission::findOrFail($id);
        return view('modules.admin.pages.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();
        return redirect()->route('permissions.index')
            ->with('success','Permission updated successfully');
    }

    public function destroy($id){
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permissions.index')
            ->with('success','Permission deleted successfully');
    }

}
