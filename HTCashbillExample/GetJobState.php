<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';		# 팝빌회원 사업자번호, '-'제외 10자리
  $jobID = '016070813000000001';  # 수집요청시 발급받은 작업아이디
	$testUserID = 'testkorea';		# 팝빌회원 아이디

	try {
		$result = $HTCashbillService->GetJobState ( $testCorpNum, $jobID, $testUserID );
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
				<legend>수집 상태 확인</legend>
				<ul>
					<?
						if ( isset ( $code ) ) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
						<li>jobID (작업아이디) : <?= $result->jobID ?></li>
            <li>jobState (수집상태) : <?= $result->jobState ?></li>
            <li>queryType (수집유형) : <?= $result->queryType ?></li>
            <li>queryDateType (일자유형) : <?= $result->queryDateType ?></li>
            <li>queryStDate (시작일자) : <?= $result->queryStDate ?></li>
            <li>queryEnDate (종료일자) : <?= $result->queryEnDate ?></li>
            <li>errorCode (오류코드) : <?= $result->errorCode ?></li>
            <li>errorReason (오류메시지) : <?= $result->errorReason ?></li>
            <li>jobStartDT (작업 시작일시) : <?= $result->jobStartDT ?></li>
            <li>jobEndDT (작업 종료일시) : <?= $result->jobEndDT ?></li>
            <li>collectCount (수집개수) : <?= $result->collectCount ?></li>
            <li>regDT (수집 요청일시) : <?= $result->regDT ?></li>
					<?
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
