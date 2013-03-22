<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	$this->load->view('header');
?>
<div id="container">
<div class="leave">
<form class="form-horizontal" action="<?php echo base_url();?>feedback/create" method="post">
 <div class="control-group">
    <span class="help-inline">* 留言类型：</span>
    <label class="radio inline">
      <input type="radio" name="msgtype" value="1" checked>
      	催单
    </label>
    <label class="radio inline">
      <input type="radio" name="msgtype" value="2">
      	网站错误
    </label>
    <label class="radio inline">
      <input type="radio" name="msgtype" value="3">
      	功能建议
    </label>
    <label class="radio inline">
      <input type="radio" name="msgtype" value="4">
		投诉
    </label>
    </div>
    <lable>内容不能为空</label>
     <textarea name="msgcontent" id="msgcontent"></textarea>
     <p>
     <button class="btn btn-primary" type="submit" name="submit">发表留言</button>
     </p>
</form>
</div>
</div>

<?php $this->load->view('footer'); ?>