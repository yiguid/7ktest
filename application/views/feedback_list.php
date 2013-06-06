		<div class="feedback_view">
		<?php
			$this->load->model('feedback_mdl');
			$typearr=array('催单','网站错误','功能建议','投诉');
			foreach($msglist as $row)
			{
				echo "<div class='feedback_message'>";
				echo "<b>[".$typearr[$row->type - 1]."]</b>"."&nbsp;";
				echo "<i class='icon-comment icon-white'></i>".$row->content;
				echo '<br/>';
				echo "<i class='icon-user'></i>".$row->nickname."&nbsp;&nbsp;";
				echo $row->date." ";
				echo $row->time." ";
				if($this->auth->logged_in()){
					echo anchor("feedback/reply/$row->id", "[<i class='icon-retweet icon-white'></i>回复]",'style="color:#3498db;"');
				}
				echo "</div>";
				$rpylist = $this->feedback_mdl->get_msg_all_rpy($row->id);
				foreach($rpylist as $rpy)
				{
					echo "<div class='feedback_reply'>";
					echo "<i class='icon-comment icon-white'></i>".$rpy->content."<br/>";
					echo "<i class='icon-user'></i>".$rpy->nickname."&nbsp;&nbsp;&nbsp;";
					echo $rpy->date." ";
					echo $rpy->time;	
					echo "</div>";
				}
			}
		?>
		</div>