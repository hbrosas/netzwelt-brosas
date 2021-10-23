@extends('app')
@section('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<style type="text/css">
	html, body, .container-fluid, #app {
	    width: 100%;
	    height: 100vh;
	    font-family: 'Nunito Sans', sans-serif;
	}
</style>

@endsection

@section('content')
<div id="app">
	<login></login>
</div>
@endsection


@section('scripts')
<!-- <script src="{{ secure_asset('js/login.js') }}"></script> -->
<script src="{{ asset('js/login.js') }}"></script>
@endsection