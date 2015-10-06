<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';		# 팝빌회원 사업자번호, '-'제외 10자리
	$testUserID = 'testkorea';			# 팝빌회원 아이디

	try {
		$result = $StatementService->ListContact($testCorpNum,$testUserID);
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
				<legend>담당자 목록 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
						<li>Response.code : <? $code ?> </li>
						<li>Response.message : <? $message ?></li>
					<?
						} else {
							for ($i = 0; $i < Count($result); $i++) { 
					?>
							<fieldset class="fieldset2">
							<legend> 담당자 정보 [<? echo $i+1?>]</legend>
							<ul>
								<li>id : <? echo $result[$i]->id ; ?></li>
								<li>email : <? echo $result[$i]->email ; ?></li>
								<li>hp : <? echo $result[$i]->hp ; ?></li>
								<li>personName : <? echo $result[$i]->personName ; ?></li>
								<li>searchAllAllowYN : <? echo $result[$i]->searchAllAllowYN ; ?></li>
								<li>tel : <? echo $result[$i]->tel ; ?></li>
								<li>fax : <? echo $result[$i]->fax ; ?></li>
								<li>mgrYN : <? echo $result[$i]->mgrYN ; ?></li>
								<li>regDT : <? echo $result[$i]->regDT ; ?></li>
								
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