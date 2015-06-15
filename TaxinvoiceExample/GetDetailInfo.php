<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';			# 팝빌회원, 사업자번호
	$mgtKeyType = ENumMgtKeyType::SELL;		# 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TURSTT:위수탁
	$mgtKey = '20150210-01';				# 문서관리번호

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
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
					?>
							<li> writeSpecification : <? echo $result->writeSpecification ?> </li>
							<li> writeDate  : <? echo $result->writeDate  ?> </li>
							<li> chargeDirection  : <? echo $result->chargeDirection  ?> </li>
							<li> issueType  : <? echo $result->issueType  ?> </li>
							<li> issueTiming  : <? echo $result->issueTiming  ?> </li>
							<li> taxType  : <? echo $result->taxType  ?> </li>
							<li> invoicerCorpNum  : <? echo $result->invoicerCorpNum ?> </li>
							<li> invoicerMgtKey  : <? echo $result->invoicerMgtKey  ?> </li>
							<li> invoicerCorpName  : <? echo $result->invoicerCorpName  ?> </li>
							<li> invoicerCEOName  : <? echo $result->invoicerCEOName  ?> </li>
							<li> invoicerAddr  : <? echo $result->invoicerAddr  ?> </li>
							<li> invoicerContactName  : <? echo $result->invoicerContactName  ?> </li>
							<li> invoicerTEL  : <? echo $result->invoicerTEL  ?> </li>
							<li> invoicerHP  : <? echo $result->invoicerHP  ?> </li>
							<li> invoicerEmail  : <? echo $result->invoicerEmail  ?> </li>
							<li> invoicerSMSSendYN  : <? echo $result->invoicerSMSSendYN  ?> </li>
							<li> invoiceeCorpNum  : <? echo $result->invoiceeCorpNum  ?> </li>
							<li> invoiceeType  : <? echo $result->invoiceeType ?>  </li>
							<li> invoiceeMgtKey  : <? echo $result->invoiceeMgtKey  ?> </li>
							<li> invoiceeCorpName  : <? echo $result->invoiceeCorpName  ?> </li>
							<li> invoiceeCEOName  : <? echo $result->invoiceeCEOName  ?> </li>
							<li> invoiceeAddr  : <? echo $result->invoiceeAddr  ?> </li>
							<li> invoiceeContactName1  : <? echo $result->invoiceeContactName1  ?> </li>
							<li> invoiceeTEL1  : <? echo $result->invoiceeTEL1  ?> </li>
							<li> invoiceeHP1  : <? echo $result->invoiceeHP1  ?> </li>
							<li> invoiceeEmail1  : <? echo $result->invoiceeEmail1 ?> </li>
							<li> invoiceeSMSSendYN  : <? echo $result->invoiceeSMSSendYN  ?> </li>
							<li> trusteeSMSSendYN  : <? echo $result->trusteeSMSSendYN  ?> </li>
							<li> taxTotal  : <? echo $result->taxTotal ?>  </li>
							<li> supplyCostTotal  : <? echo $result->supplyCostTotal  ?> </li>
							<li> totalAmount  : <? echo $result->totalAmount  ?> </li>
							<li> purposeType  : <? echo $result->purposeType  ?> </li>
							<li> serialNum  : <? echo $result->serialNum ?>  </li>
							<li> remark1  : <? echo $result->remark1 ?>  </li>
							<li> remark2  : <? echo $result->remark2  ?> </li>
							<li> remark3  : <? echo $result->remark3  ?> </li>
							<li> kwon  : <? echo $result->kwon  ?> </li>
							<li> ho  : <? echo $result->ho  ?> </li>
							<li> businessLicenseYN  : <? echo $result->businessLicenseYN  ?> </li>
							<li> bankBookYN  : <? echo $result->bankBookYN  ?> </li>
							<li> faxsendYN  : <? echo $result->faxsendYN  ?> </li>
							<li> ntsconfirmNum  : <? echo $result->ntsconfirmNum  ?> </li>
					<?

							if (isset($result->detailList)){
								for ($i=0; $i < Count($result->detailList); $i++){
									?>
									<fieldset class="fieldset2">
										<legend> detailList[<? echo $i+1 ?>] </legend>
										<ul>
											<li> serialNum : <? echo $result->detailList[$i]->serialNum ?> </li>
											<li> purchaseDT : <? echo $result->detailList[$i]->purchaseDT ?> </li>
											<li> itemName : <? echo $result->detailList[$i]->itemName ?> </li>
											<li> spec : <? echo $result->detailList[$i]->spec ?> </li>
											<li> qty : <? echo $result->detailList[$i]->qty ?> </li>
											<li> unitCost : <? echo $result->detailList[$i]->unitCost ?> </li>
											<li> supplyCost : <? echo $result->detailList[$i]->supplyCost ?> </li>
											<li> tax : <? echo $result->detailList[$i]->tax ?> </li>
											<li> remark : <? echo $result->detailList[$i]->remark ?> </li>
										</ul>
									</fieldset>
									<?
								}
							}

							if (isset($result->addContactList)){
								for ($i=0; $i < Count($result->addContactList); $i++){
						?>
									<fieldset class="fieldset2">
										<legend> addContactList[<? echo $i+1 ?>] </legend>
										<ul>
											<li> serialNum : <? echo $result->addContactList[$i]->serialNum ?> </li>
											<li> email : <? echo $result->addContactList[$i]->email ?> </li>
											<li> contactName : <? echo $result->addContactList[$i]->contactName ?> </li>
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