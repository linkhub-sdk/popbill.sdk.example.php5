<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 현금영수증 1건의 상세정보를 조회합니다.
  * - 응답항목에 대한 자세한 사항은 "[현금영수증 API 연동매뉴얼] > 4.1.
  *   현금영수증 구성" 을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, "-"제외 10자리
	$testCorpNum = '1234567890';

  // 문서관리번호
	$mgtKey = '20170302-01';

	try {
		$result = $CashbillService->GetDetailInfo($testCorpNum, $mgtKey);
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
				<legend>현금영수증 상세정보 확인</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
  						<li>mgtKey : <?= $result->mgtKey?> </li>
  						<li>tradeDate : <?= $result->tradeDate?> </li>
  						<li>tradeUsage : <?= $result->tradeUsage?> </li>
  						<li>tradeType : <?= $result->tradeType ?> </li>
  						<li>taxationType : <?= $result->taxationType ?> </li>
  						<li>supplyCost : <?= $result->supplyCost ?> </li>
  						<li>tax : <?= $result->tax ?> </li>
  						<li>serviceFee : <?= $result->serviceFee ?> </li>
  						<li>totalAmount : <?= $result->totalAmount ?> </li>
  						<li>franchiseCorpNum : <?= $result->franchiseCorpNum ?> </li>
  						<li>franchiseCorpName : <?= $result->franchiseCorpName ?> </li>
  						<li>franchiseCEOName : <?= $result->franchiseCEOName ?> </li>
  						<li>franchiseAddr : <?= $result->franchiseAddr ?> </li>
  						<li>franchiseTEL : <?= $result->franchiseTEL ?> </li>
  						<li>identityNum : <?= $result->identityNum ?> </li>
  						<li>customerName : <?= $result->customerName ?> </li>
  						<li>itemName : <?= $result->itemName ?> </li>
  						<li>orderNumber : <?= $result->orderNumber ?> </li>
  						<li>email : <?= $result->email ?> </li>
  						<li>hp : <?= $result->hp ?> </li>
  						<li>fax : <?= $result->fax ?> </li>
  						<li>smssendYN : <?= $result->smssendYN ?> </li>
  						<li>faxsendYN : <?= $result->faxsendYN ?> </li>
  						<li>orgConfirmNum : <?= $result->orgConfirmNum ?> </li>
					<?
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
