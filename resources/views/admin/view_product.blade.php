@include('admin.nav')

<table id="example" class="table table-striped" style="width:100%; justify-content: center;'>">
        <thead>
            <tr>
                <th>Product Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($product as $products)
                    <tr>
                        <td>{{$products->title}}</td>
                        <td>{!!Str::limit($products->description,50)!!}</td>
                        <td>{{$products->category}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>
                            <img src="products/{{$products->image}}" height="70px" width="70px" alt="">
                        </td>
                        <td>
                            <a class="btn btn-success"href="{{ url('update_product', $products->id) }}">Update</a>
                        </td>
                        <td>
                            <a class="btn btn-error" onclick="confirmation(event)" href="{{ url('delete_product', $products->id) }}">Delete</a>
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

<script type="text/javascript">
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');

        swal({
            title: "Are you sure to delete this product?",
            text: "You will not be able to recover this product.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = urlToRedirect;
            }
        });
    }
</script>

    

</body>
</html>