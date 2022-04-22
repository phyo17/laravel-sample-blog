<footer>
    <div class="container">
        <div class="col-md-4" >
            <h3>Gallery Posts</h3>
                <div class="row">
                    @foreach($post as $data)
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 7px; margin-bottom: 3px">
                     <div class="gallery-image">
                       <img src="{{ asset('images/'.$data['post_image']) }}" alt="image view" width="100px" height="80px">
                     </div>
                  </div>
                    @endforeach
                </div>
        </div>
        
        <div class="col-md-4">
            <h3>Our Location </h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d30551.094263837873!2d96.1947486!3d16.831971799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smm!4v1583907419974!5m2!1sen!2smm" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="col-md-4" >
            <h3>Contact Us</h3>
            <ul>
                <li>Phone : 123 - 456 - 789</li>
                <li>E-mail : info@comapyn.com</li>
                <li>Address : Yangon, ThinGanGyun</li>
            </ul>
            <hr>

            <div class="myicon">
                <a href="#" ><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href="#" ><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
            </div>

        </div>
    </div>

            <!-- /.row -->
</footer>

    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{asset('user/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('user/js/bootstrap.min.js')}}"></script>

</body>

</html>