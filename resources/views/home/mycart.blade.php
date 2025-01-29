@include('home.nav')
      <!-- end header section -->

      <style>
         .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
         }
         table{ 
            border: 2px solid black;
            text-align: center;
            width: 800px;
         }
         th{
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black;
         }
      </style>
  
      <!-- product start -->
      <section class="banner_main">
        <div id="banner1" class="carousel slide" data-ride="carousel">
           <ol class="carousel-indicators">
              <li data-target="#banner1" data-slide-to="0" class="active"></li>
              <li data-target="#banner1" data-slide-to="1"></li>
              <li data-target="#banner1" data-slide-to="2"></li>
              <li data-target="#banner1" data-slide-to="3"></li>
              <li data-target="#banner1" data-slide-to="4"></li>
           </ol>
           <div class="carousel-inner">
              <div class="carousel-item active">
                 <div class="container">
                    <div class="carousel-caption">
                       <div class="row">
                          <div class="col-md-6">
                             <div class="text-bg">
                                <span>Computer And Laptop</span>
                                <h1>Accessories</h1>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or </p>
                                <a href="#">Buy Now </a> <a href="contact.html">Contact </a>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="text_img">
                                <figure><img src="{{ asset('images/pct.png') }}" alt="#"/></figure>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="carousel-item">
                 <div class="container">
                    <div class="carousel-caption">
                       <div class="row">
                          <div class="col-md-6">
                             <div class="text-bg">
                                <span>Computer And Laptop</span>
                                <h1>Accessories</h1>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or </p>
                                <a href="#">Buy Now </a> <a href="contact.html">Contact </a>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="text_img">
                                <figure><img src="{{ asset('images/pct.png') }}" alt="#"/></figure>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="carousel-item">
                 <div class="container">
                    <div class="carousel-caption">
                       <div class="row">
                          <div class="col-md-6">
                             <div class="text-bg">
                                <span>Computer And Laptop</span>
                                <h1>Accessories</h1>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or </p>
                                <a href="#">Buy Now </a> <a href="contact.html">Contact </a>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="text_img">
                                <figure><img src="{{ asset('images/pct.png') }}" alt="#"/></figure>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="carousel-item">
                 <div class="container">
                    <div class="carousel-caption">
                       <div class="row">
                          <div class="col-md-6">
                             <div class="text-bg">
                                <span>Computer And Laptop</span>
                                <h1>Accessories</h1>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or </p>
                                <a href="#">Buy Now </a> <a href="contact.html">Contact </a>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="text_img">
                                <figure><img src="{{ asset('images/pct.png') }}" alt="#"/></figure>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="carousel-item">
                 <div class="container">
                    <div class="carousel-caption">
                       <div class="row">
                          <div class="col-md-6">
                             <div class="text-bg">
                                <span>Computer And Laptop</span>
                                <h1>Accessories</h1>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or </p>
                                <a href="#">Buy Now </a> <a href="contact.html">Contact </a>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="text_img">
                                <figure><img src="{{ asset('images/pct.png') }}" alt="#"/></figure>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
           <i class="fa fa-chevron-left" aria-hidden="true"></i>
           </a>
           <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
           <i class="fa fa-chevron-right" aria-hidden="true"></i>
           </a>
        </div>
     </section> 


    <div class="div_deg">
      <table>
         <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Delete</th>
         </tr>


         <?php
         $value = 0;
     ?>

     @foreach($cart as $cartItem)
     <tr class="border border-black">
         <td class="border border-black">{{ $cartItem->product->title }}</td>
         <td class="border border-black">{{ $cartItem->product->price }}</td>
         <td class="border border-black">
             @if($cartItem->product && $cartItem->product->image)
                 <img width="100px" height="100px" style="object-fit: cover;" src="/products/{{$cartItem->product->image}}" alt="{{ $cartItem->product->title }}" class="w-16 h-16 rounded-lg">
             @else
                 No image available
             @endif
         </td>
         <td class="border border-black">
             <form action="" method="POST">
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-danger px-4 py-2 rounded-lg">Remove</button>
             </form>
         </td>
     </tr>

     <?php
         $value += $cartItem->product->price;
     ?>
     @endforeach
      </table>
    </div>
    

 @include('home.footer')