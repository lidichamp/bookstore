@extends('main_layout')

@section('content')

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

        <li class="span4">
          <div class="thumbnail">
            
            <div class="caption">
              
            <h3>Author : <b>{{$author->name}} {{$author->surname}}</b></h3>
            
            <p><h5>Books:</h5>
            @foreach($author->books as $book)
            
            {{$book->title}}</p>
            @endforeach
            
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
</div>     
             
@stop