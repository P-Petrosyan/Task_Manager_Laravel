// console.log("barev")
$(document).ready(function(){

	$('.change').click(function(e){
		// console.log(e)
		e.preventDefault();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
			}
		})

		let a = $(this).attr("taskId");
		console.log($(this).closest("tr").find("select").val());
		$.ajax({
			url:"/tasks/change/"+ a,
			method:'POST',
			// status_id: $(this).closest("tr").find("select").val(),
			data: {status_id: $(this).closest("tr").find("select").val()},
			success: function(result){
				console.log(result)
			}
			
		})
		// console.log($(this).attr("taskId"))
		// console.log($("meta[name='csrf-token']").attr('content'))
		// $(this).closest("tr").find('.form').submit();
	})


})