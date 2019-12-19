
@extends('theme.default')



@section('content')

<div class="row">

        @if (Session::has('add'))
        <div id="add" class="success" style="background-color:#FFF;text-align:center;font-size:20px;color:green;padding-top: 10px;">
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('add')}}</p>
        </div>
        @endif

         @if (Session::has('accept'))
        <div id="accept" class="success" style="background-color:#FFF;text-align:center;font-size:20px;color:green;padding-top: 10px;">
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('accept')}}</p>
        </div>
        @endif

        @if (Session::has('edit'))
        <div id="edit" class="success" style="background-color:#FFF;text-align:center;font-size:20px;color:green;padding-top: 10px;">
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{Session::get('edit')}}</p>
        </div>
        @endif


    <div class="col-lg-12">

        <h1 class="page-header">product</h1>

    </div>

    <!-- /.col-lg-12 -->

   </div>

<!-- /.row -->
    <h5 class="page-header"><a href="/product/create" class="btn btn-primary btn-xs">Add product </a></h5><!-- page-header -->



    <table class="table table-striped table-bordered table-hover">

    <thead>
        <tr>
        <tr>
            <th>title</th>
             <th> price </th> 
             <th> descreption </th>          

        </tr>
    </thead>
    @foreach($product as $p)
    <tbody>
        
        <tr>
         <td>{{$p->title}}</td>
        <td>{{$p->price}}</td>

       <!-- Modal -->
        <div id="m-{{$p->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
                
            <!-- Modal content-->
         <div class="modal-content">
        <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Show Descreption</h4>
        </div>
         <div class="modal-body">
        <div class="deleteContent">
         {{$p->descreption}}
        </div>              
         </div>
        <div class="modal-footer">
                
     <button type="button" class="btn btn-warning" data-dismiss="modal">
     <span class='glyphicon glyphicon-remove'></span> Close
      </button>
           </div>
            </div>
         </div>
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
$(document).ready(function(){
  setTimeout(function() {
    $('#accept').fadeOut('fast');  
}, 5000); // <-- time in millisecond
});


</script>

@endsection