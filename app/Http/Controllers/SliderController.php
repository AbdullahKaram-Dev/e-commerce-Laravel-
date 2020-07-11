<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSlider;
use App\Http\Requests\UpdateSlider;
use App\Slider;

class SliderController extends Controller
{
    public function SaveSlider(StoreSlider $request)
    {
        $image = time() . '.' . $request->slider_image->getClientOriginalExtension();
        $request->slider_image->move(public_path('slider_images'), $image);

        $requestArray = ['slider_image' => $image] + $request->all();

        $create = Slider::create($requestArray);

        if ($create) {

            alert('Success')->success('Added New Slider Successfully', 'Success');
            return redirect()->route('show-sliders');
        } else {

            alert('Error')->error('Cant Add New Slider', 'Error');
            return redirect()->route('show-sliders');
        }


    }


    public function ChangeStatusToPending($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->update(['status' => '0']);
        if ($slider) {

            alert()->success('Pending Slider Successfully', 'Pending Successfully');
            return redirect()->route('show-sliders');
        } else {


            alert()->error('Pending Slider Failed', 'Pending Failed');
            return redirect()->route('show-sliders');
        }

    }

    public function ChangeStatusToActive($id)
    {

        $slider = Slider::findOrFail($id);
        $slider->update(['status' => '1']);
        if ($slider) {

            alert()->success('Active Slider Successfully', 'Active Successfully');
            return redirect()->route('show-sliders');
        } else {


            alert()->error('Active Slider Failed', 'Active Failed');
            return redirect()->route('show-sliders');
        }
    }

    public function DeleteSlider($id)
    {
        $DeleteSlider = Slider::findOrFail($id);
        $image = $DeleteSlider->slider_image;
        if (file_exists(public_path('slider_images/').$image)){
            unlink(public_path('slider_images/').$image);
            $DeleteSlider->delete();

            alert()->success('Deleted Slider Successfully', 'Deleted Successfully');
            return redirect()->route('show-sliders');
        }else{
            $DeleteSlider->delete();

            alert()->success('Deleted Slider Successfully', 'Deleted Successfully');
            return redirect()->route('show-sliders');
        }

    }

    public function EditSlider($id)
    {
        $OldData = Slider::findOrFail($id);
        return view('admin.edit_slider',compact('OldData'));

    }
    public function UpdateSlider($id,UpdateSlider $request)
    {
        if ($request->has('slider_image')){
            $image = time().'.'.$request->slider_image->getClientOriginalExtension();
            $request->slider_image->move(public_path('slider_images'), $image);
            $ArrayRequest = ['slider_image'=>$image] + $request->all();
            $update = Slider::findOrFail($id);
            $update->update($ArrayRequest);
            if ($update){

                alert()->success('Updated Slider Successfully', 'Update Success');
                return redirect()->route('show-sliders');
            }
        }else{

            $update = Slider::findOrFail($id);
            $OldImage = $update->slider_image;
            $ArrayRequest = ['slider_image'=>$OldImage] + $request->all();
            $update->update($ArrayRequest);
            if ($update){


                alert()->success('Updated Slider Successfully', 'Update Success');
                return redirect()->route('show-sliders');
            }else{

                alert()->error('Fail To Update Slider','Fail Update');
                return redirect()->route('show-sliders');

            }
        }
    }
}
