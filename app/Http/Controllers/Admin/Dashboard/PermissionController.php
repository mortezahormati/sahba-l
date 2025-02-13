<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(config('services.paginate.10-t'));
        $data = [
            'permissions' => $permissions
        ];
        return view('base.admin.dashboard.permissions.index', $data);
    }

    public function store(Request $request)
    {
        $this->validateStore($request);
        $permission = Permission::create([
            'name' => $request->name,
            'persian_name' => $request->persian_name
        ]);
        return redirect()->back()->with(['flash_message' => __('admin.permissions.add-suc')]);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('flash_message', __('admin.permissions.force-delete-suc'));
    }

    protected function validateStore($request)
    {
        $request->validate([
            'name' => 'required |unique:permissions,name',
            'persian_name' => 'required',
        ]);
    }
}
