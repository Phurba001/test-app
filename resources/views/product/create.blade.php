@extends('layouts.app')


@section('content')

<form method="post" action="{{ route('product.store') }}">
@csrf
<div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-md bg-white p-8 rounded shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Add Product</h2>
            <form>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="mt-1 p-2 border rounded w-full focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">price</label>
                    <input type="text" id="email" name="price" class="mt-1 p-2 border rounded w-full focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700">description</label>
                    <textarea id="message" name="description" rows="4" class="mt-1 p-2 border rounded w-full focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>
                <div class="mb-4">
              
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category" class="mt-1 p-2 border rounded w-full focus:outline-none focus:ring focus:border-blue-300">
                    @if(count($product)>0)
                    @foreach($product as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                        @else 
        <h4> no categories created yet </h4>
          @endif
                    </select>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 w-full">Submit</button>
            </form>
        </div>
    </div>
</form>

@endsection