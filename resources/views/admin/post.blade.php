@extends('admin.master')

@section('page_title')
    Post Upload
@endsection

@section('content')
    <div class="col-md-12">
        <form action="{{url('/post')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" name="post_title" id="post_title" class="form-control" required="">
            </div>

            <div class="form-group">
                <label for="">Post Category</label>
                <select name="post_category_id" class="form-control" id="">
                    @foreach($category as $data)
                        <option value="{{ $data['id'] }}">{{ $data['cat_title'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="post_author">Post Author</label>
                <input type="text" name="post_author" id="post_author" class="form-control" required="">
            </div>

            <div class="form-group">
                <label for="post_image">Post Image</label>
                <input type="file" name="post_image" id="post_image" class="form-control" required="">
            </div>

            <div class="form-group">
                <label for="">Post Content</label>
                <textarea name="post_content" id="editor1" cols="30" rows="10" required=""></textarea>
            </div>

            <div class="form-group">
                <label for="post_date">Post Date</label>
                <input type="date" name="post_date" id="post_date" class="form-control" required="">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add Post">
            </div>
        </form>
    </div>
@endsection