@extends('theme.default')



@section('content')


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add drinks</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     Add drinks
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                    <form action="/drinks/store" method="POST" enctype="multipart/form-data">
                                        <!-- // Handel the Cross Site Request Forgery -->
                                        @csrf

                                        <fieldset>
                            
                                                <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                            <label for="name">	drinks :</label>
                                                            <textarea class="form-control" name="name" rows="10"></textarea>
                                                            @if ($errors->has('name'))
                                                            <span style="color:red;">{{ $errors->first('name') }}</span>
                                                            @endif
                                                        </div>
                                                        </div><!--end col-md-6--> 
                                        
                                   
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


















