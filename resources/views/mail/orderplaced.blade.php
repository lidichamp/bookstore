<body>



<h5> Order ID{{ $orderd->id }}</h5>
<ul>
<li>Books:</li>
<?php  

foreach($orderd->orderItems as $one){
   
    ?>
<ul>{{$one->title}} x {{ $one->pivot->amount}} at ₦{{$one->price}} each<br></ul>

<?php
}
?>
<hr>
<li> Total price:{{ $orderd->total}}</li>
<hr>
</ul>
</body>