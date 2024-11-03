@extends('style.index')

@section('body')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" method="post" action="{{route("user.update",$data->id)}}">
                        @csrf
                        @method('PUT')
                      <div class="form-group">

                        <label for="exampleInputName1">Name</label>
                        @error('name') <p style="color:red">{{$message}}</p> @enderror
                        <input type="text" value="{{$data->name}}" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        @error('email') <p style="color:red">{{$message}}</p> @enderror
                        <input type="email" value="{{$data->email}}" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        @error('gender') <p style="color:red">{{$message}}</p> @enderror
                        <select name="gender" class="form-control" id="exampleSelectGender">
                          <option value="1" @selected($data->gender==1)>Male</option>
                          <option value="0" @selected($data->gender==0)>Female</option>
                        </select>
                      </div>
                      @foreach(config('permission.per') as $key=>$val)
                      
                      <div class="form-check">
                              <label class="form-check-label">
                              @error('permission') <p style="color:red">{{$message}}</p> @enderror
                                <input type="checkbox"
                                @foreach($data->permission as $per_user)
                                @checked($key==$per_user)
                                @endforeach

                                 name="permission[]" 
                                 value="{{$key}}" 
                                 class="form-check-input">
                                 {{$val}} 
                                 <i class="input-helper"></i></label>
                            </div>
                     
                      @endforeach
                      
                      <button type="submit" class="btn btn-gradient-primary me-2">Edit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection