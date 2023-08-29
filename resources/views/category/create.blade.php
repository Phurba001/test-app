@extends('layouts.app')
@section('content')

<h1> Add category</h1>
<form method="post" action="{{ route('category.store') }}">
@csrf
  <div class="form-group">
    <label for="category name">Category name</label>
    <input type="text" class="form-control" name="name"  placeholder="Enter category name">

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
