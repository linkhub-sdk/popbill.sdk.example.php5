<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$testCorpNum = '1234567890';			# 팝빌 회원 사업자번호, '-' 제외 10자리
	$testUserID = 'testkorea';				# 팝빌 회원 아이디
	$mgtKeyType = ENumMgtKeyType::SELL;		# 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TURSTT:위수탁
	$mgtKey = '20150204-01';				# 문서관리번호
	$memo= '역)발행 요청 메모입니다';		# 메모

	try {
		$result = $TaxinvoiceService->Request($testCorpNum, $mgtKeyType, $mgtKey, $memo, $testUserID);
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
				<legend>역)발행 요청처리</legend>
				<ul>
					<li>Response.code : <? echo $code ?></li>
					<li>Response.message : <? echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>