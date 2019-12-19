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

        <h1 class="page-header">Users</h1>

    </div>

    <!-- /.col-lg-12 -->

</div>

<!-- /.row -->
<h5 class="page-header"><a href="/users/create" class="btn btn-primary btn-xs">Add Users  </a></h5><!-- page-header -->



<table class="table table-striped table-bordered table-hover">

    <thead>

        <tr>
            <th>name</th>
            <th>email</th>
            <th>activation status</th>
            <th>created_at</th>
            <th>role</th>
            <th>update</th>
            <th>delete</th>
   

        </tr>

    </thead>
    @foreach($users as $U)
    <tbody>
        
        <tr>
                <td>{{$U->name}}</td>
            <td>{{$U->email}}</td>

           <td style="text-align:center;">
                @if ($U->is_active == 0)
               
                 <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#m-{{$U->id}}">disActive</button>

                <!-- Modal -->
                <div id="m-{{$U->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">active</h4>
                            </div>
                            <div class="modal-body">
                               <div class="deleteContent">
                                        Do you want active<span class="dname"></span> ? <span
                                          class="hidden did"></span>
                                      </div>
                                
                            
                            </div>
                            <div class="modal-footer">
                            <a href="/users/{{$U->id}}/activation" class="btn btn-success">active</a>
                                 <button type="button" class="btn btn-warning" data-dismiss="modal">
                                      <span class='glyphicon glyphicon-remove'></span> active
                                    </button>
                            </div>
                        </div>
                
                    </div>
                </div>
                @else
                
                
                   <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#m1-{{$U->id}}"> active</button>

                <!-- Modal -->
                <div id="m1-{{$U->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">disActive</h4>
                            </div>
                            <div class="modal-body">
                               <div class="deleteContent">
                                        Do you want disActive <span class="dname"></span> ?<span
                                          class="hidden did"></span>
                                      </div>
                                
                            
                            </div>
                            <div class="modal-footer">
                             <a href="/users/{{$U->id}}/activation" class="btn btn-danger>disActive</a>
                                 <button type="button" class="btn btn-warning" data-dismiss="modal">
                                      <span class='glyphicon glyphicon-remove'></span> close
                                    </button>
                            </div>
                        </div>
                
                    </div>
                </div>
                @endif
              </td>






            <td>{{$U->created_at}}</td>

            <td>{{$U->role_name}}</td>

            <td><a href="/users/edit/{{$U->id}}" class="btn btn-success btn-xs">edit</a></td>
            <td><a href="/users/{{$U->id}}/destroy" class="btn btn-danger btn-xs">delete</a></td>

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