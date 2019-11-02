@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Search AirCraft</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" name="search-form" id="search-form" action="search">
                        @csrf
                         <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="weight">Weight</label>
                              <input type="number" class="form-control" name="weight" id="weight" placeholder="(kg)" value="{{ old('weight') }}">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="length">Length</label>
                              <input type="number" class="form-control" name="length" id="length" placeholder="(cm)" value="{{ old('length') }}">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="width">Width</label>
                              <input type="number" class="form-control" name="width" id="width" placeholder="(cm)" value="{{ old('width') }}">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="height">Height</label>
                              <input type="number" class="form-control" name="height" id="height" placeholder="(cm)" value="{{ old('height') }}">
                            </div>
                          </div>

                        <!-- design -->
                        <!-- <div class="form-group row">
                            <label for="weight" class="col-sm-2 col-form-label">Weight (kg)</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="weight" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="height" class="col-sm-2 col-form-label">Height (cm)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="height" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="width" class="col-sm-2 col-form-label">Width (cm)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="width" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="length" class="col-sm-2 col-form-label">Length (cm)</label>
                            <div class="col-sm-10 input-group mb-3">
                                <input type="text" class="form-control" id="length" placeholder="">
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">@example.com</span>
                            </div>
                        </div> -->

                        <!-- <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Weight</span>
                          </div>
                          <input type="number" step="any" name="weight" id="weight" class="form-control" aria-label="" value="{{ old('weight') }}">
                          <div class="input-group-append">
                            <span class="input-group-text">Kilograms</span>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Length</span>
                          </div>
                          <input type="number" name="length" id="length" class="form-control" aria-label="" value="{{ old('length') }}">
                          <div class="input-group-append">
                            <span class="input-group-text">Centimeters</span>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Width</span>
                          </div>
                          <input type="number" name="width" id="width" class="form-control" aria-label="" value="{{ old('width') }}">
                          <div class="input-group-append">
                            <span class="input-group-text">Centimeters</span>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Height</span>
                          </div>
                          <input type="number" name="height" id="height" class="form-control" aria-label="" value="{{ old('height') }}">
                          <div class="input-group-append">
                            <span class="input-group-text">Centimeters</span>
                          </div>
                        </div> -->
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value="Search">
                        </div>
                    </form>
                </div>
                <div class="card-body">

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">AirCraft</th>
                          <th scope="col">Variant</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (isset($capacities) && count($capacities))
                            @foreach($capacities as $key => $capacity)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$capacity->name}}</td>
                                    <td>{{$capacity->variant}}</td>
                                    <td><input type="button" class="btn" name="lookup-btn" value="Lookup"></td>
                                </tr>
                            @endforeach
                        @else
                            <div>No Records found</div>
                        @endif
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
