@extends('layouts.app')
@section('styles')

<style>
{
    width:auto;
    text-align: center;
}
.inner
{
    display: inline-block;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>

                <div class="card-body">
                  @if (Session::has('alert-success'))
                <div class="alert alert-primary" role="alert">
             {{Session::get('alert-success')}}
                     </div>
                     @endif

                     @if (Session::has('error'))
                <div class="alert alert-primary" role="alert">
             {{Session::get('error')}}
                     </div>
                     @endif
                     @if (Session::has('alert-info'))
                <div class="alert alert-primary" role="alert">
             {{Session::get('alert-info')}}
                     </div>
                     @endif
                     @if (Session::has('alert-success'))
                <div class="alert alert-primary" role="alert">
             {{Session::get('error')}}
                     </div>
                     @endif
  <a class= " btn btn-sm btn-info"  href="{{route('product.create')}}"> create Product </a>
                     @if(count($product)>0)
                <table class="table">
  <thead>
    <tr>
      <th >product</th>
      <th >Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($product as $product)
    <tr>
     
      <td>{{$product->name}}</td>
      <td>
      <a class= "inner btn btn-sm btn-info" href="{{ route('product.edit',$product->id)}}">Edit</a>
        <form method="post" action="{{route('product.destroy',$product->id)}}" class="inner">
          @csrf
          @method('DELETE')
          <input type="hidden" name ="id" value ="{{$product->id}}">
          <input type="submit" class ="btn btn-sm btn-danger" value="delete">
        </form>

      </td>
    </tr>
          @endforeach
  
  </tbody>
 
</table>
         @else 
        <h4> no products created yet </h4>
          @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
