<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';			# 팝빌회원 사업자번호, '-'제외 10자리
	$testUserID = 'testkorea';				# 팝빌회원 아이디
	$ReceiptNum = '015021117000000001';		# 문자전송 요청 시 발급받은 접수번호(receiptNum)
	
	try {
		$result = $MessagingService->GetMessages($testCorpNum, $ReceiptNum, $testUserID);
	}
	catch(PopbillException $pe) {
		$code = $pe->getCode();
		$message = $pe->getMessage();
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>문자전송 내역 및 전송상태 확인 </legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>

					<?
						}else{
							for ($i = 0; $i < Count($result); $i++) { 
					?>
							<fieldset class="fieldset2"> 
								<legend> 문자전송내역 조회 결과 [<? echo $i+1 ?>/<? echo Count($result)?>]</legend>
								<ul>
									<li> state : <? echo $result[$i]->state; ?> </li>
									<li> subject : <? echo $result[$i]->subject; ?> </li>
									<li> type : <? echo $result[$i]->type; ?> </li>
									<li> content : <? echo $result[$i]->content; ?> </li>
									<li> sendNum : <? echo $result[$i]->sendNum; ?> </li>
									<li> receiveNum : <? echo $result[$i]->receiveNum; ?> </li>
									<li> receiveName : <? echo $result[$i]->receiveName; ?> </li>
									<li> reserveDT : <? echo $result[$i]->reserveDT; ?> </li>
									<li> sendDT : <? echo $result[$i]->sendDT; ?> </li>
									<li> resultDT : <? echo $result[$i]->resultDT; ?> </li>
									<li> sendResult : <? echo $result[$i]->sendResult; ?> </li>
								</ul>
							</fieldset>
					<?
							}
						}
					?>	
				</ul>
			</fieldset>
		 </div>
	</body>
</html>