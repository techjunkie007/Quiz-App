
@extends('master.master')

@section('title', 'Quiz App | Login')

@section('content')

	<div class="jumbotron">
  		<center><h1>Quiz App Beta</h1></center>
	</div>

	<center>
		<div class="container, input-group">
			<!-- Login Form Open -->
			{!! Form::open(array('url'=>'dashboard', 'method'=>'POST') ) !!}

			<!-- Username Field -->
			{!! Form::label('Username')!!}
			{!! Form::text('username')!!}
			<br>

			<!-- Password Field -->
			{!! Form::label('Password')!!}
			{!! Form::password('password')!!}
			<br><br>

			<!-- Login Button -->
			<center>
				{!! Form::submit('Login', array('class'=>'btn btn-primary'))!!}
			</center>	

			<!-- Login Form Close -->
			{!! Form::close() !!}
		</div>
	</center>

@endsection