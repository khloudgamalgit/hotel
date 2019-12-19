@extends('theme.default')



@section('content')


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Introduction</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     Add Introduction
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                    <form action="/introduction/store" method="POST" enctype="multipart/form-data">
                                        <!-- // Handel the Cross Site Request Forgery -->
                                        @csrf
                                        <fieldset>
                                 

                                
                                        <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                            <label for="description">	description :</label>
                                                            <textarea class="form-control" name="description" rows="10">{{old('description')}}</textarea>
                                                            @if ($errors->has('description'))
                                                            <span style="color:red;">{{ $errors->first('description') }}</span>
                                                            @endif
                                                        </div>
                                                        </div><!--end col-md-6-->

                                                        <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('video_url') ? ' has-error' : '' }}">
                                                            <label for="video_url">	video :</label>
                                                            <input type="file" class="form-control" name="video_url">
                                                            @if ($errors->has('video_url'))
                                                            <span style="color:red;">{{ $errors->first('video_url') }}</span>
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


















