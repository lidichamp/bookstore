@include('admin.header')

@include('admin.side_bar')

@section('content')

<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>EDIT BOOK </h2>   
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
                           @foreach($books as $book)
                   
                           
                               <img src="../images/{{$book->cover}}" alt="ALT NAME">
                               
                                 <h3>{{$book->title}}</h3>
 
                                 <p>Author : <b>{{$book->author->name}} {{$book->author->surname}}</b></p>
                                 <p>Price : <b>{{$book->price}}</b></p>
                         
                                 <form action="{{ action('CartController@postAddToCart') }}" name="add_to_cart" method="post" accept-charset="UTF-8">
                                   <input type="hidden" name="book" value="{{$book->id}}" />
                                   {!!  csrf_field() !!}
                          
                                  
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">EDIT BOOK</button><br>  <br>      
  
                               </form>  
                               <form class="form-horizontal" action="{{ route('bdelete') }}" method="POST">
<div class="col-md-4"> {{ csrf_field() }}
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">DELETE</button>
  </div>
</form><br><hr><br>       
                               </div>
                       
                           @endforeach
                         </ul>
                       </div>
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