<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';			# 팝빌회원 사업자번호, '-'제외 10자리
	$mgtKeyType = ENumMgtKeyType::SELL;		# 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TURSTT:위수탁

	$MgtKeyList = array(					# 문서관리번호 배열, 최대 1000건
			'20150211-01',
			'20150211-02',
			'20151001-01',
	);

	try {
		$result = $TaxinvoiceService->GetInfos($testCorpNum, $mgtKeyType, $MgtKeyList);
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
				<legend>세금계산서 요약정보 대량 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
						<li>Response.code : <? echo $code ?> </li>
						<li>Response.message : <? echo $message ?></li>
					<?
						} else {
							for ($i = 0; $i < Count($result); $i++) { 
					?>
							<fieldset class="fieldset2">
							<legend> 세금계산서 요약정보[<? echo $i+1?>]</legend>
							<ul>
								<li>itemKey : <? echo $result[$i]->itemKey ; ?></li>
								<li>stateCode : <? echo $result[$i]->stateCode ; ?></li>
								<li>taxType : <? echo $result[$i]->taxType ; ?></li>
								<li>purposeType : <? echo $result[$i]->purposeType ; ?></li>
								<li>modifyCode : <? echo $result[$i]->modifyCode ; ?></li>
								<li>issueType : <? echo $result[$i]->issueType ; ?></li>
								<li>lateIssueYN : <? echo $result[$i]->lateIssueYN ; ?></li>
								<li>writeDate : <? echo $result[$i]->writeDate ; ?></li>
								<li>invoicerCorpName : <? echo $result[$i]->invoicerCorpName ; ?></li>
								<li>invoicerCorpNum : <? echo $result[$i]->invoicerCorpNum ; ?></li>
								<li>invoicerMgtKey : <? echo $result[$i]->invoicerMgtKey ; ?></li>
								<li>invoicerPrintYN : <? echo $result[$i]->invoicerMgtKey ; ?></li>
								<li>invoiceeCorpName : <? echo $result[$i]->invoiceeCorpName ; ?></li>
								<li>invoiceeCorpNum : <? echo $result[$i]->invoiceeCorpNum ; ?></li>
								<li>invoiceeMgtKey : <? echo $result[$i]->invoiceeMgtKey ; ?></li>
								<li>invoiceePrintYN : <? echo $result[$i]->invoiceeMgtKey ; ?></li>
								<li>trusteeCorpName : <? echo $result[$i]->trusteeCorpName ; ?></li>
								<li>trusteeCorpNum : <? echo $result[$i]->trusteeCorpNum ; ?></li>
								<li>trusteeMgtKey : <? echo $result[$i]->trusteeMgtKey ; ?></li>
								<li>trusteePrintYN : <? echo $result[$i]->trusteePrintYN ; ?></li>
								<li>supplyCostTotal : <? echo $result[$i]->supplyCostTotal ; ?></li>
								<li>taxTotal : <? echo $result[$i]->taxTotal ; ?></li>
								<li>issueDT : <? echo $result[$i]->issueDT ; ?></li>
								<li>preIssueDT : <? echo $result[$i]->preIssueDT ; ?></li>
								<li>stateDT : <? echo $result[$i]->stateDT ; ?></li>
								<li>openYN : <? echo $result[$i]->openYN ; ?></li>
								<li>openDT : <? echo $result[$i]->openDT ; ?></li>
								<li>ntsresult : <? echo $result[$i]->ntsresult ; ?></li>
								<li>ntsconfirmNum : <? echo $result[$i]->ntsconfirmNum ; ?></li>
								<li>ntssendDT : <? echo $result[$i]->ntssendDT ; ?></li>
								<li>ntsresultDT : <? echo $result[$i]->ntsresultDT ; ?></li>
								<li>ntssendErrCode : <? echo $result[$i]->ntssendErrCode ; ?></li>
								<li>stateMemo : <? echo $result[$i]->stateMemo ; ?></li>
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