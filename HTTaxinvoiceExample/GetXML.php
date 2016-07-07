<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

  # 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '4108600477';

  #국세청 승인번호
  $NTSConfirmNum = '201607044100002900000353';

  # 팝빌회원 아이디
	$testUserID = 'innoposttest';

	try {
		$result = $HTTaxinvoiceService->GetXML ( $testCorpNum, $NTSConfirmNum, $testUserID ) ;
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
				<legend>상세정보 확인 - XML</legend>
				<ul>
					<?
						if ( isset ( $code ) ) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
            <li>ResultCode (응답코드) : <?= $result->ResultCode ?></li>
						<li>Message (국세청승인번호) : <?= $result->Message ?></li>
            <li>retObject (전자세금계산서 XML문서) : <?= str_replace('<','&lt;', $result->retObject) ?></li>
            <!-- Browser에서 xml문서를 출력하기 위해 '<' &lt로 치환하였습니다. -->
				  <?
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
