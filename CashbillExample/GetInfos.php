<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
  /**
  * 대량의 현금영수증 상태/요약 정보를 확인합니다. (최대 1000건)
  * - 응답항목에 대한 자세한 정보는 "[현금영수증 API 연동매뉴얼] > 4.2.
  *   현금영수증 상태정보 구성"을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호
	$testCorpNum = '1234567890';

  // 문서관리번호 배열, 최대 1000건
	$MgtKeyList = array(
			'20170302-01',
			'20170711-09',
	);

	try {
		$result = $CashbillService->GetInfos($testCorpNum, $MgtKeyList);
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
				<legend>현금영수증 상태/요약정보 확인 - 대량</legend>
				<ul>
					<?php
						if ( isset($code) ) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
							for ($i = 0; $i < Count($result); $i++) {
					?>
								<fieldset class="fieldset2">
									<legend> 현금영수증 상태/요약정보[<?php echo $i+1?>]</legend>
									<ul>
                    <li> itemKey (현금영수증 아이템키) : <?php echo $result[$i]->itemKey ?></li>
    								<li> mgtKey (문서관리번호) : <?php echo $result[$i]->mgtKey ?></li>
    								<li> tradeDate (거래일자) : <?php echo $result[$i]->tradeDate ?></li>
    								<li> issueDT (발행일시) : <?php echo $result[$i]->issueDT ?></li>
                    <li> regDT (등록일시) : <?php echo $result[$i]->regDT ?></li>
                    <li> customerName (고객명) : <?php echo $result[$i]->customerName ?></li>
    								<li> itemName (상품명) : <?php echo $result[$i]->itemName ?></li>
    								<li> identityNum (거래처 식별번호) : <?php echo $result[$i]->identityNum ?></li>
    								<li> taxationType (과세형태) : <?php echo $result[$i]->taxationType ?></li>
    								<li> totalAmount (거래금액) : <?php echo $result[$i]->totalAmount ?></li>
    								<li> tradeUsage (거래용도) : <?php echo $result[$i]->tradeUsage ?></li>
    								<li> tradeType (현금영수증 형태) : <?php echo $result[$i]->tradeType ?></li>
    								<li> stateCode (상태코드) : <?php echo $result[$i]->stateCode ?></li>
    								<li> stateDT (상태변경일시) : <?php echo $result[$i]->stateDT ?></li>
    								<li> printYN (인쇄여부) : <?php echo $result[$i]->printYN ?></li>
    								<li> confirmNum (국세청 승인번호) : <?php echo $result[$i]->confirmNum ?></li>
    								<li> ntssendDT (국세청 전송일시) : <?php echo $result[$i]->ntssendDT ?></li>
    								<li> ntsresultDT (국세청 처리결과 수신일시) : <?php echo $result[$i]->ntsresultDT ?></li>
    								<li> ntsresultCode (국세청 처리결과 상태코드) : <?php echo $result[$i]->ntsresultCode ?></li>
    								<li> ntsresultMessage (국세청 처리결과 메시지) : <?php echo $result[$i]->ntsresultMessage ?></li>
                    <li> orgTradeDate (원본 현금영수증 거래일자) : <?php echo $result[$i]->orgTradeDate ?></li>
    								<li> orgConfirmNum (원본 현금영수증 국세청승인번호) : <?php echo $result[$i]->orgConfirmNum ?></li>
									</ul>
								</fieldset>
					<?php
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
