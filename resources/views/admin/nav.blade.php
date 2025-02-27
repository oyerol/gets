<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>


<div class="navbar bg-base-300">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </div>
      <ul
        tabindex="0"
        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
        <li>
          <a href="{{ url('admin/dashboard') }}">Home</a>
        </li>
        <li>
          <a href="{{ url('view_category') }}">Category</a>
        </li>
        <li>
          <a>Products</a>
          <ul class="p-2">
            <li><a href="{{url('add_product')}}">Add Product</a></li>
            <li><a href="{{url('view_product')}}">View Product</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ url('view_orders') }}">Orders</a>
        </li>
      <li>
        <a href="{{ url('showcontact') }}">Contacts</a>
      </li>
      </ul>
    </div>
    <a class="btn btn-ghost text-xl">
      <img width="70px" src="{{ asset('images/logo1.png') }}" alt="">
    </a>
  </div>
  <div class="navbar-center hidden lg:flex text-xl font-semibold">
    <ul class="menu menu-horizontal px-4 space-x-6">
      <li><a href="{{ url('admin/dashboard') }}" class="hover:underline">Home</a></li>
      <li><a href="{{ url('view_category') }}" class="hover:underline">Category</a></li>
      <li>
        <details>
          <summary class="cursor-pointer hover:underline">Products</summary>
          <ul class="p-2 bg-white text-black shadow-md rounded-lg border border-gray-300">
            <li><a href="{{url('add_product')}}" class="hover:text-indigo-500 px-3 py-2 block">Add Product</a></li>
            <li><a href="{{url('view_product')}}" class="hover:text-indigo-500 px-3 py-2 block">View Product</a></li>
          </ul>
        </details>
      </li>
      <li><a href="{{ url('view_orders') }}" class="hover:underline">Orders</a></li>
      <li><a href="{{ url('customers_view') }}" class="hover:underline">Cusotmers-view</a></li>
      <li><a href="{{ url('showcontact') }}" class="hover:underline">Contacts</a></li>
    </ul>
  </div>


  <div class="navbar-end">
    <div class="dropdown dropdown-end">
      <!-- Use an image as the dropdown trigger -->
      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full border-2 border-gray-300 hover:border-indigo-500 transition duration-300">
              <img src="{{asset('images/dp.jpg')}}" alt="Profile Picture" class="rounded-full">
          </div>
      </label>
      <ul tabindex="0" class="menu menu-sm dropdown-content bg-white text-gray-800 rounded-lg mt-3 w-56 p-3 shadow-lg border border-gray-200">
          <li><a class="block px-3 py-2 hover:bg-gray-100 rounded-md">Profile</a></li>
          <li><a class="block px-3 py-2 hover:bg-gray-100 rounded-md">Settings</a></li>
          <li class="border-t border-gray-300 mt-2 pt-2">
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="btn bg-red-600 text-white w-full py-2 rounded-md hover:bg-red-700 transition duration-300">Logout</button>
              </form>
          </li>
      </ul>
  </div>



</div>



  </div>
</div>