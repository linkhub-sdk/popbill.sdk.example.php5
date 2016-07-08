<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';		# 팝빌회원 사업자번호, '-'제외 10자리
	$testUserID = 'testkorea';			# 팝빌회원 아이디

	try {
		$result = $HTCashbillService->GetFlatRateState ( $testCorpNum,$testUserID ) ;
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
				<legend>정액제 서비스 상태 확인</legend>
				<ul>
					<?
						if ( isset ( $code ) ) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
						<li>referenceID (사업자번호) : <?= $result->referenceID ?></li>
            <li>contractDT (정액제 서비스 시작일시) : <?= $result->contractDT ?></li>
            <li>useEndDate (정액제 서비스 종료일) : <?= $result->useEndDate ?></li>
            <li>baseDate (자동연장 결제일) : <?= $result->baseDate ?></li>
            <li>state (정액제 서비스 상태) : <?= $result->state ?></li>
            <li>closeRequestYN (정액제 서비스 해지신청 여부) : <?= $result->closeRequestYN ? 'true' : 'false' ?></li>
            <li>useRestrictYN (정액제 서비스 사용제한 여부) : <?= $result->useRestrictYN ? 'true' : 'false' ?></li>
            <li>closeOnExpired (정액제 서비스 만료 시 해지여부) : <?= $result->closeOnExpired  ? 'true' : 'false' ?></li>
            <li>unPaidYN (미수금 보유 여부) : <?= $result->unPaidYN ? 'true' : 'false' ?></li>

					<?
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>