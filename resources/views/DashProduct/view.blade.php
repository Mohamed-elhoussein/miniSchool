@extends('style.index')

@section('body')
<a href="{{route('product.create')}}" class="btn btn-primary">Add Product</a>
<div class="card">
<div class="card-body">
<h4 class="card-title">Inverse table</h4>
<p class="card-description"> Add class <code>.table-dark</code>
</p>
<table class="table table-dark">
<thead>
<tr>
<th> # </th>
<th>  Name </th>
<th> Price</th>
<th>Sale </th>
<th>Count </th>
<th>Category </th>
<th>img </th>
<th>Edit/Delete</th>
</tr>
</thead>
<tbody> 
@foreach($products as $key=>$val)

<tr>
<td>{{++$key}}</td>
<td>{{$val->name}}</td>
<td>{{$val->price}}</td>
<td>{{$val->sale}}</td>
<td>{{$val->count}}</td>
<td>{{$val->category}}</td>
<td>
@foreach($val->images as $file)
<img src="{{ asset('storage/images/'.$file->img) }}" alt="">
@endforeach
</td>
<td>
<a href="{{route('product.show', $val->id)}}" class="btn btn-primary">Edit</a>

<form action="{{route('product.destroy',$val->id)}}" method="post">
@csrf
@method("DELETE")
<input type="submit" value="Delete" class="btn btn-danger">
</form>
</td>
</tr> 
@endforeach

</tbody>
</table>
</div>
</div>
@endsection