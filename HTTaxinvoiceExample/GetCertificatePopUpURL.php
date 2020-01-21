<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * 홈택스연동 인증관리를 위한 URL을 반환합니다.
     * 인증방식에는 부서사용자/공인인증서 인증 방식이 있습니다.
     * - 반환된 URL은 보안정책에 따라 30초의 유효시간을 갖습니다.
     * - https://docs.popbill.com/httaxinvoice/php/api#GetCertificatePopUpURL
     */

    include 'common.php';

    // 팝빌 회원 사업자 번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    try {
        $url = $HTTaxinvoiceService->GetCertificatePopUpURL($testCorpNum);
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
				<legend>홈택스 인증정보 설정 팝업 URL</legend>
				<ul>
					<?php
						if ( isset ( $url ) ) {
					?>
							<li>url : <?php echo $url ?></li>
					<?php
						} else {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
