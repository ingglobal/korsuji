<?php
// header('Content-Type: application/json; charset=UTF-8');
include_once('./_common.php');
include_once(G5_PATH.'/head.sub.php');
?>
<script>
var lnk = 'https://log.smart-factory.kr/apisvc/sendLogData.json';
var crtfcKey = '<?=$g5['setting']['set_userlog_crtfckey']?>';
var logDt = '<?=G5_TIME_YMDHIS?>.000';
var useSe = '검색';
var sysUser = 'kjs';
var conectIp = '192.34.23.45';
var dataUsgqty = '0';

var param = {
	'crtfcKey' : crtfcKey,
	'logDt' : logDt,
	'useSe' : useSe,
	'sysUser' : sysUser,
	'conectIp' : conectIp,
	'dataUsgqty' : dataUsgqty
}

$.ajax({
	type : "POST",
	url : lnk,
	cache : false,
	timeout : 360000,
	data : param,
	dataType : "json",
	contentType : "application/x-www-form-urlencoded; charset=utf-8",
	success : function(data, textStatus, jqXHR){
		var result = data.result;
		console.log(result);
	},
	error : function(jqXHR, textStatus, errorThrown){
		
	}
});
</script>
<?php
include_once(G5_PATH.'/tail.sub.php');
?>
