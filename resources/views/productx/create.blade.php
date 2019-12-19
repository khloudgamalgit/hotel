@extends('frontend.layouts.app')



@section('content')


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add product</h1>
            </div>
            <!-- /.col-lg-12 -->
           </div>
        <!-- /.row -->
              <div class="row">
              <div class="col-lg-12">
                <form action="/product/store" method="POST" enctype="multipart/form-data">
                    <!-- // Handel the Cross Site Request Forgery -->
                    @csrf
                    <fieldset>     
                     <div class="col-md-6">
                     <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                     <label for="title" class=" control-label"> product title:</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}"
                    </div>
                    </div>

                 <div class="panel panel-default">
                    <div class="panel-heading">
                     Add product
                    </div>
                    <div class="panel-body">
                    <div class="row">
                    <div class="col-lg-6">
                    <form action="/product/store" method="POST" enctype="multipart/form-data">
                     <!-- // Handel the Cross Site Request Forgery -->
                     @csrf

                    <fieldset>     
                     <div class="col-md-6">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class=" control-label"> product title:</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}"
                    </div>
                    </div>
            
                  <div class="col-md-6">
                  <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                   <label for="price" class=" control-label"> product price :</label>
                <input type="number" name="price" class="form-control" value="{{old('price')}}"

                 @if ($errors->has('price'))
                 <span style="color:red;">{{ $errors->first('price') }}</span>
                 @endif                
                   
                </div>
                  </div>
                                        
        
                   <div class="row">
                     <div class="col-md-6">
                     <div class="form-group {{ $errors->has('descretion') ? ' has-error' : '' }}">
                     <label for="descretion">	descretion :</label>
                    <textarea class="form-control" name="descretion" rows="10"></textarea>
                    @if ($errors->has('descretion'))
                      <span style="color:red;">{{ $errors->first('descretion') }}</span>
                     @endif
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
 
        @endsection
