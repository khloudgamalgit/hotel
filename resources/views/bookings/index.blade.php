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

        <h1 class="page-header">Bookings</h1>

    </div>

    <!-- /.col-lg-12 -->

</div>

<!-- /.row -->
<h5 class="page-header"><a href="/bookings/create" class="btn btn-primary btn-xs">Add Bookings  </a></h5><!-- page-header -->



<table class="table table-striped table-bordered table-hover">

    <thead>

        <tr>
            <th>time_from</th>
            <th>time_to</th>
            <th>additional_information</th>
            <th>Activation Status</th>
            <th>customer_name</th>
            <th>room_number</th>
            <th>created_at</th>
            <th>update</th>
            <th>accept</th>
            <th>reject</th>
   

        </tr>

    </thead>
    @foreach($booking as $U)
    <tbody>
        
        <tr>
         <td>{{$U->time_from}}</td>
        <td>{{$U->time_to}}</td>

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
                                       {{$U->additional_information	}}
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

               <td style="text-align:center;">
                @if ($U->is_active == 0)
               
                 <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#m2-{{$U->id}}">Disactive</button>

                <!-- Modal -->
                <div id="m2-{{$U->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Active</h4>
                            </div>
                            <div class="modal-body">
                               <div class="deleteContent">
                                        Do You Want Active <span class="dname"></span> ? <span
                                          class="hidden did"></span>
                                      </div>
                                
                            
                            </div>
                            <div class="modal-footer">
                            <a href="/bookings/{{$U->id}}/activation" class="btn btn-success">Active</a>
                                 <button type="button" class="btn btn-warning" data-dismiss="modal">
                                      <span class='glyphicon glyphicon-remove'></span> Close
                                    </button>
                            </div>
                        </div>
                
                    </div>
                </div>
                @else
                
                
                 <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#m1-{{$U->id}}"> Active</button>

                <!-- Modal -->
                <div id="m1-{{$U->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Disactive</h4>
                            </div>
                            <div class="modal-body">
                               <div class="deleteContent">
                                        Do You Want Disactive <span class="dname"></span> ? <span
                                          class="hidden did"></span>
                                      </div>
                                
                            
                            </div>
                            <div class="modal-footer">
                             <a href="/bookings/{{$U->id}}/activation" class="btn btn-danger">Disactive</a>
                                 <button type="button" class="btn btn-warning" data-dismiss="modal">
                                      <span class='glyphicon glyphicon-remove'></span> Close
                                    </button>
                            </div>
                        </div>
                
                    </div>
                </div>
                @endif
              </td>




@if($U->first_name !== NULL)
  <td>{{$U->first_name}}</td>
  @else
  <td>not exist</td>
  @endif
  @if($U->room_number !== NULL)
  <td>{{$U->room_number}}</td>
  @else
<td>not exist</td>
@endif
<td>{{$U->created_at}}</td>

           

<td><a href="/bookings/edit/{{$U->id}}" class="btn btn-success btn-xs">edit</a></td>
           

    <td style="text-align:center;">
               
               
    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#m3-{{$U->id}}">accept</button>

                <!-- Modal -->
                <div id="m3-{{$U->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Accept Booking</h4>
                            </div>
                            <div class="modal-body">
                               <div class="deleteContent">
                                        Do You Want Accepte  <span class="dname"></span> ? <span
                                          class="hidden did"></span>
                                      </div>
                                
                            
                            </div>
                            <div class="modal-footer">
                            <a href="/bookings/{{$U->id}}/accept" class="btn btn-info">accept</a>
                                 <button type="button" class="btn btn-warning" data-dismiss="modal">
                                      <span class='glyphicon glyphicon-remove'></span> Close
                                    </button>
                            </div>
                        </div>
                
                    </div>
                </div>
             
              </td>
            <td><a href="/bookings/{{$U->id}}/destroy" class="btn btn-danger btn-xs">reject</a></td>

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