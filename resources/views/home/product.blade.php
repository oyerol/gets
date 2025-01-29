@include('home.nav')



<div  class="products">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Our Products</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="our_products">
               <div class="row">

                  @foreach ($product as $products )

                  <div class="col-md-4 margin_bottom1">
                     <div class="product_box">
                        <figure><img width="100px" height="100px" src="products/{{ $products->image }}" alt="#"/></figure>
                        <h3>{{$products->title}}</h3>
                        <h4>
                           Price
                           <span>${{ $products->price }}</span>
                        </h4>
                        <div>
                           <a class="btn btn-danger" href="{{ url('product_details',$products->id) }}">Details</a>
                           <a class="btn btn-primary" href="{{ url('add_cart',$products->id) }}">Add TO Cart</a>
                        </div>
                     </div>
                  </div>

                  @endforeach

               </div>
            </div>
         </div>
      </div>
   </div>
</div>







@include('home.footer')