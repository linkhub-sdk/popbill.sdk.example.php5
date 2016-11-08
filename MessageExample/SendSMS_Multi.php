<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
	include 'common.php';

  // 팝빌 회원 사업자번호, "-" 제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌 회원 아이디
	$testUserID = 'testkorea';


  // 예약전송일시(yyyyMMddHHmmss) ex)20151212230000, null인 경우 즉시전송
	$reserveDT = null;

  // 광고문자 전송여부
	$adsYN = false;


	for ($i = 0; $i < 100; $i++ ) {
    // 문자전송정보 최대 1000건까지 호출가능
		$Messages[] = array(
			'snd' => '07043042991',		// 발신번호
      'sndnm' => '발신자명',			// 발신자명
			'rcv' => '010111222',			// 수신번호
			'rcvnm' => '수신자성명'.$i,	// 수신자성명
			'msg'	=> '개별 메시지 내용'	 // 개별 메시지 내용
		);
	}

  try {
		$receiptNum = $MessagingService->SendSMS($testCorpNum,'','', $Messages, $reserveDT, $adsYN, $testUserID);
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
				<legend>단문문자 100건 전송</legend>
				<ul>
					<?
						if ( isset($receiptNum) ) {
					?>
							<li>receiptNum(접수번호) : <?= $receiptNum?></li>
					<?
						} else {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
