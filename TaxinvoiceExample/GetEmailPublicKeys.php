<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
	include 'common.php';

  // 팝빌 회원 사업자 번호, "-"제외 10자리
	$testCorpNum = '1234567890';

	try {
		$emailList = $TaxinvoiceService->GetEmailPublicKeys($testCorpNum);
	}
	catch ( PopbillException $pe ) {
		$code = $pe->getCode();
		$message = $pe->getMessage();
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>ASP사업자 유통메일 목록 확인</legend>
				<ul>
					<?
						if ( isset($emailList) ) {
							for ( $i = 0; $i < Count($emailList); $i++){
					?>
							 <fieldset class ="fieldset2">
							 <ul>
					<?
								foreach ( $emailList[$i] as $key=>$val) {
					?>
									<li> <?= $key; ?> : <?= $val; ?> </li>
					<?
								}
					?>
							</ul>
							</fieldset>
					<?
							}
						} else {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
