<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';
	
	$testCorpNum = '1234567890';	#팝빌 회원 사업자번호 
	$testUserID = 'testkorea';		#팝빌 회원 아이디
#	$reserveDT = null;				#예약전송일시(yyyyMMddHHmmss), null인경우 즉시전송
	$reserveDT = '20151212230000';
	$Sender = '07075103710';		#발신번호

	$Receivers = array();
	
	$Receivers[] = array(
		'rcv' => '1112222',			#수신번호
		'rcvnm' => '팝빌담당자'		#수신자 명칭
	);
	
	#동보전송을 위해 1000건까지 반복가능.
	$Receivers[] = array(
		'rcv' => '11112222',		#수신번호
		'rcvnm' => '수신자성명'		#수신자 명칭
	);
	
	#해당파일에 읽기 권한이 설정되어 있어야 함. 최대 5개.
	$Files = array('./uploadtest.jpg','./uploadtest2.jpg');
	
	try {
		$receiptNum = $FaxService->SendFAX($testCorpNum,$Sender,$Receivers, $Files, $reserveDT, $testUserID);
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
				<legend>팩스전송_Multi</legend>
				<ul>
					<?
						if(isset($receiptNum)) { 
					?>
							<li>receiptNum : <? echo $receiptNum?></li>
					<?
						} else {
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>