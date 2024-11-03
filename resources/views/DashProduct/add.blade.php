@extends('style.index')

@section('body')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" method="post" action="{{route("product.store")}}" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">

                        <label for="exampleInputName1">Name</label>
                        @error('name') <p style="color:red">{{$message}}</p> @enderror
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Price</label>
                        @error('price') <p style="color:red">{{$message}}</p> @enderror
                        <input type="text" name="price" class="form-control" id="exampleInputEmail3" placeholder="price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">sale</label>
                        @error('sale') <p style="color:red">{{$message}}</p> @enderror
                        <input type="text" name="sale" class="form-control" id="exampleInputPassword4" placeholder="sale">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">count</label>
                        @error('count') <p style="color:red">{{$message}}</p> @enderror
                        <input type="text" name="count" class="form-control" id="exampleInputPassword4" placeholder="count">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        @error('category') <p style="color:red">{{$message}}</p> @enderror
                        <select name="category" class="form-control" id="exampleSelectGender">
                         @foreach (config("cat.category") as $val)
                          <option value="{{ $val }}">{{ $val }}</option>

                          @endforeach

                        </select>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        @error('img') <p style="color:red">{{$message}}</p> @enderror
                        @error('img.*') <p style="color:red">{{$message}}</p> @enderror
                        <input type="file" multiple  name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection