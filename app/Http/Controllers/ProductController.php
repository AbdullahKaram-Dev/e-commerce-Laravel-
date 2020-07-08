<?php

namespace App\Http\Controllers;


use App\Category;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Products;


class ProductController extends Controller
{
    public function SaveProduct(StoreProduct $request)
    {

        $image = time() . '.' . $request->product_image->getClientOriginalExtension();
        $request->product_image->move(public_path('images_products'), $image);
        $requestArray = ['product_image' => $image] + $request->all();


        $create = Products::create($requestArray);

        if ($create) {

            alert('Success')->success('Added New Product Successfully', 'Success');
            return redirect()->route('add-product');

        } else {

            alert('Error')->error('Cant Add New Product', 'Error');
            return redirect()->route('add-product');
        }
    }

    public function product($id)
    {
        $products = Products::where('category_id', $id)->get();
        $categories = Category::get();
        return view('client.products_by_category_name', compact('products', 'categories'));
    }

    public function ChangeStatusToPending($id)
    {
        $product = Products::findOrFail($id);
        $product->update(['status' => '0']);
        if ($product) {

            alert()->success('Pending Product Successfully', 'Pending Successfully');
            return redirect()->back();
        } else {


            alert()->error('Pending Product Failed', 'Pending Failed');
            return redirect()->back();
        }

    }

    public function ChangeStatusToActive($id)
    {
        $product = Products::findOrFail($id);
        $product->update(['status' => '1']);
        if ($product) {

            alert()->success('Active Product Successfully', 'Active Successfully');
            return redirect()->back();
        } else {


            alert()->error('Active Product Failed', 'Active Failed');
            return redirect()->back();
        }
    }

    public function DeleteProduct($id)
    {
        $DeletedProduct = Products::findOrFail($id);
        $image = $DeletedProduct->product_image;
        if(file_exists(public_path('images_products/'.$image))) {
            unlink(public_path('images_products/' . $image));
        }
        $DeletedProduct->delete();
        if ($DeletedProduct) {
            alert()->success('Deleted Product Successfully', 'Deleted Successfully');
            return redirect()->back();

        } else {
            alert()->error('Deleted Product Failed', 'Deleted Failed');
            return redirect()->back();
        }
    }

    public function EditProduct($id)
    {
        $OldData = Products::findOrFail($id);
        $categories = Category::get();
        return view('admin.edit_product',compact('OldData','categories'));
    }

    public function UpdateProduct($id,UpdateProduct $request)
    {
        if ($request->has('product_image')){
            $image = time().'.'.$request->product_image->getClientOriginalExtension();
            $request->product_image->move(public_path('images_products'), $image);
            $ArrayRequest = ['product_image'=>$image] + $request->all();
            $update = Products::findOrFail($id);
            $update->update($ArrayRequest);
            if ($update){

                alert()->success('Updated Product Successfully', 'Update Success');
                return redirect()->route('show-products');
            }
        }else{

            $update = Products::findOrFail($id);
            $OldImage = $update->product_image;
            $ArrayRequest = ['product_image'=>$OldImage] + $request->all();
            $update->update($ArrayRequest);
            if ($update){


                alert()->success('Updated Product Successfully', 'Update Success');
                return redirect()->route('show-products');
            }else{

                alert()->error('Fail To Update Product','Fail Updaate');
                return redirect()->route('show-products');

            }
        }

    }
}
