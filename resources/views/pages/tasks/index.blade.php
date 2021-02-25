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
                <th>Action</th>
            </tr>
        </thead>
		@foreach($tasks as $task)
		<tr>
			<td>{{$task->title}}</td>
			<td>{{$task->user->name}}</td>
			<td>{{$task->assigned->name}}</td>
			<td>
		<form action="/tasks/change/{{$task->id}}" class="form" method="POST">
			@csrf
				@if(Auth::user()->is_manager == 0 && $task->assigned->id == Auth::id())
					<select name="status_id" style="background-color: grey">
						@foreach($statuses as $status)
							<option value="{{$status->id}}"
								@if($status->id == $task->status->id)
									selected=""  style="background-color: green"
								@endif
								>{{$status->name}}</option>
						@endforeach
					</select>
					<input type="submit" hidden>
				@else
					{{$task->status->name}}
				@endif
		</form>
			</td>
			<td>{{$task->description}}</td>
			<td>
			@if(Auth::user()->is_manager == 0 && $task->assigned->id == Auth::id())
				<input type="submit" class="btn btn-warning change" taskId="{{$task->id}}" value="change Stat">
				<a href="/tasks/more/{{$task->id}}" class="btn "> View</a>
			@endif
			</td>

		</tr>
		@endforeach
	</table>

</div>
@endsection
    {{-- <a href="/profile/transfers" style="color: black">My Transfers</a> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@push("js")
<script src="/js/script.js"></script>
