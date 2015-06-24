<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호, "-"제외 10자리
	$testUserID = 'testkorea';		# 팝빌회원 아이디
	$itemCode = '121';				# 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)					
	$mgtKey = '20150624-01';		# 문서관리번호

	try {
		$result = $StatementService->GetDetailInfo($testCorpNum, $itemCode, $mgtKey, $testUserID);
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
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
					?>
							<li> itemCode : <? echo $result->itemCode ?> </li>
							<li> mgtKey : <? echo $result->mgtKey ?> </li>			
							<li> invoiceNum : <? echo $result->invoiceNum ?> </li>			
							<li> formCode : <? echo $result->formCode ?> </li>			
							<li> writeDate : <? echo $result->writeDate ?> </li>			
							<li> taxType : <? echo $result->taxType  ?> </li>			

							<li> senderCorpNum : <? echo $result->senderCorpNum ?> </li>			
							<li> senderTaxRegID : <? echo $result->senderTaxRegID ?> </li>			
							<li> senderCorpName : <? echo $result->senderCEOName ?> </li>			
							<li> senderCEOName : <? echo $result->senderCEOName ?> </li>			
							<li> senderAddr : <? echo $result->senderAddr ?> </li>			
							<li> senderBizClass : <? echo $result->senderBizClass ?> </li>			
							<li> senderBizType : <? echo $result->senderBizType ?> </li>			
							<li> senderContactName : <? echo $result->senderContactName ?> </li>			
							<li> senderDeptName : <? echo $result->senderDeptName ?> </li>			
							<li> senderTEL : <? echo $result->senderTEL ?> </li>			
							<li> senderHP : <? echo $result->senderHP ?> </li>			
							<li> senderEmail : <? echo $result->senderEmail ?> </li>			
							<li> senderFAX : <? echo $result->senderFAX ?> </li>			

							<li> receiverCorpNum : <? echo $result->receiverCorpNum ?> </li>			
							<li> receiverTaxRegID : <? echo $result->receiverTaxRegID ?> </li>			
							<li> receiverCorpName : <? echo $result->receiverCorpName ?> </li>			
							<li> receiverCEOName : <? echo $result->receiverCEOName ?> </li>			
							<li> receiverAddr : <? echo $result->receiverAddr ?> </li>			
							<li> receiverBizClass : <? echo $result->receiverBizClass ?> </li>			
							<li> receiverBizType : <? echo $result->receiverBizType ?> </li>			
							<li> receiverContactName : <? echo $result->receiverContactName ?> </li>			
							<li> receiverDeptName : <? echo $result->receiverDeptName ?> </li>			
							<li> receiverTEL : <? echo $result->receiverTEL ?> </li>			
							<li> receiverHP : <? echo $result->receiverHP ?> </li>			
							<li> receiverEmail : <? echo $result->receiverEmail ?> </li>			
							<li> receiverFAX : <? echo $result->receiverFAX ?> </li>			

							<li> taxTotal : <? echo $result->taxTotal ?> </li>			
							<li> supplyCostTotal : <? echo $result->supplyCostTotal ?> </li>
							<li> totalAmount : <? echo $result->totalAmount ?> </li>
							<li> purposeType : <? echo $result->purposeType ?> </li>
							<li> serialNum : <? echo $result->serialNum ?> </li>
							<li> remark1 : <? echo $result->remark1 ?> </li>
							<li> remark2 : <? echo $result->remark2 ?> </li>
							<li> remark3 : <? echo $result->remark3 ?> </li>
							<li> businessLicenseYN : <? echo $result->businessLicenseYN ?> </li>
							<li> bankBookYN : <? echo $result->bankBookYN ?> </li>
							<li> faxsendYN : <? echo $result->faxsendYN ?> </li>
							<li> smssendYN : <? echo $result->smssendYN ?> </li>
							<li> autoacceptYN : <? echo $result->autoacceptYN ?> </li>
						
					<?
							if(!is_null($result->detailList)){	
								for($i=0;$i<Count($result->detailList);$i++){
					?>
								<fieldset class="fieldset2">
									<legend>detailList <?echo $i+1 ?></legend>
										<ul>	
											<li> serialNum : <? echo $result->detailList[$i]->serialNum ?> </li>
											<li> purchaseDT : <? echo $result->detailList[$i]->purchaseDT ?> </li>
											<li> itemName : <? echo $result->detailList[$i]->itemName ?> </li>
											<li> spec : <? echo $result->detailList[$i]->spec ?> </li>
											<li> unit : <? echo $result->detailList[$i]->unit ?> </li>
											<li> qty : <? echo $result->detailList[$i]->qty ?> </li>
											<li> unitCost : <? echo $result->detailList[$i]->unitCost ?> </li>
											<li> supplyCost : <? echo $result->detailList[$i]->supplyCost ?> </li>
											<li> tax : <? echo $result->detailList[$i]->tax ?> </li>
											<li> remark : <? echo $result->detailList[$i]->remark ?> </li>
											<li> spare1 : <? echo $result->detailList[$i]->spare1 ?> </li>
											<li> spare2 : <? echo $result->detailList[$i]->spare2 ?> </li>
											<li> spare3 : <? echo $result->detailList[$i]->spare3 ?> </li>
											<li> spare4 : <? echo $result->detailList[$i]->spare4 ?> </li>
											<li> spare5 : <? echo $result->detailList[$i]->spare5 ?> </li>
										</ul>
								</fieldset>
					<?
								}
							}

							if(!is_null($result->propertyBag)){

					?>
								<fieldset class="fieldset2">
									<legend>propertyBag</legend>
									<ul>
					<?
										foreach ($result->propertyBag as $key=>$data){
					?>
											<li> <? echo $key ?> : <? echo $data ?> </li>								
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