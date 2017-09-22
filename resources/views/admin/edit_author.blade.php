@include('admin.header')

@include('admin.side_bar')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>EDIT AUTHOR </h2>   
                     
<div class="container">
  <div class="span12">
    <div class="row">
      <ul class="thumbnails">

      @if (Session::has('error'))
        <div class="alert alert-danger alert-auth small">
          <button class="close" data-dismiss-"alert" type="button">X
          </button>
            {{session('error')}}
        </div>
      @endif
@if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
@endif
@foreach($authors as $author)

        
          
            
            <div class="caption">
            <form class="form-horizontal" action="{{ route('editauthors') }}" method="POST">
            <h3><b>{{$author->name}} {{$author->surname}}</b>    <br><br><button id="singlebutton" name="singlebutton" class="btn btn-primary">EDIT AUTHOR</button></h3>
            {{ csrf_field() }}
</form>
<form class="form-horizontal" action="{{ route('adelete') }}" method="POST">
<div class="col-md-4"> {{ csrf_field() }}
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">DELETE</button>
  </div>
</form>
            
          </div>
          <br><br><hr>
  
        @endforeach
      </ul>
    </div>
  </div>
</div>
</div>     
                 <!-- /. ROW  -->
                  <hr />  
                 <!-- /. ROW  -->           
    </div> 
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div> 
@include('admin.footer')