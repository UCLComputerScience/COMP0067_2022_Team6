@extends('layouts.mainlayout-logged-in')
@section('content')
<?php

$id = Auth::user()->id;
$subscriberRole = 3;
DB::Table('users')->where('id',$id)->update(['role' => $subscriberRole ]);

?>
<html>
  <head><title>Thanks for your order!</title></head>
  <body>
    <h1>Your monthly subscription is active!</h1>
    <p>
      We appreciate your time!
      If you have any questions, please email:  info@ancssc.org
      <a href="/home">HOME</a>.
    </p>
  </body>
</html>
