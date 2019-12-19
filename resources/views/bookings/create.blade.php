@extends('theme.default')



@section('content')


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Booking</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     Add Booking
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                    <form action="/bookings/store" method="POST" enctype="multipart/form-data">
                                        <!-- // Handel the Cross Site Request Forgery -->
                                        @csrf
                                        <fieldset>
                                 <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('time_from') ? ' has-error' : '' }}">
                                                    <label for="time_from">time_from :</label>
                                                    <input type="date" name="time_from" class="form-control" value="{{old('time_from')}}">
                                                    @if ($errors->has('time_from'))
                                                    <span style="color:red;">{{ $errors->first('time_from') }}</span>
                                                    @endif
                                                </div>
                                                </div><!--end col-md-6-->
                                                <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('time_to') ? ' has-error' : '' }}">
                                                            <label for="time_to">time_to :</label>
                                                            <input type="date" name="time_to" class="form-control" value="{{old('time_to')}}">
                                                            @if ($errors->has('time_to'))
                                                            <span style="color:red;">{{ $errors->first('time_to') }}</span>
                                                            @endif
                                                        </div>
                                                        </div><!--end col-md-6-->
                                        </div>

                                        <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('customer_name') ? ' has-error' : '' }}">
                                        <label for="customer_name" class=" control-label"> Select Customer :</label>
                                        <select class="form-control" name="customer_name">
                                     <option disabled selected value> -- Select Customer -- </option>

                        @foreach($customers as $R) 
                        <option value="{{$R->id}}">{{$R->first_name}}</option>
                        @endforeach

                    </select>

                    @if ($errors->has('customer_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('customer_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group{{ $errors->has('room_number') ? ' has-error' : '' }}">
                <label for="room_number" class=" control-label"> Select room_number :</label>

                
                    <select class="form-control" name="room_number">
                    <option disabled selected value> -- Select room_number -- </option>

                        @foreach($rooms as $R) 
                        <option value="{{$R->id}}">{{$R->room_number}}</option>
                        @endforeach

                    </select>

                    @if ($errors->has('customer_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('customer_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
                                        
                                        
                                        </div>
                                        <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('additional_information') ? ' has-error' : '' }}">
                                                            <label for="additional_information">	additional_information :</label>
                                                            <textarea class="form-control" name="additional_information" rows="10"></textarea>
                                                            @if ($errors->has('additional_information'))
                                                            <span style="color:red;">{{ $errors->first('additional_information') }}</span>
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


















