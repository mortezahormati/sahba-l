<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::orderBy('created_at', 'DESC')->paginate(config('services.paginate.10-t'));
        $data =[
            'roles' => $roles
        ];
        return view('base.admin.dashboard.roles.index' , $data);

    }


    public function store(Request $request)
    {
        $this->validateStore($request);
        $role = Role::create([
            'name' => $request->name ,
            'persian_name' => $request->persian_name
        ]);
        return redirect()->back()->with(['flash_message' => __('admin.roles.add-suc')]);

    }

    public function destroy(Role $role)
    {

        $role->delete();
        return redirect()->route('roles.index')->with('flash_message', __('admin.roles.force-delete-suc'));
    }

    protected function validateStore($request){
        $request->validate([
            'persian_name' => 'required' ,
            'name' => 'required | unique:roles,name' ,
        ]);
    }

    public function addPermission(Role $role)
    {

        $role= $role->load('permissions');

        $permissions_section_brand =Permission::where('section' , '=' , 'brand')->get();
        $permissions_section_products =Permission::where('section' , '=' , 'products')->get();
        $permissions_section_colors =Permission::where('section' , '=' , 'colors')->get();
        $permissions_section_tags =Permission::where('section' , '=' , 'tags')->get();
        $permissions_section_warranty =Permission::where('section' , '=' , 'warranty')->get();
        $permissions_section_users =Permission::where('section' , '=' , 'users')->get();
        $permissions_section_category =Permission::where('section' , '=' , 'category')->get();
        $permissions_section_sub_category =Permission::where('section' , '=' , 'sub_category')->get();
        $permissions_section_child_sub_category =Permission::where('section' , '=' , 'child_sub_category')->get();
        $permissions_section_product_gallery =Permission::where('section' , '=' , 'product_gallery')->get();
        $permissions_section_coupon =Permission::where('section' , '=' , 'coupon')->get();
        $permissions_section_gift =Permission::where('section' , '=' , 'gift')->get();
        $permissions_section_user_profile =Permission::where('section' , '=' , 'user_profile')->get();
        $permissions_section_system_log =Permission::where('section' , '=' , 'system_log')->get();
        $permissions_section_trash_categories =Permission::where('section' , '=' , 'trash_categories')->get();
        $data = [
            'permissions_section_brand' => $permissions_section_brand ,
            'permissions_section_products' => $permissions_section_products ,
            'permissions_section_colors' => $permissions_section_colors ,
            'permissions_section_tags' => $permissions_section_tags ,
            'permissions_section_warranty' => $permissions_section_warranty ,
            'permissions_section_users' => $permissions_section_users ,
            'permissions_section_category' => $permissions_section_category ,
            'permissions_section_sub_category' => $permissions_section_sub_category ,
            'permissions_section_child_sub_category' => $permissions_section_child_sub_category ,
            'permissions_section_product_gallery' => $permissions_section_product_gallery ,
            'permissions_section_coupon' => $permissions_section_coupon ,
            'permissions_section_gift' => $permissions_section_gift ,
            'permissions_section_user_profile' => $permissions_section_user_profile ,
            'permissions_section_system_log' => $permissions_section_system_log ,
            'permissions_section_trash_categories' => $permissions_section_trash_categories ,
            'role' => $role ,
        ];
        return view('base.admin.dashboard.roles.add-permissions-to-role' , $data);
    }

    public function savePermission(Role $role , Request $request)
    {
      $role->refreshPermission($request->input('permissions'));
      return redirect()->route('roles.index')->with(['flash_message' => __('admin.roles.update-permissions.role-update-permissions')]);
    }

}
