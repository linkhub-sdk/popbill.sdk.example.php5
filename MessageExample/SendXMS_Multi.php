<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

  // 팝빌 회원 사업자번호, "-"제외 10자리
	$testCorpNum = '1234567890';

  // 문자전송정보 배열
  $Messages = array();

	for ( $i = 0; $i < 10; $i++ ) {
		$Messages[] = array(
			'snd' => '07043042991',		// 발신번호
      'sndnm' => '발신자명',			// 발신자명
			'rcv' => '010111222',			// 수신번호
			'rcvnm' => '수신자성명',		  // 수신자성명
			'msg'	=> '단문 메시지 내용',	 // 개별전송 메시지 내용
		);
	}

	for ($i = 10; $i < 20; $i++ ) {
		$Messages[] = array(
			'snd' => '07043042991',		// 발신번호
      'sndnm' => '발신자명',			// 발신자명
			'rcv' => '010111222',			// 수신번호
			'rcvnm' => '수신자성명',		  // 수신자성명
			'msg'	=> '장문 메시지 내용 장문으로 보내는 기준은 메시지 길이을 기준으로 90byte이상입니다. 2000byte에서 길이가 조정됩니다.', // 개별전송 메시지 내용
			'sjt'	=> '개별 메시지 제목'	// 개별 메시지 제목
		);
	}

  // 예약전송일시(yyyyMMddHHmmss) ex)20161108200000, null인경우 즉시전송
	$reserveDT = null;

  // 광고문자 전송여부
	$adsYN = false;


	try {
		$receiptNum = $MessagingService->SendXMS($testCorpNum, '', '', '', $Messages, $reserveDT, $adsYN);
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
				<legend>장/단문 자동인식 문자 100건 전송</legend>
				<ul>
					<?php
						if ( isset($receiptNum) ) {
					?>
							<li>receiptNum : <?php echo $receiptNum?></li>
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
