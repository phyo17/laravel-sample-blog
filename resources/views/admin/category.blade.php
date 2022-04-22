@extends('admin.master')

@section('page_title')
    Category Page
@endsection

@section('content')
    <div class="col-md-6">
        <form action="{{url('/category')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Add Category</label>
                <input type="text" class="form-control" name="cat_title">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add Category">
            </div>
        </form>

        @if(@$url=='edit')
        <hr>
            <form action="{{url('/update_category/'.$edit['id'])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Update Category</label>
                    <input type="text" class="form-control" value="{{$edit['cat_title']}}" name="cat_title">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update Category">
                </div>
            </form>
        @endif
    </div>
    <div class="col-md-6">
        <table class="table table-bordered table-hover">
            <tr>
                <th>No:</th>
                <th>Category</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach($data as $i=>$result)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $result['cat_title'] }}</td>
                <td>
                    @if($result['status']===0)
                        <a href="{{url('status_category/'.$result['id'])}}" class="btn btn-dark"><i class="fa fa-eye-slash fa-2x" aria-hidden="true"></i></a>
                    @else
                        <a href="{{url('status_category/'.$result['id'])}}" class="btn btn-dark"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                    @endif
                </td>
                <td><a href="{{url('edit_category/'.$result['id'])}}" class="btn btn-warning">Update</a></td>
                <td><a href="{{url('delete_category/'.$result['id'])}}" onclick="return confirm('Are sure to delete this category???')" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection