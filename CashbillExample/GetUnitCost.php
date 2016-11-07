<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 현금영수증 발행단가를 확인합니다.
  */

	include 'common.php';

  // 팝빌 회원 사업자 번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

	try {
		$unitCost = $CashbillService->GetUnitCost($testCorpNum);
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
				<legend>현금영수증 발행 단가 확인</legend>
				<ul>
					<?
						if ( isset($unitCost) ) {
					?>
						<li>unitCost : <?= $unitCost ?></li>
					<?
						} else {
					?>s
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
