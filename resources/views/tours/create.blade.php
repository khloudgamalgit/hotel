@extends('theme.default')



@section('content')


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Tour</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     Add Tour
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                    <form action="/tours/store" method="POST" enctype="multipart/form-data">
                                        <!-- // Handel the Cross Site Request Forgery -->
                                        @csrf
                                        <fieldset>
                                 

                                
                                        <div class="row">

                                          <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                                            <label for="title">	title :</label>
                                                            <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                                            @if ($errors->has('title'))
                                                            <span style="color:red;">{{ $errors->first('title') }}</span>
                                                            @endif
                                                        </div>
                                                        </div><!--end col-md-6-->
                                                        <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                            <label for="description">	description :</label>
                                                            <textarea class="form-control" name="description" rows="10">{{old('description')}}</textarea>
                                                            @if ($errors->has('description'))
                                                            <span style="color:red;">{{ $errors->first('description') }}</span>
                                                            @endif
                                                        </div>
                                                        </div><!--end col-md-6-->
                                                        </div>
                                   
                         <div class="row">
                         
                                                      <div class="form-group{{ $errors->has('user_role') ? ' has-error' : '' }}">
                <label for="country_name" class="col-md-3 control-label"> Select Country :</label>
                <div class="col-md-6">
              
                    <select class="form-control" name="country_name">
                    <option disabled selected value> -- Select Country -- </option>

                        @foreach($country as $R) 
                        <option value="{{$R->id}}">{{$R->title}}</option>
                        @endforeach

                    </select>

                    @if ($errors->has('country_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
          </div>
          <div class="row">
            <div id="city">
              <div class="form-group{{ $errors->has('city_name') ? ' has-error' : '' }}">
                <label for="city_name" class="col-md-3 control-label"> Select city :</label>

                <div class="col-md-6">
                    <select class="form-control" name="city_name">
                    <option disabled selected value> -- Select city -- </option>

                        @foreach($city as $R) 
                        <option value="{{$R->id}}">{{$R->name}}</option>
                        @endforeach

                    </select>

                    @if ($errors->has('city_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            </div>
            </div>
          
                                                </fieldset>
                                                <button type="submit" class="btn btn-sm btn-primary m-r-5"> Save </button>
                                            </form>
                               
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
   
$(document).ready(function(){
 
        $("#city").hide();
  
           });


      </script>
 

@endsection


















