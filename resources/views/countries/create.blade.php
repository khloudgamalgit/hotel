@extends('theme.default')



@section('content')


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add country</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     Add country
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                    <form action="/countries/store" method="POST" enctype="multipart/form-data">
                                        <!-- // Handel the Cross Site Request Forgery -->
                                        @csrf
                                        <fieldset>
                                 <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('shortcode') ? ' has-error' : '' }}">
                                                    <label for="shortcode">shortcode :</label>
                                                    <input type="text" name="shortcode" class="form-control" value="{{old('shortcode')}}">
                                                    @if ($errors->has('shortcode'))
                                                    <label for="shortcode"> :</label>                                                    <span style="color:red;">{{ $errors->first('room_number') }}</span>
                                                    @endif
                                                </div>
                                                </div><!--end col-md-6-->
                                                <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                                            <label for="title">title :</label>
                                                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                                            @if ($errors->has('title'))
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

















