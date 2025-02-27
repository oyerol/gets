@include('home.nav')

    <div class="single">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="single-content">
                      <img src="/products/{{$data->image}}" height="500px"
                      style="object-fit: cover;"
                      />
                      <h1 class="text-xl font-semibold text-gray-700">
                        {{ $data->title }}
                      </h1>
                      <h3>{{ $data->price }}</h3>
                      <h3>
                        {{ $data->category }}
                      </h3>
                      <h4>{{ $data->quantity }}</h4>
                    <p>
                     {{ $data->description }}
                    </p>
                  </div>

                  <a class="btn btn-custom" href="">Add TO Cart</a>


              </div>

              <div class="col-lg-4">
                  <div class="sidebar">

                      <div class="sidebar-widget">
                          <h2 class="widget-title">Other Products</h2>
                          <div class="recent-post">
                              <div class="post-item">
                                  <div class="post-img">
                                      <img src="/products/{{$data->image}}" height="70px"  style="object-fit: cover;"/>
                                  </div>
                                  <div class="post-text">
                                      <a href="">Charity giving to the people of Bulambuli Bugisu Subregion.</a>
                                      
                                  </div>
                              </div>
                              <div class="post-item">
                                  <div class="post-img">
                                      <img src="img/causes-3.jpg" height="70px" style="object-fit: cover;" />
                                  </div>
                                  <div class="post-text">
                                      <a href="">Supporting more than 5 orphans with school fees in different institutions.</a>    
                                  </div>
                              </div>
                              <div class="post-item">
                                  <div class="post-img">
                                      <img src="img/causes-4.jpg" />
                                  </div>
                                  <div class="post-text">
                                      <a href="">Economic and Community projects to the citizens.</a>
                                  </div>
                              </div>
                              <div class="post-item">
                                  <div class="post-img">
                                      <img src="img/church2.jpg" />
                                  </div>
                                  <div class="post-text">
                                      <a href="">Worship Places in Western and Eastern Uganda.</a>
                                  </div>
                              </div>
                              <div class="post-item">
                                  <div class="post-img">
                                      <img src="img/QURUBAN.jpg" />
                                  </div>
                                  <div class="post-text">
                                      <a href="">Quruban has been provided to many mosques around the country.</a>
                                  </div>
                              </div>
                              <div class="post-item">
                                  <div class="post-img">
                                      <img src="img/food.jpg" />
                                  </div>
                                  <div class="post-text">
                                      <a href="">Providing Food to the Moslems during Ramadhan.</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    
    

 @include('home.footer')