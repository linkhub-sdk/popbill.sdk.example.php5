<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌 회원 사업자번호, "-"제외 10자리
	$testUserID = 'testkorea';		# 팝빌 회원 아이디
	$reserveDT = null;				# 예약전송일시(yyyyMMddHHmmss), null인경우 즉시전송
#	$reserveDT = '20151212230000';
	$adsYN = false;					# 광고문자 전송여부

	$Messages = array();

	$Messages[] = array(
		'snd' => '07075106766',			# 발신번호
    'sndnm' => '발신자명',			# 발신자명
		'rcv' => '010111222',			# 수신번호
		'rcvnm' => '수신자성명',		# 수신자성명
		'msg'	=> '장문 메시지 내용 장문으로 보내는 기준은 메시지 길이을 기준으로 90byte이상입니다. 2000byte에서 길이가 조정됩니다.', # 개별전송 메시지 내용
	);

	try {
		# 자동인식 문자전송의 경우 문자메시지 내용의 길이에 따라 90Byte 이상인경우 장문(LMS)으로 전송됩니다.
		# SendXMS(사업자번호, 동보전송발신번호, 동보전송발신자명, 동보전송제목, 동보전송내용, 전송정보배열, 예약전송일시, 회원아이디)
		$receiptNum = $MessagingService->SendXMS($testCorpNum, '', '', '', '', $Messages, $reserveDT, $adsYN, $testUserID);
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
				<legend>장/단문 자동인식 문자 1건 전송</legend>
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
