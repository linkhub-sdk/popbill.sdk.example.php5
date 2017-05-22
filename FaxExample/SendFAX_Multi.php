<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

  // 팝빌 회원 사업자번호
	$testCorpNum = '1234567890';

  // 예약전송일시(yyyyMMddHHmmss) ex)20151212230000, null인경우 즉시전송
	$reserveDT = null;

  // 팩스전송 발신번호
	$Sender = '07043042991';

  // 팩스 수신정보 배열, 최대 1000건
	$Receivers[] = array(
    // 팩스 수신번호
		'rcv' => '070111222',
    // 팩스 수신자명
		'rcvnm' => '팝빌담당자'
	);

	$Receivers[] = array(
    // 팩스 수신번호
		'rcv' => '070333444',
    // 팩스 수신자명
		'rcvnm' => '수신담당자'
	);

	// 팩스전송파일, 해당파일에 읽기 권한이 설정되어 있어야 함. 최대 5개.
	$Files = array('./uploadtest.jpg','./uploadtest2.jpg');

	try {
		$receiptNum = $FaxService->SendFAX($testCorpNum, $Sender, $Receivers, $Files, $reserveDT);
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
				<legend>팩스 전송 - 대량</legend>
				<ul>
					<?php
						if ( isset($receiptNum) ) {
					?>
							<li>receiptNum (팩스접수번호) : <?php echo $receiptNum ?></li>
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
