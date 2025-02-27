@include('home.nav')

<style>
   .div_deg{
      display: flex;
      justify-content: center;
      align-items: flex-start;
      margin: 60px;
      gap: 40px;
   }
   .order_deg{
      padding: 20px;
      background-color: #f9fafb;
      border: 2px solid #e5e7eb;
      border-radius: 1rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 350px;
   }
   .div_gap {
      margin-bottom: 1rem;
   }
   .div_gap label {
      display: block;
      font-weight: bold;
      margin-bottom: 0.5rem;
      color: #374151;
   }
   .div_gap input, .div_gap textarea {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
   }
</style>

<div class="div_deg">

  <div class="w-full max-w-3xl">
    <table class="table w-full border-collapse border border-gray-300 shadow-lg rounded-lg overflow-hidden">
      <thead>
        <tr class="bg-gray-800 text-black">
          <th class="px-4 py-2">Product Title</th>
          <th class="px-4 py-2">Price</th>
          <th class="px-4 py-2">Image</th>
          <th class="px-4 py-2">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php $value = 0; ?>

        @foreach($cart as $cartItem)
        <tr class="even:bg-gray-100 odd:bg-white">
          <td class="px-4 py-2 border border-gray-300">{{ $cartItem->product->title }}</td>
          <td class="px-4 py-2 border border-gray-300">${{ number_format($cartItem->product->price, 2) }}</td>
          <td class="px-4 py-2 border border-gray-300">
            @if($cartItem->product && $cartItem->product->image)
              <img class="w-24 h-24 object-cover rounded-lg mx-auto" width="70px" src="/products/{{$cartItem->product->image}}" alt="{{ $cartItem->product->title }}">
            @else
              <span class="text-gray-500">No image available</span>
            @endif
          </td>
          <td class="px-4 py-2 border border-gray-300 text-center">
            <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="confirmation(event)" class="btn btn-danger text-white">Remove</button>
            </form>
          </td>
        </tr>
        <?php $value += $cartItem->product->price; ?>
        @endforeach
        <h3 class="text-center text-2xl font-bold mt-8">Total: ${{ number_format($value, 2) }}</h3>
      </tbody>
    </table>
  </div>

  <div class="order_deg">
    <form action="{{ url('confirm_order') }}" method="POST">
      @csrf
      <div class="div_gap">
        <label>Receiver Name</label>
        <input type="text" name="name" value="{{Auth::user()->name}}">
      </div>

      <div class="div_gap">
        <label>Address</label>
        <textarea name="address">{{Auth::user()->address}}</textarea>
      </div>

      <div class="div_gap">
        <label>Phone</label>
        <input type="text" name="phone" value="{{Auth::user()->phone}}">
      </div>

      <div class="div_gap text-center flex items-center justify-center gap-4">
        <input class="btn btn-primary w-auto" type="submit" value="Cash On Delivery">
        <a class="btn btn-success" href="{{url('stripe',$value)}}">Pay Using Card</a>
      </div>
    </form>
  </div>


</div>

<!-- <h3 class="text-center text-2xl font-bold mt-8">Total: ${{ number_format($value, 2) }}</h3> -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
  function confirmation(ev) {
      ev.preventDefault();
      var form = ev.target.closest("form");

      swal({
          title: "Are you sure to delete this product?",
          text: "You will not be able to recover this product.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
           form.submit();
          }
      });
  }
</script>

@include('home.footer')
