@include('admin.nav')


<table id="example" class="table table-striped" style="width:100%; justify-content: center;'>">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Status</th>
            <th>Reply</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    
       
        @foreach ($data as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->status }}</td>
                <td>
                <!-- <a class="btn btn-primary" href="">Reply</a> -->

                
                <!-- Open the modal using ID.showModal() method -->
<button class="btn btn-primary" onclick="my_modal_1.showModal()">Reply</button>
<dialog id="my_modal_1" class="modal">
  <div class="modal-box">
        <form action="" method="POST" class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6">
            @csrf
            <!-- <label class="block text-gray-700 text-sm font-bold mb-2">Your Reply:</label> -->
            <textarea 
                name="reply_message" 
                required 
                placeholder="Type your reply here..." 
                class="textarea textarea-bordered w-full h-32 p-3 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            ></textarea>
            
            <button 
                type="submit" 
                class="btn btn-primary w-full mt-4"
            >
                Send Reply
            </button>
        </form>




    <div class="modal-action">
      <form method="dialog">
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn">Close</button>
      </form>
    </div>
  </div>
</dialog>




                </td>
                <td>
                <form action="{{ url('delete_contactus', $contact->id) }}" method="POST" onsubmit="return confirmation(event)">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error">Delete</button>
                </form>

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

<script>
    function confirmation(event) {
        if (!confirm('Are you sure you want to delete this contact?')) {
            event.preventDefault();
            return false;
        }
        return true;
    }
</script>
   

</body>
</html>






