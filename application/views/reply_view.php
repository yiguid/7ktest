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
<div>
<?php
		echo "<div>";
		echo $msg->content;
		echo $msg->date;
		echo $msg->time;
		echo $msg->nickname;
		echo "</div>";
		foreach($rpylist as $rpy)
		{
				echo "<div>";
				echo $rpy->content;
				echo $rpy->date;
				echo $rpy->time;
				echo $rpy->nickname;
				echo "</div>";
		}
?>
<form class="form-horizontal" action="<?php echo base_url();?>feedback/doReply/<?php echo $msg->id?>" method="post">
	<textarea name="msgcontent" id="msgcontent"></textarea>
	<p>
	<button class="btn btn-primary" type="submit" name="submit">发表留言</button>
	</p>
</form>
</div>
<?php $this->load->view('footer'); ?>