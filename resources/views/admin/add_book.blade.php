@include('admin.header')

@include('admin.side_bar')
@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>ADD BOOK </h2>   
                     <form class="form-horizontal" action="{{ route('add-new-books') }}" method="POST">
<fieldset>

<!-- Form Name -->


<!-- Text input-->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="book_title">BOOK TITLE</label>  
  <div class="col-md-4">
  <input id="book_title" name="book_title" placeholder="book title" class="form-control input-md" required="" type="text">
    
  </div>
</div>
{{ csrf_field() }}
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="book_isbn">BOOK ISBN</label>  
  <div class="col-md-4">
  <input id="book_isbn" name="book_isbn" placeholder="ISBN" class="form-control input-md" required="" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="price">PRICE</label>  
  <div class="col-md-4">
  <input id="price" name="price" placeholder="PRICE" class="form-control input-md" required="" type="text">
    
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="author">AUTHOR</label>
  <div class="col-md-4">
  <div class="form-group">
    
    
</div>
 
    <select id="author" name="author" class="form-control">
    @foreach($authors as $authory)
    <option value="{{$authory->id}}">{{$authory->name}} {{$authory->surname}}</option>
    @endforeach
    </select>
  </div>
</div>

<!-- Text input-->



 <!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">BOOK COVER</label>
  <div class="col-md-4">
    <input id="filebutton" name="filebutton" class="input-file" type="file">
  </div>
</div>
<!-- File Button --> 


<!-- Button -->
<div class="form-group">
  
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">ADD BOOK</button>
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