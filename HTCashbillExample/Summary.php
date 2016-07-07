<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
  $testCorpNum = '1234567890';

  // 팝빌회원 아이디
  $testUserID = 'testkorea';

  // 수집 요청(RequestJob) 호출시 반환받은 작업아이디
  $JobID = '016070717000000020';

  // 현금영수증 종류 배열, N-일반 현금영수증, C-취소 현금영수증
  $TradeType = array (
    'N',
    'C'
  );

  // 거래용도 배열, P-소득공제용, C-지출증빙용
  $TradeUsage = array (
    'P',
    'C'
  );

	try {

		$response = $HTCashbillService->Summary ( $testCorpNum, $JobID, $TradeType, $TradeUsage, $testUserID );
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
				<legend>수집 결과 요약정보 조회</legend>
				<ul>
					<?
						if ( isset ( $code ) ) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
						  <li>count (수집 결과 건수) : <?= $response->count ?></li>
              <li>supplyCostTotal (공급가액 합계) : <?= $response->supplyCostTotal ?></li>
              <li>taxTotal (세액 합계) : <?= $response->taxTotal ?></li>
              <li>serviceFeeTotal (봉사료 합계) : <?= $response->serviceFeeTotal ?></li>
              <li>amountTotal (합계 금액) : <?= $response->amountTotal ?></li>
					<?
        	  }
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
