@extends('style.index')

@section('body')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" method="post" action="{{route("user.store")}}">
                        @csrf
                      <div class="form-group">

                        <label for="exampleInputName1">Name</label>
                        @error('name') <p style="color:red">{{$message}}</p> @enderror
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        @error('email') <p style="color:red">{{$message}}</p> @enderror
                        <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        @error('password') <p style="color:red">{{$message}}</p> @enderror
                        <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        @error('gender') <p style="color:red">{{$message}}</p> @enderror
                        <select name="gender" class="form-control" id="exampleSelectGender">
                          <option value="1">Male</option>
                          <option value="0">Female</option>
                        </select>
                      </div>
                      @foreach(config('permission.per') as $key=>$val)
                      <div class="form-check">
                              <label class="form-check-label">
                              @error('permission') <p style="color:red">{{$message}}</p> @enderror
                                <input type="checkbox" name="permission[]" value="{{$key}}" class="form-check-input">{{$val}} <i class="input-helper"></i></label>
                            </div>
                     
                      @endforeach
                      
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection