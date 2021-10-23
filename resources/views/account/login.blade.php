@extends('app')
@section('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<style type="text/css">
	html, body, .container-fluid {
	    width: 100%;
	    height: 100vh;
	    font-family: 'Nunito Sans', sans-serif;
	}

	.cont {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-content: center;
    }
</style>

@endsection

@section('content')
<div class="row cont">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/account/login">
                    <div class="row">

                    	@if ($errors->any())
                    	<div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
	                            @foreach ($errors->all() as $error)
	                            	{{ $error }}
					            @endforeach
	                        </div>
                        </div>
                        @endif

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="johndoe" name="username" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="*****" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Log In</button>
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@endsection