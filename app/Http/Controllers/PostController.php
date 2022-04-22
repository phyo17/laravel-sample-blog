<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::orderby('id','desc')->get();
        return view('admin.postview',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $category=Category::all();
        $category=Category::where('status',1)->get();
        return view('admin.post',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return redirect('post/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::where('status',1)->get();
        $data=Post::find($id);
        return view('admin.postedit',compact('data','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $edit->post_title=$request->get('post_title');
        $edit->post_category_id=$request->get('post_category_id');
        $edit->post_author=$request->get('post_author');
        $edit->post_content=$request->get('post_content');
        $edit->post_date=$request->get('post_date');
        $edit->save();

        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Post::find($id);
        $img_path=public_path('images/'.$delete->post_image);
        if(file_exists($img_path))
        {
            unlink($img_path);
        }

        $delete->delete();
        return redirect('post');
    }

    public function status($id)
    {
        $data=Post::find($id);
        if($data['post_status']===0){
            $data['post_status']=1;
        }else{
            $data['post_status']=0;
        }
        $data->save();

        return redirect('post');
    }
}
