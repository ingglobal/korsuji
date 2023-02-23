<?php
$sub_menu = "930100";
include_once('./_common.php');

check_demo();

if (!count($_POST['chk'])) {
    alert($_POST['act_button']." 하실 항목을 하나 이상 체크하세요.");
}

// print_r2($_POST);
// exit;
auth_check($auth[$sub_menu], 'w');

check_admin_token();


if ($_POST['act_button'] == "선택수정") {

    foreach($_POST['chk'] as $oop_idx_v){
        $_POST['oop_count'][$oop_idx_v] = preg_replace("/,/","",$_POST['oop_count'][$oop_idx_v]);

		$sql0 = "UPDATE {$g5['order_practice_table']} SET
					orp_done_date = '{$_POST['orp_done_date'][$oop_idx_v]}'
				WHERE orp_idx = '{$_POST['orp_idx'][$oop_idx_v]}'
		";
		sql_query($sql0,1);

        $sql = " UPDATE {$g5['order_out_practice_table']} SET
                    oop_count = '".sql_real_escape_string($_POST['oop_count'][$oop_idx_v])."'
                    ,oop_status = '".$_POST['oop_status'][$oop_idx_v]."'
                    ,oop_update_dt = '".G5_TIME_YMDHIS."'
                    ,oop_mtr_weight = '".$_POST['oop_mtr_weight'][$oop_idx_v]."'
                    ,oop_itm_weight = '".$_POST['oop_itm_weight'][$oop_idx_v]."'
                    ,oop_1 = '".$_POST['oop_1'][$oop_idx_v]."'
                    ,oop_2 = '".$_POST['oop_2'][$oop_idx_v]."'
                    ,oop_3 = '".$_POST['oop_3'][$oop_idx_v]."'
                    ,oop_4 = '".$_POST['oop_4'][$oop_idx_v]."'
                    ,oop_5 = '".$_POST['oop_5'][$oop_idx_v]."'
                    ,oop_6 = '".$_POST['oop_6'][$oop_idx_v]."'
                    ,oop_7 = '".$_POST['oop_7'][$oop_idx_v]."'
                    ,oop_8 = '".$_POST['oop_8'][$oop_idx_v]."'
                    ,oop_9 = '".$_POST['oop_9'][$oop_idx_v]."'
                    ,oop_10 = '".$_POST['oop_10'][$oop_idx_v]."'
                WHERE oop_idx = '".$oop_idx_v."'
        ";
        sql_query($sql,1);
    }

} else if ($_POST['act_button'] == "선택삭제") {

    foreach($_POST['chk'] as $oop_idx_v){
        $sql = " UPDATE {$g5['order_out_practice_table']} SET
                    oop_status = 'trash'
                WHERE oop_idx = '".$oop_idx_v."'
        ";
        // echo $sql."<br>";
        sql_query($sql,1);
    }
}
// exit;

if ($msg)
    //echo '<script> alert("'.$msg.'"); </script>';
    alert($msg);

// exit;
$qstr .= '&sca='.$sca.'&ser_cod_type='.$ser_cod_type; // 추가로 확장해서 넘겨야 할 변수들
//echo $qstr;exit;
goto_url('./order_out_practice_list.php?'.$qstr);
