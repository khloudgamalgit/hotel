@extends('theme.default')



@section('content')


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Room</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     Edit Room
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                    <form action="/rooms/update/{{$rooms->id}}" method="POST" enctype="multipart/form-data">
                                        <!-- // Handel the Cross Site Request Forgery -->
                                        @csrf
                                        <fieldset>
                                 <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('room_number') ? ' has-error' : '' }}">
                                                    <label for="room_number">room_number :</label>
                                                    <input type="number" name="room_number" class="form-control" value="{{$rooms->room_number}}">
                                                    @if ($errors->has('room_number'))
                                                    <span style="color:red;">{{ $errors->first('room_number') }}</span>
                                                    @endif
                                                </div>
                                                </div><!--end col-md-6-->
                                                <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('floor') ? ' has-error' : '' }}">
                                                            <label for="floor">floor :</label>
                                                            <input type="number" name="floor" class="form-control" value="{{$rooms->floor}}">
                                                            @if ($errors->has('floor'))
                                                            <span style="color:red;">{{ $errors->first('floor') }}</span>
                                                            @endif
                                                        </div>
                                                        </div><!--end col-md-6-->
                                        </div>
                                        <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                            <label for="description">	description :</label>
                                                            <textarea class="form-control" name="description" rows="10">{{$rooms->description}}</textarea>
                                                            @if ($errors->has('description'))
                                                            <span style="color:red;">{{ $errors->first('description') }}</span>
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


















