@include('admin.header')

@include('admin.side_bar')
@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>ADD AUTHOR </h2> 
                      
                     <form class="form-horizontal" action="{{ route('add-new-authors') }}" method="POST">
<fieldset>

<!-- Form Name -->


<!-- Text input-->



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="first_name">FIRST NAME</label>  
  <div class="col-md-4">
  <input id="first_name" name="first_name" placeholder="FIRST NAME" class="form-control input-md" required="" type="text">
  {{ csrf_field() }}
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="surname">SURNAME</label>  
  <div class="col-md-4">
  <input id="sur_name" name="sur_name" placeholder="SURNAME" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- File Button --> 

{{ csrf_field() }}
<!-- Button -->
<div class="form-group">
  
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">ADD AUTHOR</button>
  </div>
  </div>

</fieldset>
</form>  
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