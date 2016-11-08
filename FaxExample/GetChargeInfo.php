<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 연동회원의 팩스 API 서비스 과금정보를 확인합니다.
  */
  
	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌회원 아이디
	$testUserID = 'testkorea';

	try {
		$result = $FaxService->GetChargeInfo($testCorpNum, $testUserID);
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
				<legend>과금정보 확인</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
						<li>unitCost(전송단가) : <?= $result->unitCost ?></li>
						<li>chargeMethod(과금유형) : <?= $result->chargeMethod ?></li>
						<li>rateSystem(과금제도) : <?= $result->rateSystem ?></li>
					<?
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
