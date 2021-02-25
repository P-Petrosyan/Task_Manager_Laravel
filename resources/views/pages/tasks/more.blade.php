{{-- @dd($task) --}}
@extends("layouts.main")

@section("title","Profile")

@section("content")

<div >



	<table style="border:1px solid green">
		<tr>
			<th>Title</th>
			<th>Created By</th>
			<th>Assigned To</th>
			<th>Status</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>{{$task->title}}</td>
			<td>{{$task->user->name}}</td>
			<td>{{$task->assigned->name}}</td>
			<td>{{$task->status->name}}</td>
			<td>{{$task->description}}</td>
		</tr>
	</table>
	<a href="/tasks">tasks</a>

</div>
@endsection
