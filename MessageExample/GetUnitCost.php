<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 문자 메시지 전송단가를 확인합니다.
  */

	include 'common.php';

  // 팝빌 회원 사업자 번호, "-"제외 10자리
	$testCorpNum = '1234567890';

  // 문자 전송유형 ENumMessageType::SMS(단문), ENumMessageType::LMS(장문), ENumMessageType::MMS(포토)
	$messageType = ENumMessageType::SMS;

	try {
		$unitCost= $MessagingService->GetUnitCost($testCorpNum, $messageType);
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
				<legend>전송 단가 확인</legend>
				<ul>
					<?
						if ( isset($unitCost) ) {
					?>
							<li><?= $messageType ?> 전송단가 : <?= $unitCost ?></li>
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
