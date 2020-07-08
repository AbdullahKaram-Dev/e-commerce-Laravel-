<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;

class CategoryController extends Controller
{
    public function SaveCategory(StoreCategory $request)
    {
        $data = $request->all();
        $create = Category::create($data);

        if ($create) {

            alert('Success')->success('Added Category Name Successfully', 'Success');
            return redirect()->route('add-category');

        } else {

            alert('Error')->error('Cant Add Category Name', 'Error');
            return redirect()->route('add-category');
        }
    }

    public function DeleteCategory($id)
    {
        $Deleted = Category::findOrFail($id);
        $Deleted->delete();
        if ($Deleted) {


            alert('Success')->success('Deleted Category Successfully', 'Success');
            return redirect()->route('show-categories');

        } else {


            alert('Error')->error('Cant Delete This Category', 'Error');
            return redirect()->route('show-categories');

        }


    }
    public function EditCategory($id)
    {
        $OldData = Category::findOrFail($id);
        return view('admin.edit_category',compact('OldData'));
    }

    public function UpdateCategory($id,UpdateCategory $request)
    {
        $Update = Category::findOrFail($id);
        $Update->update($request->all());
        if($Update){

            alert('Success')->success('Updated Category Successfully', 'Success');
            return redirect()->route('show-categories');

        }else{

            alert('Error')->error('Cant Update This Category', 'Error');
            return redirect()->route('show-categories');

        }
    }
}
