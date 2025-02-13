<?php

namespace App\Http\Controllers\Admin\Dashboard\Product;

use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Facades\jDateTime;
use Morilog\Jalali\Jalalian;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::orderBy('created_at', 'DESC')->paginate(config('services.paginate.table'));

        $products = Product::where('status', '=', '1')->whereNull('deleted_at')->get();
        $data = [
            'coupons' => $coupons,
            'products' => $products
        ];
        return view('base.admin.dashboard.product.coupon.index', $data);
    }

    public static function get_valid_jdate($string)
    {
        $arr = explode('/', explode(' ', $string)[0]);
        $arr[1] = sprintf("%02d", $arr[1]);
        $arr[2] = sprintf("%02d", $arr[2]);

        return implode('/', $arr);
    }

    public function create(Request $request)
    {
        $this->validateForm($request);
        // serialize products
        $products = $request->products;

        $serialized_products = implode(',', $products);
        //create_time
        $date_from = Jalalian::fromFormat('Y/m/d', $this->get_valid_jdate($request->date_from));
        $from_date = $date_from->toCarbon();
        $date_to = Jalalian::fromFormat('Y/m/d', $this->get_valid_jdate($request->date_to));
        $until_date = $date_to->toCarbon();
        $coupon = Coupon::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'serialize_product' => $serialized_products,
            'uses' => 0,
            'max_uses' => $request->max_uses,
            'discount_amount' => $request->discount_amount,
            'percent_amount' => $request->percent_amount,
            'type' => $request->type,
            'status' => 1,
            'starts_at' => $from_date,
            'expires_at' => $until_date,
        ]);
        if ($coupon) {
            $coupon->products()->syncWithoutDetaching($products);
            return redirect()->route('coupon.index')->with(['flash_message' => __('admin.products.coupons.add-suc')]);
        } else {
            return redirect()->route('coupon.index')->with(['flash_error_message' => __('admin.products.coupons.add-suc')]);
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
            'products' => 'required',
            'code' => 'required',
            'type' => 'required',
            'max_uses' => 'required',
            'discount_amount' => 'required_if:type,=,2',
            'percent_amount' => 'required_if:type,=,1',
            'date_from' => 'required',
            'date_to' => 'required',
        ]);
    }

    public function update(Request $request, $id)
    {
        $color = Color::find($id);
        if ($color) {
            $color->update([
                'name' => $request->input('name'),
                'color' => $request->input('color'),
                'status' => $request->has('status') ? 1 : 0,
            ]);

        } else {
            return redirect()->back()->with('flash_message', ['رنگ مورد نظر یافت نشد.']);
        }
    }

    public function updateForm($id)
    {
        $color = Color::find($id);
        if ($color) {
            $data = [
                'color' => $color
            ];
            return view('base.admin.dashboard.product.color.edit-form', $data);
        }
        return redirect()->back()->with('flash_message', ['این رنگ در صسیستم موجود نمی باشد.']);
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->forceDelete();
        return redirect()->route('coupon.index')->with('flash_message', __('admin.products.coupons.remove'));
    }
}
