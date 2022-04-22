@extends('user.master')

@section('content')
    <h1 class="page-header">
        {{ $page_title }}
        <small>Diploma Mini Blog Project</small>
    </h1>

    <!-- First Blog Post -->
    @foreach($post as $data)
    <h2>
        <a href="{{ url('postdetail/'.$data['id']) }}">{{ $data['post_title'] }}</a>
    </h2>
    <p class="lead">
        by <a href="index.php">{{ $data['post_author'] }}</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Post on {{ date('F-j-Y',strtotime($data['post_date'])) }}</p>
    <hr>
    <a href="{{ url('postdetail/'.$data['id']) }}">
        <img class="img-responsive" src="{{ asset('images/'.$data['post_image']) }}" alt="">
    <hr>
    </a>
    <p>{!! substr($data['post_content'],0,150)." ..... " !!}</p>
    <a class="btn btn-primary" href="{{ url('postdetail/'.$data['id']) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>
    @endforeach
    <div style="margin-left:40%; ">
        {{$post->appends(request()->except(['page', '_token']))->links()}}
    </div>
    <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>
@endsection