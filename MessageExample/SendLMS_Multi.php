<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

  // 팝빌 회원 사업자번호, "-" 제외 10자리
	$testCorpNum = '1234567890';

  // 예약전송일시(yyyyMMddHHmmss) ex)20151212230000, null인경우 즉시전송
	$reserveDT = null;

  // 광고문자 전송여부
	$adsYN = false;

	for ($i = 0; $i < 100; $i++){
		$Messages[] = array(
			'snd' => '07043042991',		// 발신번호
      'sndnm' => '발신자명',			// 발신자명
			'rcv' => '010111222',			// 수신번호
			'rcvnm' => '수신자성명'.$i,	// 수신자 성명
			'msg'	=> '개별 메시지 내용',  // 개별 메시지 내용. 장문은 2000byte로 길이가 조정되어 전송됨.
			'sjt'	=> '개발 메시지 제목'	 // 개별 메시지 내용
		);
	}

	try {
		$receiptNum = $MessagingService->SendLMS($testCorpNum, '', '', '', $Messages, $reserveDT, $adsYN);
	}
  catch (PopbillException $pe) {
		$code = $pe->getCode();
		$message = $pe->getMessage();
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>장문문자 100건 전송</legend>
				<ul>
					<?php
						if ( isset($receiptNum) ) {
					?>
							<li>receiptNum(접수번호) : <?php echo $receiptNum?></li>
					<?php
						} else {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
