@extends('layouts.app')
@section('content')
<div class="container">
	@if (session()->has('success'))
    <div class="alert alert-danger">
        @if(is_array(session()->get('success')))
        <ul>
            @foreach (session()->get('success') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
        @else
            {{ session()->get('success') }}
        @endif
    </div>
@endif
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Change Password</div> 
				<div class="panel-body">
					<form method="POST" action="{{route('wordpass.change',$users->id)}}" class="form-horizontal">
						<input type="hidden" name="_token" value="{{csrf_token()}}"> 
						<div class="form-group"><label for="password" class="col-md-4 control-label">Old Password</label>
							 <div class="col-md-6"><input id="password" type="password" name="password1" required="required" class="form-control">
							</div></div>
							<div class="form-group"><label for="password" class="col-md-4 control-label">New Password</label>
							 <div class="col-md-6"><input id="password" type="password" name="password2" required="required" class="form-control">
							</div></div> <div class="form-group">
								<label for="password" class="col-md-4 control-label">Confirm Password</label>
							 <div class="col-md-6"><input id="password" type="password" name="password3" required="required" class="form-control">
							 </div></div> 
                                     <div class="form-group"><div class="col-md-8 col-md-offset-4">
                                     	<button type="submit" class="btn btn-primary">
                                    Change Password
                                </button> 
                                </div></div></form></div></div></div></div></div>


@endsection