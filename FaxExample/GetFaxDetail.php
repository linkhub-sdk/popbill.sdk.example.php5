<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	#팝빌 회원 사업자 번호, "-"제외 10자리
	$testUserID = 'testkorea';		#팝빌 회원 아이디
	$ReceiptNum = '015021116530400001';		#팩스전송 접수번호

	try {
		$result = $FaxService->GetFaxDetail($testCorpNum ,$ReceiptNum, $testUserID);
	} catch(PopbillException $pe) {
		$code = $pe->getCode();
		$message = $pe->getMessage();
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>팩스전송 내역 및 전송상태 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
					?>
							<li> sendState : <? echo $result->sendState; ?> </li>
							<li> convState : <? echo $result->convState; ?> </li>
							<li> sendNum : <? echo $result->sendNum; ?> </li>
							<li> receiveNum : <? echo $result->receiveNum; ?> </li>
							<li> receiveName : <? echo $result->receiveName; ?> </li>
							<li> sendPageCnt : <? echo $result->sendPageCnt; ?> </li>
							<li> successPageCnt : <? echo $result->successPageCnt; ?> </li>
							<li> failPageCnt : <? echo $result->failPageCnt; ?> </li>
							<li> refundPageCnt : <? echo $result->refundPageCnt; ?> </li>
							<li> cancelPageCnt : <? echo $result->cancelPageCnt; ?> </li>
							<li> reserveDT : <? echo $result->reserveDT; ?> </li>
							<li> sendDT : <? echo $result->sendDT; ?> </li>
							<li> resultDT : <? echo $result->resultDT; ?> </li>
							<li> sendResult : <? echo $result->sendResult; ?> </li>

					<?
						}
					?>					
				</ul>
			</fieldset>
		 </div>
	</body>
</html>