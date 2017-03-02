<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 전자명세서 1건의 상세정보를 조회합니다.
  * - 응답항목에 대한 자세한 사항은 "[전자명세서 API 연동매뉴얼] > 4.1.
  *   전자명세서 구성" 을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, "-"제외 10자리
	$testCorpNum = '1234567890';

  // 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$itemCode = '121';

  // 문서관리번호
	$mgtKey = '20170302-04';

	try {
		$result = $StatementService->GetDetailInfo($testCorpNum, $itemCode, $mgtKey);
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
				<legend>전자명세서 상세정보 확인</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
							<li> itemCode : <?= $result->itemCode ?> </li>
							<li> mgtKey : <?= $result->mgtKey ?> </li>
							<li> invoiceNum : <?= $result->invoiceNum ?> </li>
							<li> formCode : <?= $result->formCode ?> </li>
							<li> writeDate : <?= $result->writeDate ?> </li>
							<li> taxType : <?= $result->taxType  ?> </li>

							<li> senderCorpNum : <?= $result->senderCorpNum ?> </li>
							<li> senderTaxRegID : <?= $result->senderTaxRegID ?> </li>
							<li> senderCorpName : <?= $result->senderCEOName ?> </li>
							<li> senderCEOName : <?= $result->senderCEOName ?> </li>
							<li> senderAddr : <?= $result->senderAddr ?> </li>
							<li> senderBizClass : <?= $result->senderBizClass ?> </li>
							<li> senderBizType : <?= $result->senderBizType ?> </li>
							<li> senderContactName : <?= $result->senderContactName ?> </li>
							<li> senderDeptName : <?= $result->senderDeptName ?> </li>
							<li> senderTEL : <?= $result->senderTEL ?> </li>
							<li> senderHP : <?= $result->senderHP ?> </li>
							<li> senderEmail : <?= $result->senderEmail ?> </li>
							<li> senderFAX : <?= $result->senderFAX ?> </li>

							<li> receiverCorpNum : <?= $result->receiverCorpNum ?> </li>
							<li> receiverTaxRegID : <?= $result->receiverTaxRegID ?> </li>
							<li> receiverCorpName : <?= $result->receiverCorpName ?> </li>
							<li> receiverCEOName : <?= $result->receiverCEOName ?> </li>
							<li> receiverAddr : <?= $result->receiverAddr ?> </li>
							<li> receiverBizClass : <?= $result->receiverBizClass ?> </li>
							<li> receiverBizType : <?= $result->receiverBizType ?> </li>
							<li> receiverContactName : <?= $result->receiverContactName ?> </li>
							<li> receiverDeptName : <?= $result->receiverDeptName ?> </li>
							<li> receiverTEL : <?= $result->receiverTEL ?> </li>
							<li> receiverHP : <?= $result->receiverHP ?> </li>
							<li> receiverEmail : <?= $result->receiverEmail ?> </li>
							<li> receiverFAX : <?= $result->receiverFAX ?> </li>

							<li> taxTotal : <?= $result->taxTotal ?> </li>
							<li> supplyCostTotal : <?= $result->supplyCostTotal ?> </li>
							<li> totalAmount : <?= $result->totalAmount ?> </li>
							<li> purposeType : <?= $result->purposeType ?> </li>
							<li> serialNum : <?= $result->serialNum ?> </li>
							<li> remark1 : <?= $result->remark1 ?> </li>
							<li> remark2 : <?= $result->remark2 ?> </li>
							<li> remark3 : <?= $result->remark3 ?> </li>
							<li> businessLicenseYN : <?= $result->businessLicenseYN ?> </li>
							<li> bankBookYN : <?= $result->bankBookYN ?> </li>
							<li> faxsendYN : <?= $result->faxsendYN ?> </li>
							<li> smssendYN : <?= $result->smssendYN ?> </li>
							<li> autoacceptYN : <?= $result->autoacceptYN ?> </li>

					<?
							if ( !is_null($result->detailList) ) {
								for ( $i = 0; $i < Count($result->detailList); $i++){
					?>
								<fieldset class="fieldset2">
									<legend>detailList <?= $i+1 ?></legend>
										<ul>
											<li> serialNum : <?= $result->detailList[$i]->serialNum ?> </li>
											<li> purchaseDT : <?= $result->detailList[$i]->purchaseDT ?> </li>
											<li> itemName : <?= $result->detailList[$i]->itemName ?> </li>
											<li> spec : <?= $result->detailList[$i]->spec ?> </li>
											<li> unit : <?= $result->detailList[$i]->unit ?> </li>
											<li> qty : <?= $result->detailList[$i]->qty ?> </li>
											<li> unitCost : <?= $result->detailList[$i]->unitCost ?> </li>
											<li> supplyCost : <?= $result->detailList[$i]->supplyCost ?> </li>
											<li> tax : <?= $result->detailList[$i]->tax ?> </li>
											<li> remark : <?= $result->detailList[$i]->remark ?> </li>
											<li> spare1 : <?= $result->detailList[$i]->spare1 ?> </li>
											<li> spare2 : <?= $result->detailList[$i]->spare2 ?> </li>
											<li> spare3 : <?= $result->detailList[$i]->spare3 ?> </li>
											<li> spare4 : <?= $result->detailList[$i]->spare4 ?> </li>
											<li> spare5 : <?= $result->detailList[$i]->spare5 ?> </li>
										</ul>
								</fieldset>
					<?
								}
							}
							if ( !is_null($result->propertyBag) ) {

					?>
								<fieldset class="fieldset2">
									<legend>propertyBag</legend>
									<ul>
					<?
										foreach ($result->propertyBag as $key=>$data){
					?>
											<li> <?= $key ?> : <?= $data ?> </li>
					<?
								}
					?>
									</ul>
					<?
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
