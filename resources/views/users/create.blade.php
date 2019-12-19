@extends('theme.default')



@section('content')


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add User</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     Add User
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                    <form action="/users/store" method="POST" enctype="multipart/form-data">
                                        <!-- // Handel the Cross Site Request Forgery -->
                                        @csrf
                                        <fieldset>
                                 <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="cshort">name :</label>
                                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                                    @if ($errors->has('name'))
                                                    <span style="color:red;">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                                </div><!--end col-md-6-->
                                                <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                            <label for="email">email :</label>
                                                            <input type="text" name="email" class="form-control" value="{{old('email')}}">
                                                            @if ($errors->has('email'))
                                                            <span style="color:red;">{{ $errors->first('email') }}</span>
                                                            @endif
                                                        </div>
                                                        </div><!--end col-md-6-->
                                        </div>
                                        <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                                            <label for="password">Password :</label>
                                                            <input type="password" name="password" class="form-control" value="{{old('password')}}">
                                                            @if ($errors->has('password'))
                                                            <span style="color:red;">{{ $errors->first('password') }}</span>
                                                            @endif
                                                        </div>
                                                        </div><!--end col-md-6-->
                                                        <div class="form-group{{ $errors->has('user_role') ? ' has-error' : '' }}">
                                        <label for="user_role" class="col-md-3 control-label"> Select Role :</label>

                               <div class="col-md-6">
                                  <select class="form-control" name="user_role">
                               <option disabled selected value> -- Select Role -- </option>
                               @foreach($roles as $R) 
                             <option value="{{$R->id}}">{{$R->title}}</option>
                            @endforeach
                         </select>

                    @if ($errors->has('user_role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_role') }}</strong>
                    </span>
                    @endif
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
 

@endsection


















