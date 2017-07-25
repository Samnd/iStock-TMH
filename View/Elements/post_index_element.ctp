<script type="text/javascript">likeCheck(<?php echo $id.",'".$tab."'";  ?>);</script>
			    <div class="col-md-4 ">
			    	<div class="grid mask">
						<figure>
						<?php 
						if ($tab==='Photo') {
							$link = '/photos/view/'.$id;
							# code...
							echo '<a href="'.$link.'">';
							echo $this->Html->image($url, array('class'=>'imgoption'));
							echo '</a>';
						} else{
							$link = '/videos/view/'.$id;
							echo '<div class="imgoption" style="position: relative;" onclick="videoClick(this)">';
							echo $this->element('video_player' ,array(
								'id' => $id,
								'url' => $url,
								'controls'=>false
								));
							echo '</div>';
							
						}
						 ?>

						 	<figcaption>
								<button id="<?php  echo $id; ?>" style="margin-top: -10px;" class="btn btn-sm btn-default" onclick="likeAction(<?php echo $id.",'".$tab."'";  ?>)"><span class="glyphicon glyphicon-heart" ></span>0</button>

								<button id="comment<?php  echo $id; ?>" style="margin-top: -10px; width: auto; height: 29px; font-size: 16px; padding-bottom: -5px;" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-comment"></span>
								<?php 
									echo $comment_count;
								 ?>
								</button>

								<div class="fb-share-button" style="vertical-align: top;" data-href="http://192.168.33.10/cakephp/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F192.168.33.10%2Fcakephp%2F&amp;src=sdkpreparse"></a></div>

								<a data-togglxe="modal" href="<?php echo $link; ?>" class="btn btn-primary btn-lg">Take a Look</a>
							</figcaption>
						</figure>
			    	</div>

				</div>