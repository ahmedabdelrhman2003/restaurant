@extends('page.layout')
@section('title','Payment')
@section('content')
<div class="contaner-fluid">
    <iframe
        src="https://accept.paymobsolutions.com/api/acceptance/iframes/{{$iframe_id}}?payment_token={{$payment_token}}"
        frameborder="
                200" height="100%" width="100%" style="height: 55vh">payment integration
    </iframe>
</div>
@endsection