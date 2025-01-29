@include('admin.nav')

<style type="text/css">
    input[type='text']
    {
        width: 400px;
        height: 50px;
        padding: 5px;
        margin-bottom: 10px;
    }
    .div_deg
    {
        display: flex;
        justify-content: center;
        align-items: center;
        padding :30px;
    }

    .table_deg
    {
        text-align: center;
        margin: auto;
        border: 2px solid yellowgreen;
        margin-top: 50px;
        width: 600px;
    }

    th
    {
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
    }
    td
    {
        padding: 15px;
        font-size: 20px;
        color: blue;
        border: 1px solid skyblue;
    }

</style>

<div class="container">

<h1>
    Add Category
</h1>

<div class="div_deg">


<form action="{{url('add_category')}}" method="POST">

@csrf
    <div>
    <input type="text" name="category">
    <input class="btn btn-primary" type="submit" name="Add Category">
    </div>
</form>

</div>

<div>
<table class="table_deg">
            <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

        @foreach ($data as $data)
            <tr>
                <td>{{$data->category_name}}</td>
                <!-- <td>
                    <a class="btn btn-success" href="{{url('edit_category',$data->id)}}">Edit</a>
                </td> -->

                <td>
  <button class="btn btn-primary" onclick="showModal()">Edit</button>
  <dialog id="my_modal_3" class="modal">
    <div class="modal-box">
      <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      </form>
      <div class="form-container">
            <h1 class="text-center text-2xl mb-4">Edit Category</h1>

            <form action="{{ url('update_category', $data->id) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <input type="text" name="category" value="{{ $data->category_name }}" required class="border rounded p-2 w-full">
                </div>

                <div class="flex justify-center">
                    <input class="btn btn-success" type="submit" value="Update Category">
                </div>
            </form>
        </div> 
    </div>
  </dialog>
</td>


                <td>
                <a class="btn btn-warning" OnClick="confirmation(event)" href="{{url('delete_category',$data->id)}}">Delete</a>

                </td>
            </tr>
            @endforeach
        

        </table>
</div>


</div>



<script>
  function showModal() {
    const modal = document.getElementById('my_modal_3');
    if (modal) {
      modal.showModal();
    } else {
      console.error('Modal element not found!');
    }
  }
</script>

<script type="text/javascript">

    function confirmation(ev)
    {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');

        console.log(urlToRedirect);

        swal({
            title: "Are you Sure to Delete This",
            text: "You will not be able to recover this category.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })

        .then((willCancel)=>
    {
        if(willCancel){
            window.location.href = urlToRedirect
        }
    })
    }

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w75HyFbb7K+4a4uL5QnBQKmj4YH8Rif8KkK2S/0T2hB5ZTl6IEODaCkhP7xUbaB/" crossorigin="anonymous"></script>

</body>
</html>