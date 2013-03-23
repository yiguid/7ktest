<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if($this->auth->printer_logged_in())
	{
		$this->load->view('printer/header');
	}
	else
	{
		$this->load->view('header');
	}
?>
<div id="feedback_container">
	<div id="profile">
		<div class="feedback_view">
		<?php
				echo "<div class='btn-info feedback_message'>";
				echo "<i class='icon-comment icon-white'></i>".$msg->content;
				echo '<br/>';
				echo "<i class='icon-user'></i>".$msg->nickname."&nbsp;&nbsp;";
				echo $msg->date." ";
				echo $msg->time." ";
				echo "</div>";
				foreach($rpylist as $rpy)
				{
						echo "<div class='btn-warning feedback_reply'>";
						echo "<i class='icon-comment icon-white'></i>".$rpy->content."<br/>";
						echo "<i class='icon-user'></i>".$rpy->nickname."&nbsp;&nbsp;&nbsp;";
						echo $rpy->date." ";
						echo $rpy->time;	
						echo "</div>";
				}
		?>
		<form class="form-horizontal" action="<?php echo base_url();?>feedback/doReply/<?php echo $msg->id?>" method="post">
			<div>
				 <?php if(isset($create_error)) echo "<lable>".$create_error."</lable>";?>
			     <textarea name="msgcontent" id="msgcontent"></textarea>
			</div>
			<div style="padding:10px;">
			    <button class="btn btn-primary" type="submit" name="submit">发表回复</button>
			    <button class="btn btn-inverse" type="reset" name="reset">重写</button>
			</div>
		</form>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>