@extends("layouts.main")

@section("title","Profile") 

@section("content")

<div class="container" >
	<h1>Create Task</h1>

	<form method="POST">
			@csrf
		<div class="form-group">
			<label for="">Title</label>
			<input name="title" class="form-control">

		</div>
		<div class="form-group">
			<label for="">Created By</label>
			<input name="created_by"class="form-control"  value="{{Auth::user()->name}}">

		</div>
		<div class="form-group">
			<label for="">Assigned to</label>
			<select name="assigned_to">
			@foreach($users as $user)
				<option value="{{$user->id}}">{{$user->name}}</option>
			@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="">Status</label>
			<input name="status" value="created" class="form-control" >

		</div>
		<div class="form-group">
			<label for="">description</label>
			<textarea name="description" class="form-control">
				
			</textarea>

		</div>

		<input type="submit" class="btn btn-success" value="Save">
	</form>
</div>



@endsection

@section("footerContent")
	
	<div class="bg-warning">
		Lorem ipsum dolor sit, amet consectetur adipisicing elit.
	</div>
@endsection