<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 연동회원의 잔여포인트를 확인합니다.
  * - 과금방식이 파트너과금인 경우 파트너 잔여포인트(GetPartnerBalance API)
  *   를 통해 확인하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호
	$testCorpNum = '1234567890';

	try {
		$remainPoint = $HTCashbillService->GetBalance($testCorpNum);
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
				<legend>연동회원 잔여포인트 확인</legend>
				<ul>
					<?
						if ( isset ( $remainPoint ) ) {
					?>
							<li>잔여포인트 : <?= $remainPoint ?></li>
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
