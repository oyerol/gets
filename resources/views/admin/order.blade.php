@include('admin.nav')


<table id="example" class="table table-striped" style="width:100%; justify-content: center;'>">
    <thead>
        <tr>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Status</th>
            <th>Change Status</th>
            <th>Delete</th>
            <th>Print PDF</th>
        </tr>
    </thead>
    <tbody>
    
        @foreach ($data as $data)
                  
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->rec_address }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->product->title }}</td>
                    <td>{{ $data->product->price }}</td>
                    <td>
                       <img width="50px" src="products/{{ $data->product->image }}" alt="">
                    </td>
                    <td>
                        @if ($data->status == 'in progress')
                        <span style="color: red;"> {{ $data->status }}</span>
                        @elseif($data->status == 'On the Way')
                        <span style="color: green;"> {{ $data->status }}</span>
                        @else
                        <span style="color: blue;"> {{ $data->status }}</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ url('on_the_way', $data->id) }}">On The Way</a>
                        <a class="btn btn-success" href="{{ url('delivered', $data->id) }}">Delivered</a>
                    </td>

                    <td>
                    <form action="{{ url('order_delete', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error">Delete</button>
                            </form>
                    </td>
                    <td>
                        <a class="btn btn-secondary" href="{{ url('print_pdf', $data->id) }}">Print PDF</a>
                    </td>
                    
                </tr>
                
            @endforeach
                
            
        </tbody>
</table>




<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable({
            paging: true,           //Enable pagination
            searching: true,       //Enable search box
            lengthChange: true,    // Show "entries per page" dropdown
            ordering: true,        // Enable column sorting
            pageLength: 5       // Default number of rows per page
        });
    });
    </script>

</body>
</html>






