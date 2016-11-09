<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 1건의 세금계산서 상세정보를 확인합니다.
  * - 응답항목에 대한 자세한 사항은 "[전자세금계산서 API 연동매뉴얼] > 4.1 (세금)계산서 구성" 을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원, 사업자번호
	$testCorpNum = '1234567890';

  // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
  $mgtKeyType = ENumMgtKeyType::SELL;

  // 세금계산서 문서관리번호
	$mgtKey = '20161109-02';

	try {
		$result = $TaxinvoiceService->GetDetailInfo($testCorpNum, $mgtKeyType, $mgtKey);
	} catch(PopbillException $pe) {
		$code = $pe->getCode();
		$message = $pe->getMessage();
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>세금계산서 상세정보 확인</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
							<li> writeDate  : <?= $result->writeDate  ?> </li>
							<li> chargeDirection  : <?= $result->chargeDirection  ?> </li>
							<li> issueType  : <?= $result->issueType  ?> </li>
							<li> issueTiming  : <?= $result->issueTiming  ?> </li>
							<li> taxType  : <?= $result->taxType  ?> </li>
							<li> invoicerCorpNum  : <?= $result->invoicerCorpNum ?> </li>
							<li> invoicerMgtKey  : <?= $result->invoicerMgtKey  ?> </li>
							<li> invoicerCorpName  : <?= $result->invoicerCorpName  ?> </li>
							<li> invoicerCEOName  : <?= $result->invoicerCEOName  ?> </li>
							<li> invoicerAddr  : <?= $result->invoicerAddr  ?> </li>
							<li> invoicerContactName  : <?= $result->invoicerContactName  ?> </li>
							<li> invoicerTEL  : <?= $result->invoicerTEL  ?> </li>
							<li> invoicerHP  : <?= $result->invoicerHP  ?> </li>
							<li> invoicerEmail  : <?= $result->invoicerEmail  ?> </li>
							<li> invoicerSMSSendYN  : <?= $result->invoicerSMSSendYN  ?> </li>
							<li> invoiceeCorpNum  : <?= $result->invoiceeCorpNum  ?> </li>
							<li> invoiceeType  : <?= $result->invoiceeType ?>  </li>
							<li> invoiceeMgtKey  : <?= $result->invoiceeMgtKey  ?> </li>
							<li> invoiceeCorpName  : <?= $result->invoiceeCorpName  ?> </li>
							<li> invoiceeCEOName  : <?= $result->invoiceeCEOName  ?> </li>
							<li> invoiceeAddr  : <?= $result->invoiceeAddr  ?> </li>
							<li> invoiceeContactName1  : <?= $result->invoiceeContactName1  ?> </li>
							<li> invoiceeTEL1  : <?= $result->invoiceeTEL1  ?> </li>
							<li> invoiceeHP1  : <?= $result->invoiceeHP1  ?> </li>
							<li> invoiceeEmail1  : <?= $result->invoiceeEmail1 ?> </li>
							<li> invoiceeSMSSendYN  : <?= $result->invoiceeSMSSendYN  ?> </li>
							<li> trusteeSMSSendYN  : <?= $result->trusteeSMSSendYN  ?> </li>
							<li> taxTotal  : <?= $result->taxTotal ?>  </li>
							<li> supplyCostTotal  : <?= $result->supplyCostTotal  ?> </li>
							<li> totalAmount  : <?= $result->totalAmount  ?> </li>
							<li> purposeType  : <?= $result->purposeType  ?> </li>
							<li> serialNum  : <?= $result->serialNum ?>  </li>
							<li> remark1  : <?= $result->remark1 ?>  </li>
							<li> remark2  : <?= $result->remark2  ?> </li>
							<li> remark3  : <?= $result->remark3  ?> </li>
							<li> kwon  : <?= $result->kwon  ?> </li>
							<li> ho  : <?= $result->ho  ?> </li>
							<li> businessLicenseYN  : <?= $result->businessLicenseYN  ?> </li>
							<li> bankBookYN  : <?= $result->bankBookYN  ?> </li>
							<li> faxsendYN  : <?= $result->faxsendYN  ?> </li>
							<li> ntsconfirmNum  : <?= $result->ntsconfirmNum  ?> </li>
					<?

							if ( isset($result->detailList) ) {
								for ( $i = 0; $i < Count($result->detailList); $i++){
									?>
									<fieldset class="fieldset2">
										<legend> detailList[<?= $i+1 ?>] </legend>
										<ul>
											<li> serialNum : <?= $result->detailList[$i]->serialNum ?> </li>
											<li> purchaseDT : <?= $result->detailList[$i]->purchaseDT ?> </li>
											<li> itemName : <?= $result->detailList[$i]->itemName ?> </li>
											<li> spec : <?= $result->detailList[$i]->spec ?> </li>
											<li> qty : <?= $result->detailList[$i]->qty ?> </li>
											<li> unitCost : <?= $result->detailList[$i]->unitCost ?> </li>
											<li> supplyCost : <?= $result->detailList[$i]->supplyCost ?> </li>
											<li> tax : <?= $result->detailList[$i]->tax ?> </li>
											<li> remark : <?= $result->detailList[$i]->remark ?> </li>
										</ul>
									</fieldset>
									<?
								}
							}

							if ( isset($result->addContactList) ) {
								for ( $i = 0; $i < Count($result->addContactList); $i++){
						  ?>
									<fieldset class="fieldset2">
										<legend> addContactList[<?= $i+1 ?>] </legend>
										<ul>
											<li> serialNum : <?= $result->addContactList[$i]->serialNum ?> </li>
											<li> email : <?= $result->addContactList[$i]->email ?> </li>
											<li> contactName : <?= $result->addContactList[$i]->contactName ?> </li>
										</ul>
									</fieldset>
						  <?
								}
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
