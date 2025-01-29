@include('admin.nav')


    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-3/4 w-[30%]">
            <h2 class="text-center text-2xl font-bold text-primary mb-6">Update Product</h2>
            <form action="{{ url('edit_product', $data->id) }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
    
                <!-- Title Field -->
                <div class="form-control">
                    <label for="title" class="label">
                        <span class="label-text">Title</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ $data->title }}" class="input input-bordered" />
                </div>
    
                <!-- Description Field -->
                <div class="form-control">
                    <label for="description" class="label">
                        <span class="label-text">Description</span>
                    </label>
                    <textarea id="description" name="description" class="textarea textarea-bordered" rows="4">{{ $data->description }}</textarea>
                </div>
    
                <!-- Price Field -->
                <div class="form-control">
                    <label for="price" class="label">
                        <span class="label-text">Price</span>
                    </label>
                    <input type="text" id="price" name="price" value="{{ $data->price }}" class="input input-bordered" />
                </div>
    
                <!-- Quantity Field -->
                <div class="form-control">
                    <label for="quantity" class="label">
                        <span class="label-text">Quantity</span>
                    </label>
                    <input type="number" id="quantity" name="quantity" value="{{ $data->quantity }}" class="input input-bordered" />
                </div>
    
                <!-- Category Field -->
                <div class="form-control">
                    <label for="category" class="label">
                        <span class="label-text">Category</span>
                    </label>
                    <select id="category" name="category" class="select select-bordered">
                        <option value="{{ $data->category }}" selected>{{ $data->category }}</option>
                        @foreach($category as $cat)
                            <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <!-- Current Image -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Current Image</span>
                    </label>
                    <div class="flex justify-center">
                        <img src="/products/{{ $data->image }}" alt="Current Image" class="rounded-lg border w-36 h-36 object-cover" />
                    </div>
                </div>
    
                <!-- New Image -->
                <div class="form-control">
                    <label for="image" class="label">
                        <span class="label-text">New Image</span>
                    </label>
                    <input type="file" id="image" name="image" class="file-input file-input-bordered" />
                </div>
    
                <!-- Submit Button -->
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>



