@extends('style.index')

@section('body')
<a href="{{route('user.create')}}" class="btn btn-primary">Add User</a>
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
                          <th> Email </th>
                          <th>Gender </th>
                          <th>Edit/Delete</th>
                        </tr>
                      </thead>
                      <tbody> 
                   
                        @foreach($admins as $key=>$val)
                        <tr>
                          <td>{{++$key}}</td>
                          <td> {{++$val->name}}</td>
                          <td>{{++$val->email}}</td>
                          <td> {{++$val->gender==1?"male":"female"}}</td>
                          <td>
                            <a href="{{route('user.edit',$val->id)}}" class="btn btn-primary">Edit</a>
                            
                            <form action="{{route("user.destroy",$val->id)}}" method="post">
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