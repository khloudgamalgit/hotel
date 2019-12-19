@extends('theme.default')



@section('content')

<div class="row">

        @if (Session::has('add'))
        <div id="add" class="success" style="background-color:#FFF;text-align:center;font-size:20px;color:green;padding-top: 10px;">
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('add')}}</p>
        </div>
        @endif

        @if (Session::has('edit'))
        <div id="edit" class="success" style="background-color:#FFF;text-align:center;font-size:20px;color:green;padding-top: 10px;">
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{Session::get('edit')}}</p>
        </div>
        @endif


    <div class="col-lg-12">

        <h1 class="page-header">food_photos</h1>

    </div>

    <!-- /.col-lg-12 -->

</div>

<!-- /.row -->
<h5 class="page-header"><a href="/foodPhotos/create" class="btn btn-primary btn-xs">Add food_photos </a></h5><!-- page-header -->



<table class="table table-striped table-bordered table-hover">

    <thead>

        <tr>
            <th>img</th>
            <th>created_at</th>
            <th>delete</th>
   

        </tr>

    </thead>
    @foreach($food_photos as $U)
    <tbody>
        
        <tr>
        
            

              <td>{{$U->img}}</td>
              <td>{{$U->created_at}}  </td>
      
              td>{{$U>deleted_at}}  </td>
           

       
            <td><a href="/foodPhotos/{{$U->id}}/destroy" class="btn btn-danger btn-xs">delete</a></td>

        </tr>

  

    

    </tbody>
    @endforeach

</table>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript">


$(document).ready(function(){
  setTimeout(function() {
    $('#add').fadeOut('fast');  
}, 5000); // <-- time in millisecond
});

$(document).ready(function(){
  setTimeout(function() {
    $('#edit').fadeOut('fast');  
}, 5000); // <-- time in millisecond
});


</script>



@endsection