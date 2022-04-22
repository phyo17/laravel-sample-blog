@include('user.user_layout.header')
    <!-- Navigation -->
    @include('user.user_layout.nav')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                @yield('content')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4" style="position:sticky; top: 60px;">

            @include('user.user_layout.sidebar')

            </div>

        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
@include('user.user_layout.footer')
