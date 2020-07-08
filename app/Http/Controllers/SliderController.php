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
            return redirect()->route('add-slider');

        } else {

            alert('Error')->error('Cant Add New Slider', 'Error');
            return redirect()->route('add-slider');
        }


    }


    public function ChangeStatusToPending($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->update(['status' => '0']);
        if ($slider) {

            alert()->success('Pending Slider Successfully', 'Pending Successfully');
            return redirect()->back();
        } else {


            alert()->error('Pending Slider Failed', 'Pending Failed');
            return redirect()->back();
        }

    }

    public function ChangeStatusToActive($id)
    {

        $slider = Slider::findOrFail($id);
        $slider->update(['status' => '1']);
        if ($slider) {

            alert()->success('Active Slider Successfully', 'Active Successfully');
            return redirect()->back();
        } else {


            alert()->error('Active Slider Failed', 'Active Failed');
            return redirect()->back();
        }
    }

    public function DeleteSlider($id)
    {
        $DeleteSlider = Slider::findOrFail($id);
        $image = $DeleteSlider->slider_image;
        unlink(public_path('slider_images/' . $image));
        $DeleteSlider->delete();
        if ($DeleteSlider) {

            alert()->success('Deleted Slider Successfully', 'Deleted Successfully');
            return redirect()->back();
        } else {

            alert()->error('Delete Slider Failed', 'Delete Failed');
            return redirect()->back();
        }

    }

    public function EditSlider($id)
    {
        $OldData = Slider::findOrFail($id);
        return view('admin.edit_slider',compact('OldData'));

    }
    public function UpdateSlider($id,UpdateSlider $request)
    {

        
    }
}
