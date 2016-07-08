<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호, "-"제외 10자리

	try {
		$result = $MessagingService->GetAutoDenyList($testCorpNum);
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
				<legend>080 수신거부목록 확인</legend>
				<ul>
					<?
						if ( isset( $result ) ) { 
          ?>
              <fieldset class="fieldset2">
              <ul>
          <?
              for ( $i = 0; $i < Count ( $result ) ; $i++) { 
					?>
                <li>
          <?
                foreach($result[$i] as $number=>$regDT) {
          ?>
							  <? echo $number ?> : <? echo $regDT?> 
          <?
                }
             
          ?>
                </li>
  				<?
            }
          ?>

            </ul>
            </fieldset>
          <?
						} else {
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>