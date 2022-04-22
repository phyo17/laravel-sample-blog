<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;

class ApiController extends Controller
{
    public function getallcategory()
    {
        $data=Category::all();
        return json_encode($data);
    }

    public function insertcategory(Request $request)
    {
        $cat_title = $request->get('cat_title');
        Category::create(['cat_title'=>$cat_title]);
        return json_encode("Successfully");
    }

    public function editcategory($id)
    {
        $data=Category::find($id);
        return json_encode($data);
    }

    public function updatecategory(Request $request,$id)
    {
        $update_title=$request->get('update_title');
        Category::findOrFail($id)->update(['cat_title'=>$update_title]);
        return json_encode("Update Successfully");
    }

    public function deletecategory($id)
    {
        Category::find($id)->delete();
        return json_encode("Delete Successfully");
    }

    // =================================================== >

    public function getallpost()
    {
        $data=Post::all();
        return json_encode($data);
    }

    public function insertpost(Request $request)
    {
        $file=$request->file('post_image'); // file from <form> tag
        $filename=uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path('images/'),$filename);

        Post::create([
            'post_title'=>$request->get('post_title'),
            'post_category_id'=>$request->get('post_category_id'),
            'post_author'=>$request->get('post_author'),
            'post_image'=>$filename,
            'post_content'=>$request->get('post_content'),
            'post_date'=>$request->get('post_date')
        ]);

        return json_encode("Post Successfully Inserted");
    }

    public function editpost($id)
    {
        $data=Post::find($id);
        return json_encode($data);
    }

    public function updatepost(Request $request,$id)
    {
        $edit=Post::find($id);

        if($request->file('post_image')){
            unlink(public_path('images/'.$edit->post_image));

            $file=$request->file('post_image'); // file from <form> tag
            $filename=uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/images/',$filename);
            $edit->post_image=$filename;
            $edit->save();
        }
        // $edit->post_title=$request->get('post_title');
        // $edit->post_category_id=$request->get('post_category_id');
        // $edit->post_author=$request->get('post_author');
        // $edit->post_content=$request->get('post_content');
        // $edit->post_date=$request->get('post_date');
        // $edit->save();

        Post::findOrFail($id)->update([
            'post_title'=>$request->get('post_title'),
            'post_category_id'=>$request->get('post_category_id'),
            'post_author'=>$request->get('post_author'),
            'post_content'=>$request->get('post_content'),
            'post_date'=>$request->get('post_date')
        ]);

        return json_encode('Post Successfully Updated');
    }

    public function deletepost($id)
    {
        $delete=Post::find($id);
        $img_path=public_path('images/'.$delete->post_image);
        if(file_exists($img_path))
        {
            unlink($img_path);
        }

        $delete->delete();
        return json_encode('Post Deleted');
    }
}
