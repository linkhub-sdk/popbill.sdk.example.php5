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
	$mgtKey = '20150203-01';				# 문서관리번호

	try {
		$result = $TaxinvoiceService->GetInfo($testCorpNum, $mgtKeyType, $mgtKey);
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
				<legend>세금계산서 요약정보 및 상태정보 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>

					<?
						} else {

					?>
							<li>itemKey : <? echo $result->itemKey ; ?></li>
							<li>stateCode : <? echo $result->stateCode ; ?></li>
							<li>taxType : <? echo $result->taxType ; ?></li>
							<li>purposeType : <? echo $result->purposeType ; ?></li>
							<li>modifyCode : <? echo $result->modifyCode ; ?></li>
							<li>issueType : <? echo $result->issueType ; ?></li>
							<li>writeDate : <? echo $result->writeDate ; ?></li>
							<li>invoicerCorpName : <? echo $result->invoicerCorpName ; ?></li>
							<li>invoicerCorpNum : <? echo $result->invoicerCorpNum ; ?></li>
							<li>invoicerMgtKey : <? echo $result->invoicerMgtKey ; ?></li>
							<li>invoiceeCorpName : <? echo $result->invoiceeCorpName ; ?></li>
							<li>invoiceeMgtKey : <? echo $result->invoiceeMgtKey ; ?></li>
							<li>trusteeCorpName : <? echo $result->trusteeCorpName ; ?></li>
							<li>trusteeCorpNum : <? echo $result->trusteeCorpNum ; ?></li>
							<li>trusteeMgtKey : <? echo $result->trusteeMgtKey ; ?></li>
							<li>supplyCostTotal : <? echo $result->supplyCostTotal ; ?></li>
							<li>taxTotal : <? echo $result->taxTotal ; ?></li>
							<li>issueDT : <? echo $result->issueDT ; ?></li>
							<li>preIssueDT : <? echo $result->preIssueDT ; ?></li>
							<li>stateDT : <? echo $result->stateDT ; ?></li>
							<li>openYN : <? echo $result->openYN ; ?></li>
							<li>openDT : <? echo $result->openDT ; ?></li>
							<li>ntsresult : <? echo $result->ntsresult ; ?></li>
							<li>ntsconfirmNum : <? echo $result->ntsconfirmNum ; ?></li>
							<li>ntssendDT : <? echo $result->ntssendDT ; ?></li>
							<li>ntsresultDT : <? echo $result->ntsresultDT ; ?></li>
							<li>ntssendErrCode : <? echo $result->ntssendErrCode ; ?></li>
							<li>stateMemo : <? echo $result->stateMemo ; ?></li>

					<?
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
