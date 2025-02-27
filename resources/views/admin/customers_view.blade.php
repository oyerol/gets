@include('admin.nav')

<div class="flex flex-col items-center p-8 gap-8">
    <!-- Form Section -->
    <div class="w-full max-w-lg bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-center">Add Customer</h2>
        <form action="{{ url('customers_viewadd') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" class="input input-bordered w-full mt-1" placeholder="Enter customer name">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" class="textarea textarea-bordered w-full mt-1" placeholder="Enter description"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-full">Add Customer</button>
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <div class="w-full bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-center">Customer List</h2>
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->description }}</td>
                        <td>
                            <form action="{{ url('customers_viewdelete', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmation(event) {
        if (!confirm('Are you sure you want to delete this?')) {
            event.preventDefault();
            return false;
        }
        return true;
    }
</script>


</body>
</html>


