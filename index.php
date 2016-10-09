<?php error_reporting(0);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="style.css" />
	<title>php日历v1.5</title>
</head>
<body>
<?php
	require_once("calendar.class.php");
	$cal = new Calendar();
	$cal -> display();
?>
	<!-- layer -->
	<div class="layer_notice" style="display:none;position:absolute;top:40%;margin-left:-10%;border:2px solid #666;"><img src="http://www.phpol.cn/templets/default/rightService/img/zfb.png" /></div>
	<script type="text/javascript" src="http://www.phpol.cn/templets/css/js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="http://www.phpol.cn/templets/css/js/layer/layer.min.js"></script>
	<script type="text/javascript">
		function alertLayer() {
			$.layer({
				type: 1,
				shade: [0],
				area: ['auto', 'auto'],
				offset: ['28%', '42%'],
				title: false,
				border: [0],
				page: {dom : '.layer_notice'}
			});
		}
	</script>
	<!-- layer end -->
	<div class="show" style="width:200px;margin:0 auto;padding-top:35px;">
		当前日期：<?php echo date("Y年m月d日"); ?><br /><br />
		<?php if(isset($_GET['year']) && isset($_GET['month'])) { ?>
		选择日期：<?php $m = (strlen($_GET['month']) == 1) ? '0'.$_GET['month'] : $_GET['month']; echo $_GET['year'].'年'.$m.'月'.date('d').'日';?>
		<?php } else { ?>
		选择日期：待选择
		<?php } ?>
	</div>
	<div class="bottom">
		@copyright 2015 <a title="PHP教程" href="http://www.phpol.cn">PHP教程</a>&nbsp;&nbsp;<a target="_blank" title="淘宝网店" href="http://shop104016594.taobao.com/?spm=a230r.7195193.1997079397.55.Exmc15&v=1">淘宝网站</a>&nbsp;&nbsp;<a href="#" target="_self" onclick="alertLayer()" title="捐助我">捐助我</a>
	</div>
</body>
</html>
