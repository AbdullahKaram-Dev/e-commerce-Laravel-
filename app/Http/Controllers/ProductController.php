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

                alert()->error('Fail To Update Product','Fail Update');
                return redirect()->route('show-products');

            }
        }

    }

    public function ShowProduct($id)
    {

        $SingleProduct = Products::findOrFail($id);
        $categories = Category::get();

        if(request('id') && request('resourcePath')){

            $payment_status = $this->getPaymentStatus(request('id'),request('resourcePath'));
            if (isset($payment_status['id'])){

                $showSuccessPaymentMessage = 'Success';
                return view('client.SinglePost',compact('SingleProduct','categories','showSuccessPaymentMessage'));

            }else{

                $showFailPaymentMessage = 'Fail';
                return view('client.SinglePost',compact('SingleProduct','categories','showFailPaymentMessage'));

            }
        }

        return view('client.SinglePost',compact('SingleProduct','categories'));
    }

    private function getPaymentStatus($id,$resourcePath)
    {
        $url = "https://test.oppwa.com/";
        $url .= $resourcePath;
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return json_decode($responseData,true);

    }
}
