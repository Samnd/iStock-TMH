<div id = "comment_<?php echo $id; ?>" onload="" >
	<div id="name">
		<?php echo $posted_by;?>
		<div id="owner_of_<?php echo $id; ?>" style="display: none;"><?php echo $posted_by_id;?></div>
		<div class="dropdown" style="float: right;">
			<small style="margin-right: 5px;"><?php echo $created;?></small>
			<button id="btn<?php echo $id; ?>" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
		    <span class="caret"></span></button>
		    <ul class="dropdown-menu dropdown-menu-right" style="width: 80px;">
		     	<li><a onclick="editShow(<?php echo $id; ?>)">Edit</a></li>
		     	<li>
		     	<a href="javascript:void(0)" onclick="deleteComment(<?php echo $id; ?>)">Delete</a>
	            </li>
		    </ul>
		</div>
	</div>
	<hr class="style14">
	<div style="margin-left: 30px;" id="comment_text_<?php echo $id; ?>"><?php echo $comment;?></div>
	<hr class="style13">
</div>