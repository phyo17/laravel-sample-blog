@extends('admin.master')

@section('page_title')
    Post Upload
@endsection

@section('content')
    <div class="col-md-12">
        <form action="{{url('post/'.$data['id'])}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" name="post_title" value="{{ $data['post_title'] }}" id="post_title" class="form-control" required="">
            </div>

            <div class="form-group">
                <label for="">Post Category</label>
                <select name="post_category_id" class="form-control" id="">
                        <option value="{{ $data->post_category_id }}">{{ $data->category->cat_title }}</option>
                    @foreach($category as $val)
                        <option value="{{ $val['id'] }}">{{ $val['cat_title'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="post_author">Post Author</label>
                <input type="text" name="post_author" value="{{ $data['post_author'] }}" id="post_author" class="form-control" required="">
            </div>

            <div class="form-group">
                <label for="post_image">Post Image</label><br>
                <img src="{{ asset('images/'.$data['post_image']) }}" width="120" alt="">
                <input type="file" name="post_image" id="post_image" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Post Content</label>
                <textarea name="post_content" id="editor1" cols="30" rows="10" required="">{{ $data['post_content'] }}</textarea>
            </div>

            <div class="form-group">
                <label for="post_date">Post Date</label>
                <input type="date" name="post_date" value="{{ $data['post_date'] }}" id="post_date" class="form-control" required="">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update Post">
            </div>
        </form>
    </div>
@endsection