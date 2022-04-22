    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="{{ url('search') }}" method="post">
            @csrf
            <div class="input-group">
                <input type="text" name="search_text" class="form-control" required="">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                @foreach($category as $data)
                <ul class="list-unstyled">
                    <li><a href="{{ url('category/'.$data['id']) }}">{{ $data['cat_title'] }}</a>
                    </li>
                </ul>
                @endforeach
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>