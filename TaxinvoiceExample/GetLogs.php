<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?
  /**
  * 세금계산서 상태 변경이력을 확인합니다.
  * - 상태 변경이력 확인(GetLogs API) 응답항목에 대한 자세한 정보는
  *   "[전자세금계산서 API 연동매뉴얼] > 3.6.4 상태 변경이력 확인"
  *   을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
  $mgtKeyType = ENumMgtKeyType::SELL;

  // 세금계산서 문서관리번호
	$mgtKey = '20170302-04';

  try {
		$result = $TaxinvoiceService->GetLogs($testCorpNum, $mgtKeyType, $mgtKey);
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
				<legend>세금계산서 상태변경 이력</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
						for ($i = 0; $i < Count($result) ; $i++) {
					?>
							<fieldset class ="fieldset2">
							<legend> 세금계산서 상태변경 이력 [<?= $i+1 ?>] </legend>
								<ul>
									<li>log : <?= $result[$i]->log  ?></li>
									<li>procType  : <?= $result[$i]->procType  ?></li>
									<li>procCorpName  : <?= $result[$i]->procCorpName  ?></li>
									<li>procMemo  : <?= $result[$i]->procMemo  ?></li>
									<li>regDT  : <?= $result[$i]->regDT  ?></li>
                  <li>ip : <?= $result[$i]->ip ?></li>
									<li>docLogType : <?= $result[$i]->docLogType ?></li>
								</ul>
							</fieldset>
					<?
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
