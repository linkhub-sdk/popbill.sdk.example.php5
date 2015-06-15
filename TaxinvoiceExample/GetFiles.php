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
	$mgtKey = '20150211-01';				# 문서관리번호

	try {
		$result = $TaxinvoiceService->GetFiles($testCorpNum, $mgtKeyType, $mgtKey);
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
				<legend>세금계산서 첨부파일 목록 확인 </legend>
				<ul>
					<?
						if(isset($code)) {
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {

						for ($i = 0; $i < Count($result) ; $i++) {
					?>
							<fieldset class ="fieldset2">
								<legend> 첨부파일 [<? echo $i+1 ?>] </legend>
								<ul>
									<li> serialNum : <? echo $result[$i]->serialNum; ?></li>
									<li> displayName : <? echo $result[$i]->displayName; ?></li>
									<li> attachedFile : <? echo $result[$i]->attachedFile; ?></li>
									<li> regDT : <? echo $result[$i]->regDT; ?></li>
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