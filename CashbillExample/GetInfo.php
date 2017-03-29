<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 1건의 현금영수증 상태/요약 정보를 확인합니다.
  * - 응답항목에 대한 자세한 정보는 "[현금영수증 API 연동매뉴얼] > 4.2.
  *   현금영수증 상태정보 구성"을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호
	$testCorpNum = '1234567890';

  // 문서관리번호
	$mgtKey = '20170302-01';

	try {
		$result = $CashbillService->GetInfo($testCorpNum, $mgtKey);
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
				<legend>현금영수증 요약/상태정보 확인</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						} else {
							{
					?>
								<li> itemKey (현금영수증 아이템키) : <?= $result->itemKey ?></li>
								<li> mgtKey (문서관리번호) : <?= $result->mgtKey ?></li>
								<li> tradeDate (거래일자) : <?= $result->tradeDate ?></li>
								<li> issueDT (발행일시) : <?= $result->issueDT ?></li>
                <li> regDT (등록일시) : <?= $result->regDT ?></li>
                <li> customerName (고객명) : <?= $result->customerName ?></li>
								<li> itemName (상품명) : <?= $result->itemName ?></li>
								<li> identityNum (거래처 식별번호) : <?= $result->identityNum ?></li>
								<li> taxationType (과세형태) : <?= $result->taxationType ?></li>
								<li> totalAmount (거래금액) : <?= $result->totalAmount ?></li>
								<li> tradeUsage (거래용도) : <?= $result->tradeUsage ?></li>
								<li> tradeType (현금영수증 형태) : <?= $result->tradeType ?></li>
								<li> stateCode (상태코드) : <?= $result->stateCode ?></li>
								<li> stateDT (상태변경일시) : <?= $result->stateDT ?></li>
								<li> printYN (인쇄여부) : <?= $result->printYN ?></li>
								<li> confirmNum (국세청 승인번호) : <?= $result->confirmNum ?></li>
								<li> ntssendDT (국세청 전송일시) : <?= $result->ntssendDT ?></li>
								<li> ntsresultDT (국세청 처리결과 수신일시) : <?= $result->ntsresultDT ?></li>
								<li> ntsresultCode (국세청 처리결과 상태코드) : <?= $result->ntsresultCode ?></li>
								<li> ntsresultMessage (국세청 처리결과 메시지) : <?= $result->ntsresultMessage ?></li>
                <li> orgTradeDate (원본 현금영수증 거래일자) : <?= $result->orgTradeDate ?></li>
								<li> orgConfirmNum (원본 현금영수증 국세청승인번호) : <?= $result->orgConfirmNum ?></li>
					<?
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
