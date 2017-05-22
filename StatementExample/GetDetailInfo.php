<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
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
	$mgtKey = '20170223-01';

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
					<?php
						if ( isset($code) ) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
					?>
							<li> itemCode : <?php echo $result->itemCode ?> </li>
							<li> mgtKey : <?php echo $result->mgtKey ?> </li>
							<li> invoiceNum : <?php echo $result->invoiceNum ?> </li>
							<li> formCode : <?php echo $result->formCode ?> </li>
							<li> writeDate : <?php echo $result->writeDate ?> </li>
							<li> taxType : <?php echo $result->taxType  ?> </li>

							<li> senderCorpNum : <?php echo $result->senderCorpNum ?> </li>
							<li> senderTaxRegID : <?php echo $result->senderTaxRegID ?> </li>
							<li> senderCorpName : <?php echo $result->senderCEOName ?> </li>
							<li> senderCEOName : <?php echo $result->senderCEOName ?> </li>
							<li> senderAddr : <?php echo $result->senderAddr ?> </li>
							<li> senderBizClass : <?php echo $result->senderBizClass ?> </li>
							<li> senderBizType : <?php echo $result->senderBizType ?> </li>
							<li> senderContactName : <?php echo $result->senderContactName ?> </li>
							<li> senderDeptName : <?php echo $result->senderDeptName ?> </li>
							<li> senderTEL : <?php echo $result->senderTEL ?> </li>
							<li> senderHP : <?php echo $result->senderHP ?> </li>
							<li> senderEmail : <?php echo $result->senderEmail ?> </li>
							<li> senderFAX : <?php echo $result->senderFAX ?> </li>

							<li> receiverCorpNum : <?php echo $result->receiverCorpNum ?> </li>
							<li> receiverTaxRegID : <?php echo $result->receiverTaxRegID ?> </li>
							<li> receiverCorpName : <?php echo $result->receiverCorpName ?> </li>
							<li> receiverCEOName : <?php echo $result->receiverCEOName ?> </li>
							<li> receiverAddr : <?php echo $result->receiverAddr ?> </li>
							<li> receiverBizClass : <?php echo $result->receiverBizClass ?> </li>
							<li> receiverBizType : <?php echo $result->receiverBizType ?> </li>
							<li> receiverContactName : <?php echo $result->receiverContactName ?> </li>
							<li> receiverDeptName : <?php echo $result->receiverDeptName ?> </li>
							<li> receiverTEL : <?php echo $result->receiverTEL ?> </li>
							<li> receiverHP : <?php echo $result->receiverHP ?> </li>
							<li> receiverEmail : <?php echo $result->receiverEmail ?> </li>
							<li> receiverFAX : <?php echo $result->receiverFAX ?> </li>

							<li> taxTotal : <?php echo $result->taxTotal ?> </li>
							<li> supplyCostTotal : <?php echo $result->supplyCostTotal ?> </li>
							<li> totalAmount : <?php echo $result->totalAmount ?> </li>
							<li> purposeType : <?php echo $result->purposeType ?> </li>
							<li> serialNum : <?php echo $result->serialNum ?> </li>
							<li> remark1 : <?php echo $result->remark1 ?> </li>
							<li> remark2 : <?php echo $result->remark2 ?> </li>
							<li> remark3 : <?php echo $result->remark3 ?> </li>
							<li> businessLicenseYN : <?php echo $result->businessLicenseYN ?> </li>
							<li> bankBookYN : <?php echo $result->bankBookYN ?> </li>
							<li> faxsendYN : <?php echo $result->faxsendYN ?> </li>
							<li> smssendYN : <?php echo $result->smssendYN ?> </li>
							<li> autoacceptYN : <?php echo $result->autoacceptYN ?> </li>
					<?php
							if ( !is_null($result->detailList) ) {
								for ( $i = 0; $i < Count($result->detailList); $i++){
					?>
								<fieldset class="fieldset2">
									<legend>detailList <?php echo $i+1 ?></legend>
										<ul>
											<li> serialNum : <?php echo $result->detailList[$i]->serialNum ?> </li>
											<li> purchaseDT : <?php echo $result->detailList[$i]->purchaseDT ?> </li>
											<li> itemName : <?php echo $result->detailList[$i]->itemName ?> </li>
											<li> spec : <?php echo $result->detailList[$i]->spec ?> </li>
											<li> unit : <?php echo $result->detailList[$i]->unit ?> </li>
											<li> qty : <?php echo $result->detailList[$i]->qty ?> </li>
											<li> unitCost : <?php echo $result->detailList[$i]->unitCost ?> </li>
											<li> supplyCost : <?php echo $result->detailList[$i]->supplyCost ?> </li>
											<li> tax : <?php echo $result->detailList[$i]->tax ?> </li>
											<li> remark : <?php echo $result->detailList[$i]->remark ?> </li>
											<li> spare1 : <?php echo $result->detailList[$i]->spare1 ?> </li>
											<li> spare2 : <?php echo $result->detailList[$i]->spare2 ?> </li>
											<li> spare3 : <?php echo $result->detailList[$i]->spare3 ?> </li>
											<li> spare4 : <?php echo $result->detailList[$i]->spare4 ?> </li>
											<li> spare5 : <?php echo $result->detailList[$i]->spare5 ?> </li>
										</ul>
								</fieldset>
					<?php
								}
							}
							if ( !is_null($result->propertyBag) ) {

					?>
								<fieldset class="fieldset2">
									<legend>propertyBag</legend>
									<ul>
					<?php
										foreach ($result->propertyBag as $key=>$data){
					?>
											<li> <?php echo $key ?> : <?php echo $data ?> </li>
					<?php
								}
					?>
									</ul>
					<?php
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
