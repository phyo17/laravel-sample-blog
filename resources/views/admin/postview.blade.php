@extends('admin.master')

@section('page_title')
    View All Posts
@endsection

@section('content')
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>No:</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Category_id</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                @foreach($post as $i=>$data)
                <tr>
                    <td> {{ ++$i }} </td>
                    <td><img src="{{ asset('images/'.$data['post_image']) }}" width="120" alt=""></td>
                    <td> {{ $data['post_title'] }} </td>
                    <td> {{ $data['category']['cat_title'] }} </td>
                    <td> {{ $data['post_author'] }} </td>
                    <td> {!! $data['post_content'] !!} </td>
                    <td> {{ $data['post_date'] }} </td>
                    <td>
                        @if($data['post_status']===0)
                            <a href="{{ url('post_status/'.$data['id']) }}" class="btn btn-dark"><i class="fa fa-eye-slash fa-2x" aria-hidden="true"></i></a>
                        @else
                            <a href="{{ url('post_status/'.$data['id']) }}" class="btn btn-dark"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                        @endif
                    </td>
                    <td><a href="{{url('post/'.$data['id'].'/edit')}}" class="btn btn-warning">Update</a></td>
                    <td>
                        {{-- <a href="{{url('post/'.$data['id'].'/delete')}}" class="btn btn-danger">Delete</a> --}}
                        <form action="{{ url('post/'.$data['id']) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" onclick="return confirm('Are you sure to Delete???')" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection