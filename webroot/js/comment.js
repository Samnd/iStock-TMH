	
	function addComment(){
		var user_id = $('#input_user_id').val();
		var photo_id = $('#input_photo_id').val();
		var video_id = $('#input_video_id').val();
		var comment = $('#input_comment').val();
		if (user_id != '') {
			if ($('#input_photo_id').length) {
				$.ajax({
		            url: '/comments/add/',
		            type: "POST",
		            data:{
		            	'user_id' : user_id,
		            	'photo_id' : photo_id,
		            	'comment' : comment,
		            },
		            dataType : 'json',
		           
		            success: function(data) {
		            	
		            	$('#showcomment').html(data);
		            	$('#input_comment').val('');

		            },
		            error: function(xhr){
		            	alert("Anb errors occured: " + xhr.status + " " + xhr.statusText + " " + xhr.readyState);
		        	},
	      
	        	});
			} else {
				$.ajax({
		            url: '/comments/add/',
		            type: "POST",
		            data:{
		            	'user_id' : user_id,
		            	'video_id' : video_id,
		            	'comment' : comment,
		            },
		            dataType : 'json',
		           
		            success: function(data) {
		            	$('#showcomment').html(data);
		            	$('#input_comment').val('');

		            },
		            error: function(xhr){
		            	alert("Ann error occured: " + xhr.status + " " + xhr.statusText + " " + xhr.readyState);
		        	},
	      
	        	});
			}
			
		} else {
			alert("You must login first!!");
		}
		
	}



	function deleteComment(id){
		if ($('#logging_in').text() == $('#owner_of_'+id).text()) {
			if(confirm("Are you sure?")){
				$.ajax({
		            url: '/comments/delete/' + id,
		            type: "POST",
		            dataType : 'json',
		           
		            success: function(data){
		            	if(data.result=='true'){
		            				alert("Comment has been deleted");
		            				$("#comment_" + id).remove();
				            		
		            	} else {
		            		alert("Cannot delete this comment");
		            	}

		            },
		            error: function(xhr){
		            	alert("An error occured: " + xhr.status + " " + xhr.statusText + " " + xhr.readyState);
		        	},
		        });
			}
		} else {
			alert("You don\'t have permission to do that!!!");
		}
		
		
	}

	function editShow(id){
		if ($('#logging_in').text() == $('#owner_of_'+id).text()) {
			var comment = $('#comment_text_'+id).text();
			$('#btn'+id).hide();
			$('#comment_text_'+id).html(
				'<div class="input textarea">' +
				'<textarea id="edit_comment" class="commentstate" rows="3" cols="89">' +
				comment +
				'</textarea>' +
				'' +
				'</div>' +
				'<button onclick="editSave('+ id +')">Save</button>' +
				'<button onclick="editCancel('+id+',\''+comment+'\')">Cancel</button>'
					
				);
		} else {
			alert("You don\'t have permission to do that!!!");
		}
		
		
			
		
	}

	function editCancel(id, comment){
		$('#comment_text_'+id).html(comment);
		$('#btn'+id).show();
	}

	function editSave(id){
		var user_id = $('#input_user_id').val();
		var photo_id = $('#input_photo_id').val();
		var video_id = $('#input_video_id').val();
		var comment = $("#edit_comment").val();
		if ($('#input_photo_id').length) {
			$.ajax({
	            url: '/comments/edit/' + id,
	            type: "POST",
	            data:{
	            	'id' : id,
	            	'user_id' : user_id,
	            	'photo_id' : photo_id,
	            	'comment' : comment,
	            },
	            dataType : 'json',
	           
	            success: function(data) {
	            	if(data.result=='true'){
	    				alert("Comment has been edited");
	    				$('#comment_text_'+id).html(comment);
	            		
	            	} else {
	            		alert("Cannot edit this comment");
	            	}

	            }
	        });
		} else {
			$.ajax({
	            url: '/comments/edit/' + id,
	            type: "POST",
	            data:{
	            	'id' : id,
	            	'user_id' : user_id,
	            	'video_id' : video_id,
	            	'comment' : comment,
	            },
	            dataType : 'json',
	           
	            success: function(data) {
	            	if(data.result=='true'){
	    				alert("Comment has been edited");
	    				$('#comment_text_'+id).html(comment);
	            		
	            	} else {
	            		alert("Cannot edit this comment");
	            	}

	            }
	        });
		}
		$('#btn'+id).show();
		
	}