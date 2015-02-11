<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$testCorpNum = '1234567890';			# 팝빌 회원 사업자번호, '-' 제외 10자리
	$testUserID = 'testkorea';				# 팝빌 회원 아이디
	$mgtKeyType = ENumMgtKeyType::SELL;		# 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TURSTT:위수탁
	$mgtKey = '20150206-01';				# 문서관리번호
	$sender = '07075103710';				# 발신번호
	$receiver = '01043245117';				# 수신번호
	$contents = '문자전송 내용입니다. 90Byte를 초과한내용은 길이 조정되어 전송됩니다. 참고하시기 바랍니다.';
	
	try {
		$result = $TaxinvoiceService->SendSMS($testCorpNum , $mgtKeyType, $mgtKey, $sender, $receiver, $contents, $testUserID);
		$code = $result->code;
		$message = $result->message;
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
				<legend>알림문자 재전송</legend>
				<ul>
					<li>Response.code : <? echo $code ?></li>
					<li>Response.message : <? echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>