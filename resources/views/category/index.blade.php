@extends('layouts.app')


@section('content')
<h1> Categories</h1> </br>
<a class= "inner btn btn-sm btn-info" href="{{ route('category.create')}}">Add category</a>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($cat as $cat)
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->name}}</td>
      <td>
      <a class= "inner btn btn-sm btn-info" href="{{ route('category.edit',$cat->id)}}">Edit</a>
        <form method="post" action="{{route('category.destroy',$cat->id)}}" class="inner">
          @csrf
          @method('DELETE')
          <input type="hidden" name ="id" value ="{{$cat->id}}">
          <input type="submit" class ="btn btn-sm btn-danger" value="delete">
        </form>

      </td>
     
    </tr>
    @endforeach
    <tr>
  </tbody>
</table>
@endsection