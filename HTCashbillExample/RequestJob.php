<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';		# 팝빌회원 사업자번호, '-'제외 10자리
  $CBType = KeyType::SELL;        # 현금영수증, SELL-매출, BUY-매입
  $SDate = '20160601';            # 시작일자, 형식(yyyyMMdd)
  $EDate = '20160831';            # 종료일자, 형식(yyyyMMdd)
	$testUserID = 'testkorea';			# 팝빌회원 아이디

	try {
		$jobID = $HTCashbillService->RequestJob ( $testCorpNum, $CBType, $SDate, $EDate, $testUserID );
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
				<legend>수집 요청</legend>
				<ul>
					<?
						if ( isset ( $code ) ) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
						<li>jobID(작업아이디) : <?= $jobID ?></li>
					<?
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
