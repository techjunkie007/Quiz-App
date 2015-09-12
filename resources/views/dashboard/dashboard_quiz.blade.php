
@extends('master.master')

@section('title', 'Quiz App | Play')

@section('content')
	
	<div class="jumbotron">
  		<center><h1>Play Quiz</h1></center>
	</div>
	
	{!! Form::open(array('url' => 'result', 'method' => 'post')) !!}
		@foreach($quiz as $question)
			<div class="container">
				<div id="question">
					QUESTION NO {{ $question['question_no'] }} : {{ $question['question_data'] }}
				</div>
				<div id="options">
					@foreach($question['options'] as $option)
						OPTION {{ $option['option_no'] }} : 
						{!! Form::hidden( $question['question_id']."+".$option['option_id'], 'unchecked') !!}
						{!! Form::checkbox( $question['question_id']."+".$option['option_id'], 'checked'); !!}
					{{ $option['option_data'] }}
					<br>
					@endforeach
					<br>
				</div>
			</div>
		@endforeach
		<div class="container">
			{!! Form::submit('Submit Quiz!'); !!}
		</div>
	{!! Form::close() !!}

@endsection