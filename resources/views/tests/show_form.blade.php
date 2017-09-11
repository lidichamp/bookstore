@extends('main_layout')

@section('content')


    <form action="" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="text" name="name" >

        <input type="text" name="product_name" id="">
  
        <input type="text" name="size" id="">

        <input type="submit">
    </form>



@stop