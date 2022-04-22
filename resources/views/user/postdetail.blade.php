@extends('user.master')

@section('content')
    <h1 class="page-header">
        {{ $page_title }}
        <small>Diploma Mini Blog Project</small>
    </h1>

    <!-- First Blog Post -->
    @foreach($post as $data)
    <h2>
        <a href="">{{ $data['post_title'] }}</a>
    </h2>
    <p class="lead">
        by <a href="index.php">{{ $data['post_author'] }}</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Post on {{ date('F-j-Y',strtotime($data['post_date'])) }}</p>
    <hr>
    <img class="img-responsive" src="{{ asset('images/'.$data['post_image']) }}" alt="">
    <hr>
    <p>{!! $data['post_content'] !!}</p>

    <hr>
    @endforeach

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