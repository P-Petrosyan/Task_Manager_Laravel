@extends("layouts.main")

@section("title","Profile")

@section("content")

<div class="container" >
	<h1>Edit Task</h1>

	<form method="POST">
			@csrf
		<div class="form-group">
			<label for="">Title</label>
			<input name="title" value="{{$task->title}}" class="form-control">

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
            <select name="status_id" style="background-color: grey">
                @foreach($statuses as $status)
                    <option value="{{$status->id}}"
                            @if($status->id == $task->status->id)
                            selected=""  style="background-color: green"
                        @endif
                    >{{$status->name}}</option>
                @endforeach
            </select>
{{--			<input name="status" value="{{$task->status->name}}" class="form-control" >--}}

		</div>
		<div class="form-group">
			<label for="">description</label>
			<textarea name="description" class="form-control">{{$task->description}}</textarea>

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
