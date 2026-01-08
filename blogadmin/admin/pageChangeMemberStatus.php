<?php
	$currDir = dirname(__FILE__);
	require("{$currDir}/incCommon.php");

	// validate input
	// validate input
	$memberID = makeSafe(strtolower($_GET['memberID'] ?? ''));
	$unban = (($_GET['unban'] ?? 0) == 1 ? 1 : 0);
	$approve = (($_GET['approve'] ?? 0) == 1 ? 1 : 0);
	$ban = (($_GET['ban'] ?? 0) == 1 ? 1 : 0);

	if($unban){
		sql("update membership_users set isBanned=0 where lcase(memberID)='{$memberID}'", $eo);
	}

	if($approve){
		sql("update membership_users set isBanned=0, isApproved=1 where lcase(memberID)='{$memberID}'", $eo);
		notifyMemberApproval($memberID);
	}

	if($ban){
		sql("update membership_users set isBanned=1, isApproved=1 where lcase(memberID)='{$memberID}'", $eo);
	}

	if($_SERVER['HTTP_REFERER']){
		redirect($_SERVER['HTTP_REFERER'], true);
	}else{
		redirect("admin/pageViewMembers.php");
	}

?>
