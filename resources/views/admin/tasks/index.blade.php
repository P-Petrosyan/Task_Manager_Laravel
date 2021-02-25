@extends("layouts.main")
@section("content")

<div>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Created By</th>
                <th>Assigned To</th>
                <th>Status</th>
                <th>Description</th>
            </tr>
        </thead>
		@foreach($tasks as $task)
		<tr>
			<td>{{$task->title}}</td>
			<td>{{$task->user->name}}</td>
			<td>{{$task->assigned->name}}</td>
			<td>{{$task->status->name}}</td>
			<td>{{$task->description}}</td>

		</tr>
		@endforeach


	</table>
	<a class="btn btn-success" href="/admin/tasks/create">Create</a>
	<a class="btn btn-success" href="/admin/tasks/my">My Tasks</a>

</div>



@endsection
