<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Image;
use App\Models\ProductDetails;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->simplePaginate(15);

        return view('backend.pages.products.index')->with([
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('backend.pages.products.create')->with([
            'page'=>1,
            'product'=>null,
            'detail_product'=>null,
            'image_product'=>null
        ]);
    }

    //StoreProductRequest - ???
    public function store(StoreProductRequest $request)
    {
        $name = $request->get('name');

        $product = new Product();
        $product->name = $name;
        $slug = \Illuminate\Support\Str::slug($name);
        $product->slug = $slug;
        $product->intro = $request->get('intro');
        $product->content = $request->get('content');

        $product->price = $request->get('price');
        $product->price_status = $request->get('price_status');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;;
        $product->category_id = $request->get('parent_id');
        $status = $product->save();
//
        if ($status){
            $request->session()->flash('status','Đã lưu thông tin !');
            return view('backend.pages.products.create')->with([
                'page'=>1,
                'product'=>$product,
                'detail_product'=>$product->details,
                'image_product'=>$product->images
            ]);
        }else{
            $request->session()->flash('status','Lưu thất bại !');
            return view('backend.pages.products.create')->with([
                'page'=>1,
                'product'=>$product,
                'detail_product'=>$product->details,
                'image_product'=>$product->images
            ]);
        }

    }
    public function detail_store(Request $request)
    {
        $product_detail = new ProductDetails();
        //
        $product_id = $request->get('product_id');
        $product_detail->product_id = $product_id;
        $product_detail->cpu = $request->get('cpu');
        $product_detail->ram = $request->get('ram');
        $product_detail->screen = $request->get('screen');
        $product_detail->vga = $request->get('vga');
        $product_detail->storage = $request->get('storage');
        $product_detail->extent_memory = $request->get('extent_memory');
        $product_detail->cam1 = $request->get('cam1');
        $product_detail->cam2 = $request->get('cam2');
        $product_detail->sim = $request->get('sim');
        $product_detail->connect = $request->get('connect');
        $product_detail->pin = $request->get('pin');
        $product_detail->os = $request->get('os');
        $product_detail->note = $request->get('note');
        $status = $product_detail->save();

        $product = Product::find($product_id);
        if ($status){
            $request->session()->flash('status','Đã lưu chi tiết sản phẩm !');
            return view('backend.pages.products.create')->with([
                'page'=>2,
                'product'=>$product,
                'detail_product'=>$product_detail,
                'image_product'=>$product->images
            ]);
        }else{
            $request->session()->flash('status','Lưu thất bại !');
            return view('backend.pages.products.create')->with([
                'page'=>2,
                'product'=>$product,
                'detail_product'=>$product_detail,
                'image_product'=>$product->images
            ]);
        }
    }

    public function image_store(Request $request){
        $product_id = $request->get('product_id');
        $color_id = $request->get('color_id');
//        dd($color_id);
        //

        if ($request->hasFile('image_main')){
            $pro_images = new Image();
            //
            $img = $request->file('image_main');
            $nameFile = $product_id.$img->getClientOriginalName();
            $url = '/storage/products/'.$nameFile;
            Storage::disk('public')->putFileAs('products',$img,$nameFile);
            //
            $pro_images->product_id = $product_id;
            $pro_images->color_id = $color_id;
            $pro_images->type = 1;
            $pro_images->path = $url;
//            dd($pro_images);
            $pro_images->save();
            // cap nhat anh
            $product = Product::find($product_id);
            $product->image = $url;
            $status = $product->save();
        }else{
            dd('Upload erro');
        }
        //-------------------------------
        $info_images = [];
        if ($request->hasFile('image_details')){
            $images = $request->file('image_details');
            foreach ($images as $key => $image){
                $nameFile = $product_id.$key.'-'.$image->getClientOriginalName();

                $url = '/storage/products/'.$nameFile;

                Storage::disk('public')->putFileAs('products',$image,$nameFile);
                $info_images[] = [
                    'url' => $url,
                    'name' => $nameFile
                ];
            }
            foreach ($info_images as $image){
                $img = new Image();
                $img->product_id = $product_id;
                $img->color_id = $color_id;
                $img->type = 0;
                $img->path = $image['url'];
                $status = $img->save();
            }
        }
        if ($status){
            $request->session()->flash('status','Đã lưu chi tiết sản phẩm !');
            return view('backend.pages.products.create')->with([
                'page'=>3,
                'product'=>$product,
                'detail_product'=>$product->details,
                'image_product'=>$product->images
            ]);
        }else{
            $request->session()->flash('status','Lưu thất bại !');
            return view('backend.pages.products.create')->with([
                'page'=>3,
                'product'=>$product,
                'detail_product'=>$product->details,
                'image_product'=>$product->images
            ]);
        }
    }
    public function image_update(Request $request){
        $product_id = $request->get('product_id');
        $color_id = $request->get('color_id');
        $prduct = Product::find($product_id);
        dd($prduct);
//        return redirect()->route('backend.product.index');
    }

    public function image_delete($id)
    {
        $image = Image::find($id);
        $product = Product::find($image->product_id);
        //lay path
        if(file_exists(public_path($image->path)))
        {
            unlink(public_path($image->path));
            $image->delete();
            return view('backend.pages.products.create')->with([
                'page'=>3,
                'product'=>$product,
                'detail_product'=>$product->details,
                'image_product'=>$product->images
            ]);
        }
        return view('backend.pages.products.create')->with([
            'page'=>3,
            'product'=>$product,
            'detail_product'=>$product->details,
            'image_product'=>$product->images
        ]);
    }

    //================================================================================================================
    //========================================  UPDATE    ============================================================
    //================================================================================================================
    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $product = Product::find($id);
        $product->name = $name;
        $slug = \Illuminate\Support\Str::slug($name);
        $product->slug = $slug;
        $product->intro = $request->get('intro');
        $product->content = $request->get('content');

        $product->price = $request->get('price');
        $product->price_status = $request->get('price_status');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;;
        $product->category_id = $request->get('parent_id');
        $status = $product->save();
//
        if ($status){
            $request->session()->flash('status','Cập nhật thành công !');
            return view('backend.pages.products.create')->with([
                'page'=>1,
                'product'=>$product,
                'detail_product'=>$product->details,
                'image_product'=>$product->images
            ]);
        }else{
            $request->session()->flash('status','Cập nhật thất bại !');
            return view('backend.pages.products.create')->with([
                'page'=>1,
                'product'=>$product,
                'detail_product'=>$product->details,
                'image_product'=>$product->images
            ]);
        }
    }

    public function detail_update(Request $request)
    {
        //
        $product_id = $request->get('product_id');
        //
        $product_detail = Product::find($product_id)->details;
        //
        $product_detail->product_id = $product_id;
        $product_detail->cpu = $request->get('cpu');
        $product_detail->ram = $request->get('ram');
        $product_detail->screen = $request->get('screen');
        $product_detail->vga = $request->get('vga');
        $product_detail->storage = $request->get('storage');
        $product_detail->extent_memory = $request->get('extent_memory');
        $product_detail->cam1 = $request->get('cam1');
        $product_detail->cam2 = $request->get('cam2');
        $product_detail->sim = $request->get('sim');
        $product_detail->connect = $request->get('connect');
        $product_detail->pin = $request->get('pin');
        $product_detail->os = $request->get('os');
        $product_detail->note = $request->get('note');
        $status = $product_detail->save();

        $product = Product::find($product_id);
        if ($status){
            $request->session()->flash('status','Đã cập nhật chi tiết sản phẩm !');
            return view('backend.pages.products.create')->with([
                'page'=>2,
                'product'=>$product,
                'detail_product'=>$product_detail,
                'image_product'=>$product->images
            ]);
        }else{
            $request->session()->flash('status','Lưu thất bại !');
            return view('backend.pages.products.create')->with([
                'page'=>2,
                'product'=>$product,
                'detail_product'=>$product_detail,
                'image_product'=>$product->images
            ]);
        }
    }
    public function images_update(Request $request,$id){
        //Xóa file hình thẻ cũ
//        $getHT = DB::table('images')->select('hinhthe')->where('id',$request->id)->get();
//        if($getHT[0]->hinhthe != '' && file_exists(public_path('upload/hinhthe/'.$getHT[0]->hinhthe)))
//        {
//            unlink(public_path('upload/hinhthe/'.$getHT[0]->hinhthe));
//        }
    }
    public function show($id)
    {
        $product = Product::find($id);
        if (isset($_GET['color'])){
            $color_id = $_GET['color'];
        }else{
            if ($product->images){
                $color_id = $product->images[0]->color_id;
            }
        }
        $images = $product->images->where('color_id',$color_id);

        return view('backend.pages.products.show')->with([
            'images'=>$images,
            'product'=>$product
        ]);
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if (Gate::allows('update-product', $product)){
            return view('backend.pages.products.create')->with([
                'page'=>1,
                'product'=>$product,
                'detail_product'=>$product->details,
                'image_product'=>$product->images
            ]);
        }else{
            dd('khong duoc sua');
        }
//        dd($product->images);

    }

    public function destroy($id)
    {
        if (Gate::allows('delete-product')){

            $images = Image::where('product_id',$id);
            //xoa file
            foreach ($images as $image){
                if(file_exists(public_path($image->path)))
                {
                    unlink(public_path($image->path));
                }
            }
            //xóa link sản phẩm
            $images->delete();
//        dd($img);
            //xóa sản phẩm
            Product::destroy($id);
        }else{
            dd('Chỉ admin mới được xóa !!!');
        }


        // Chuyển hướng về trang danh sách
        return redirect()->route('backend.product.index');
    }
}
