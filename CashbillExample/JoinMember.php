<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$joinForm = new JoinForm();

	$joinForm->LinkID 		= $LinkID;				# 연동아이디 
	$joinForm->CorpNum 		= '1234567890';			# 사업자번호, "-"제외 10자리
	$joinForm->CEOName 		= '대표자성명';			# 대표자성명
	$joinForm->CorpName 	= '테스트사업자상호';	# 사업자상호
	$joinForm->Addr			= '테스트사업자주소';	# 사업자주소
	$joinForm->ZipCode		= '사업장우편번호';		# 사업장 우편번호
	$joinForm->BizType		= '업태';				# 업태
	$joinForm->BizClass		= '업종';				# 업종
	$joinForm->ContactName	= '담당자상명';			# 담당자명
	$joinForm->ContactEmail	= 'tester@test.com';	# 담당자 이메일
	$joinForm->ContactTEL	= '07075106766';		# 담당자 연락처
	$joinForm->ID			= 'userid_phpdd';		# 아이디, 6자 이상 20자미만
	$joinForm->PWD			= 'thisispassword';		# 비밀번호, 6자 이상 20자미만

	try
	{
		$result = $CashbillService->JoinMember($joinForm);
		$code = $result->code;
		$message = $result->message;
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
				<legend>연동회원 가입 여부 확인 결과</legend>
				<ul>
					<li>Response.code : <? echo $code ?></li>
					<li>Response.message : <? echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>