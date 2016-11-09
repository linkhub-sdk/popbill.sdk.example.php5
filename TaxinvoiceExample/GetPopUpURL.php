<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 1건의 전자세금계산서 보기 팝업 URL을 반환합니다.
  * - 반환된 URL은 보안정책으로 인해 30초의 유효시간을 갖습니다.
  */

	include 'common.php';

  // 팝빌 회원 사업자 번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌 회원 아이디
	$testUserID = 'testkorea';

  // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
  $mgtKeyType = ENumMgtKeyType::SELL;

  // 문서관리번호
	$mgtKey = '20150206-01';

	try {
		$url = $TaxinvoiceService->GetPopUpURL($testCorpNum, $mgtKeyType, $mgtKey, $testUserID);
	}
	catch ( PopbillException $pe ) {
		$code = $pe->getCode();
		$message = $pe->getMessage();
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>세금계산서 보기 팝업 URL 확인</legend>
				<ul>
					<?
						if ( isset($url) ) {
					?>
							<li>url : <?= $url ?></li>
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
