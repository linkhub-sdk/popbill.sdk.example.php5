<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
  /**
  * 팩스를 재전송합니다.
  * - 전송일로부터 180일이 경과된 경우 재전송할 수 없습니다.
  */

	include 'common.php';

  // 팝빌 회원 사업자번호
	$testCorpNum = '1234567890';

  // 팩스 접수번호
  $ReceiptNum = '017060113413500001';

  // 팩스전송 발신번호, 공백처리시 기존전송정보로 재전송
  $Sender = '07043042991';

  // 팩스전송 발신자명, 공백처리시 기존전송정보로 재전송
  $SenderName = '발신자명';

  // 팩스 수신정보 배열, NULL로 처리하는 경우 기존전송정보로 재전송
  $Receivers = NULL;

  /*
  // 팩스 수신정보가 기존전송정보와 다를경우 아래의 코드 참조
	$Receivers[] = array(
    // 팩스 수신번호
		'rcv' => '070111222',

    // 수신자명
		'rcvnm' => '팝빌담당자'
	);
  */

  // 예약전송일시(yyyyMMddHHmmss) ex) 20151212230000, null인경우 즉시전송
	$reserveDT = '';

	try {
		$receiptNum = $FaxService->ResendFAX($testCorpNum, $ReceiptNum, $Sender, $SenderName, $Receivers, $reserveDT);
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
				<legend>팩스 재전송 요청</legend>
				<ul>
					<?php
						if ( isset($receiptNum) ) {
					?>
							<li>receiptNum(팩스접수번호) : <?php echo $receiptNum?></li>
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
