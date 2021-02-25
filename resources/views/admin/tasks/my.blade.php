@extends("layouts.main")

@section("title","Profile")

@section("content")

<div class="container" >

    <table class="table table-dark table-striped">

        <thead>
            <tr>
                <th>Title</th>
                <th>Created By</th>
                <th>Assigned To</th>
                <th>Status</th>
                <th>Description</th>
                <th colspan="2">action</th>
            </tr>
        </thead>
		@foreach($tasks as $task)
		<tr>
			<td>{{$task->title}}</td>
			<td>{{$task->user->name}}</td>
			<td>{{$task->assigned->name}}</td>
			<td>{{$task->status->name}}</td>
			<td>{{$task->description}}</td>
			<td><a class="btn btn-warning" href="/admin/tasks/edit/{{$task->id}}">Edit</a></td>
			<td><a class="btn btn-danger" href="/admin/tasks/delete/{{$task->id}}">Delete</a></td>
		</tr>
		@endforeach
    </table>


</div>
<a class="btn btn-success" href="/admin/tasks">Tasks</a>

@endsection

@section("footerContent")

	<div class="bg-warning">
		Lorem ipsum dolor sit, amet consectetur adipisicing elit.
	</div>
@endsection
