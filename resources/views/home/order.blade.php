@include('home.nav')

<div class="flex justify-center py-5 my-8">
    <div class="overflow-x-auto w-3/4 mx-auto p-4 bg-white shadow-lg rounded-lg">
        <table class="table table-zebra w-full">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="p-4 text-left">Product Name</th>
                    <th class="p-4 text-left">Price</th>
                    <th class="p-4 text-left">Delivery Status</th>
                    <th class="p-4 text-left">Image</th>
                </tr>
            </thead>
            <tbody>

            @foreach($order as $order)
                <tr class="hover:bg-primary hover:text-white transition-all">
                    <td class="p-4">{{$order->product->title}}</td>
                    <td class="p-4 text-lg font-semibold text-gray-700">{{$order->product->price}}</td>
                    <td class="p-4">
                        <span class="badge badge-info">{{$order->status}}</span>
                    </td>
                    <td class="p-4">
                        <img width="50px" src="/products/{{$order->product->image}}" alt="Product Image" class="w-32 h-24 rounded-lg object-cover shadow-md">
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>


@include('home.footer')