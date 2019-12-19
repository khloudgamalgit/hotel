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

        <h1 class="page-header">Tours</h1>

    </div>

    <!-- /.col-lg-12 -->

</div>

<!-- /.row -->
<h5 class="page-header"><a href="/tours/create" class="btn btn-primary btn-xs">Add Tour </a></h5><!-- page-header -->



<table class="table table-striped table-bordered table-hover">

    <thead>

        <tr>
        <th>title</th>
            <th>description</th>
            <th>country name</th>
            <th>city name</th>
            <th>update</th>
            <th>delete</th>
   

        </tr>

    </thead>
    @foreach($tours as $U)
    <tbody>
        
        <tr>
        <td>{{$U->title}}</td>
        <td style="text-align:center;">
               
               <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#m-{{$U->id}}">Show Description</button>

              <!-- Modal -->
              <div id="m-{{$U->id}}" class="modal fade" role="dialog">
                  <div class="modal-dialog">
              
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Show Additional Information	</h4>
                          </div>
                          <div class="modal-body">
                             <div class="deleteContent">
                                     {{$U->description	}}
                                    </div>
                              
                          
                          </div>
                          <div class="modal-footer">
              
                               <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> Close
                                  </button>
                          </div>
                      </div>
              
                  </div>
              </div>
            
            </td>

              <td>{{$U->country_name}}</td>
              <td>{{$U->city_name}}  </td>
      

           

            <td><a href="/countries/edit/{{$U->id}}" class="btn btn-success btn-xs">edit</a></td>
            <td><a href="/countries/{{$U->id}}/destroy" class="btn btn-danger btn-xs">delete</a></td>

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