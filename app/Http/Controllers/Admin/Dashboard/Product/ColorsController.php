<?php

namespace App\Http\Controllers\Admin\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function index()
    {
        $colors = Color::orderBy('created_at', 'DESC')->paginate(config('services.paginate.table'));

        $data = [
            'colors' => $colors
        ];
        return view('base.admin.dashboard.product.color.index', $data);
    }

    public function create(Request $request)
    {


        $this->validateForm($request);
        $color = Color::create([
            'name' => $request->name,
            'color' => $request->color,
            'status' => isset($request->status) ? $request->status : '0',
        ]);
        if ($color) {
            return response()->json([
                'result' => 1,
                'message' => __('admin.colors.add-suc')
            ], 200);
        } else {
            return response()->json([
                'result' => 0,
                'message' => __('admin.colors.has-error-suc')
            ], 404);
        }

    }

    public function changeStatus(Request $request)
    {

        $color = Color::find($request->id);
        $color->status == 1 ? $color->status = 0 : $color->status = 1;
        $color->update();
        if ($color->status == 1) {
            return response()->json([
                'status' => 1,
                'message' => __('admin.colors.enableStatus')
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'message' => __('admin.colors.disableStatus')
            ], 200);
        }
    }

    public function validateForm(Request $request)
    {
        return $this->validate($request, [
            'name' => 'required',
            'color' => 'required | min:7',
            'status' => 'nullable',
        ]);
    }

    public function update(Request  $request , $id)
    {
       $color = Color::find($id);
       if($color){
           $color->update([
              'name' => $request->input('name') ,
              'color' => $request->input('color') ,
              'status' => $request->has('status') ? 1 : 0 ,
           ]);
           return redirect()->route('colors.index')->with('flash_message', __('admin.colors.update-suc'));
       }else{
           return redirect()->back()->with('flash_message' , ['رنگ مورد نظر یافت نشد.']);
       }
    }

    public function updateForm($id)
    {
        $color = Color::find($id);
        if($color){
            $data = [
                'color' => $color
            ];
            return view('base.admin.dashboard.product.color.edit-form' , $data);
        }
        return redirect()->back()->with('flash_message' , ['این رنگ در صسیستم موجود نمی باشد.']);
    }
    public function destroy(Color $color)
    {
        $color->forceDelete();
        return redirect()->route('colors.index')->with('flash_message', __('admin.colors.remove'));
    }
}
