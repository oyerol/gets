<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Contactus;
use App\Models\Customers_view;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status','Delivered')->get()->count();
        return view('admin.index', compact('user','product','order','delivered'));
    }

    public function view_category()
    {
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        toastr()->timeout(10000)->closeButton()->success('Category Added Successfully!.');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();

        // toastr()->timeout(10000)->closeButton()->success('Category Updated Successfully!.');

        // return redirect()->route('/view_category');
        return redirect()->route('view_category');

    }
    

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request)
    {

        $data = new Product;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;
        }
        $data->save();

        toastr()->timeout(10000)->closeButton()->success('Product Added successfully.');

        return redirect()->back();

    }

    public function view_product()
    {
        $product = Product::All();
        return view('admin.view_product',compact('product'));
    }

    public function delete_product($id)
    {

        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }

        $data->delete();

        toastr()->timeout(10000)->closeButton()->success('Product Added successfully.');

        return redirect()->back();

    }

    public function update_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_page',compact('data','category'));
    }

    public function edit_product(request $request,$id)
    {


        $data = Product::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeout(10000)->closeButton()->success('Product Updated successfully.');

        return redirect('/view_product');
    }

    public function view_orders()
    {
        $data = Order::all();
        return view('admin.order', compact('data'));
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);
        
        if (!$data) {
            toastr()->error('Order not found!');
            return redirect('/view_orders');
        }
    
        $data->status = 'On the Way';
        $data->save();
    
        toastr()->timeout(10000)->closeButton()->success('Product On the Way successfully.');
    
        return redirect('/view_orders');
    }
    
    public function delivered($id)
    {
        $data = Order::find($id);
        
        if (!$data) {
            toastr()->error('Order not found!');
            return redirect('/view_orders');
        }
    
        $data->status = 'Delivered';
        $data->save();
    
        toastr()->timeout(10000)->closeButton()->success('Product Delivered successfully.');
    
        return redirect('/view_orders');
    }

    public function order_delete($id)
    {
        
        $data = Order::find($id);

        $data->delete();
        return redirect()->back()->with('success', 'Order deleted successfully!');
    }

    public function print_pdf($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    }

    public function showcontact()
    {
        $data = contactus::all();
        return view('admin.showcontact',compact('data'));
    }

    public function delete_contactus($id)
    {
        
        $contact = Contactus::find($id);

        $contact->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully!');
    }

    public function customers_view()
    {
        $data = customers_view::all();
        return view('admin.customers_view',compact('data'));
    }

    public function customers_viewadd(Request $request)
    {

        $data = new Customers_view;

        $data->name = $request->name;

        $data->description = $request->description;

        $data->save();

        // toastr()->timeout(10000)->closeButton()->success('Category Added Successfully!.');

        return redirect()->back();

    }

    public function customers_viewdelete($id)
    {
        
        $customer = Customers_view::find($id);

        $customer->delete();
        return redirect()->back()->with('success', 'Customer-View deleted successfully!');
    }
    
}
