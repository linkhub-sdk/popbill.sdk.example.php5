<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
  /**
  *  홈택스 전자세금계산서 부서사용자 계정을 등록한다.
  */

	include 'common.php';

  // 사업자번호, "-"제외 10자리
	$testCorpNum = '1234567890';

  // 홈택스에서 생성한 전자세금계산서 부서사용자 아이디
	$deptUserID = 'userid_test';

  // 홈택스에서 생성한 전자세금계산서 부서사용자 비밀번호
	$deptUserPWD = 'passwd_test';

	try	{
		$result = $HTTaxinvoiceService->RegistDeptUser($testCorpNum, $deptUserID, $deptUserPWD);
		$code = $result->code;
		$message = $result->message;
	}
	catch (PopbillException $pe) {
		$code = $pe->getCode();
		$message = $pe->getMessage();
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>부서사용자 계정등록</legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
