<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 연동회원의 회사정보를 확인합니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌회원 아이디
	$testUserID = 'testkorea';

	try {
		$result = $ClosedownService->GetCorpInfo($testCorpNum, $testUserID);
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
				<legend>회사정보 확인</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
						<li>ceoname : <?= $result->ceoname ?></li>
						<li>corpName : <?= $result->corpName ?></li>
						<li>addr : <?= $result->addr ?></li>
						<li>bizType : <?= $result->bizType ?></li>
						<li>bizClass : <?= $result->bizClass ?></li>
					<?
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
