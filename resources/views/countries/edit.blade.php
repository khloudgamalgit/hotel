@extends('theme.default')



@section('content')


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit country</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
        @if (Session::has('err'))
        <div id="err" class="success" style="background-color:#FFF;text-align:center;font-size:20px;color:green;padding-top: 10px;">
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('err')}}</p>
        </div>
        @endif
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     Edit country
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                    <form action="/countries/update/{{$countries->id}}" method="POST" enctype="multipart/form-data">
                                        <!-- // Handel the Cross Site Request Forgery -->
                                        @csrf
                                        <fieldset>
                                 <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('shortcode') ? ' has-error' : '' }}">
                                                    <label for="shortcode">	shortcode:</label>
                                                    <input type="text" name="shortcode" class="form-control" value="{{$countries->shortcode}}">
                                                    @if ($errors->has('shortcode'))
                                                    <span style="color:red;">{{ $errors->first('shortcode') }}</span>
                                                    @endif
                                                </div>
                                                </div><!--end col-md-6-->
                                                <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                                            <label for="title">title :</label>
                                                            <input type="text" name="title" class="form-control" value="{{$countries->title}}">
                                                            @if ($errors->has('	title'))
                                                            <span style="color:red;">{{ $errors->first('title') }}</span>
                                                            @endif
                                                        </div>
                                                        </div><!--end col-md-6-->
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
 

@endsection


















