
			

			function likeCheck(id,type) {
		        $.ajax({
		            url: '/likes/likecheck/'+id+'/'+type,
		            type: "POST",
		            dataType : 'json',
		           
		            success: function(data) {
		            	$('#'+id).html('<span class="glyphicon glyphicon-heart"></span>'+data.number);

		            	if(data.result=='y'){
		            		$('#'+id).removeClass('btn-default');
		            		$('#'+id).addClass('btn-danger');
		            	} else {
		            		$('#'+id).removeClass('btn-danger');
		            		$('#'+id).addClass('btn-default');
		            	}
		              
		            },
		      
		        });
		    }


		    function likeAction(id,type) {
   		        $.ajax({
		            url: "/likes/likeaction/"+id+'/'+type,
		            type: "POST",
		            dataType : 'json',
		           
		            success: function(data) {
                          console.log(data);
		            	if(data.flag == 'false'){
		            		alert("Please login !!!");
		            	}else{
		            	if(data.result=='a'){
		            		$('#'+id).html('<span class="glyphicon glyphicon-heart"></span>'+data.number);
		           
		            		$('#'+id).removeClass('btn-default');
		            		$('#'+id).addClass('btn-danger');
		            	} else {
		            		$('#'+id).removeClass('btn-danger');
		            		$('#'+id).addClass('btn-default');
		            		$('#'+id).html('<span class="glyphicon glyphicon-heart"></span>'+data.number);
		            	}
		            }
		              
		            },
		      
		        });
		    }
