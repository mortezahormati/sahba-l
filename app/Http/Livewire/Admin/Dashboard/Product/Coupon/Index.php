<?php

namespace App\Http\Livewire\Admin\Dashboard\Product\Coupon;

use App\Models\Product;
use App\Models\Product\Coupon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public Coupon $coupon;
    public $search;





    protected $queryString = ['search'];

//'coupon.name' => 'required |min:3|max:60' ,
//'coupon.color_palette' => 'required |min:3|max:10' ,
    function rules(){
        return[
            'coupon.code' => 'required |min:3|max:15'  ,
            'coupon.name' => 'required |min:3|max:60' ,
            'coupon.description' => 'nullable' ,
            'coupon.product' => 'required' ,
            'coupon.max_uses' => 'required | min:1 |max:3 |integer ' ,
            'coupon.status' => 'nullable' ,
            'coupon.discount_amount' => 'required | integer ' ,
            'coupon.type' => 'required | integer ' ,
            'coupon.started_at' ,
            'coupon.expired_at'
        ];
    }
    public function mount()
    {
        $this->coupon = new Coupon();
    }

    public function render()
    {
        $count_trash = Coupon::onlyTrashed()->count();
        $products = Product::where('status' , '=' , '1')->whereNull('deleted_at')->get();
        $coupons =
            Coupon::where('name' , 'LIKE' , "%{$this->search}%")
                ->latest()->paginate(config('services.paginate.table'));
        $data =[
            'coupons' => $coupons ,
            'count_trash' => $count_trash,
            'products' => $products
        ];
        return view('livewire.admin.dashboard.product.coupon.index' ,$data);
    }

    public function colorForm()
    {
        $this->validate();

        $color = $this->coupon->save();
        session()->flash('flash_message_success', __('admin.colors.add-suc'));
        return redirect()->route('colors.index');
    }

//    public function disableColorStatus($id)
//    {
//        $color = Color::find($id);
//        $color->update([
//            'status' => 0
//        ]);
//        $this->emit('toast' , 'success' , __('admin.brands.disableBrandStatus'));
//    }

//    public function enableColorStatus($id)
//    {
//        $color = Color::find($id);
//        $color->update([
//            'status' => 1
//        ]);
//        $this->emit('toast' , 'success' , __('admin.brands.enableBrandStatus'));
//    }

    public function deleteColor($id)
    {
        $color = Coupon::find($id);
        if($color->status == 0){
            $color->delete();
            $this->emit('toast' , 'success' , __('admin.warranties.remove-suc-to-trash'));
        }else{
            $this->emit('toast' , 'danger' , __('admin.warranties.status-not-deactive'));
        }
    }
}
