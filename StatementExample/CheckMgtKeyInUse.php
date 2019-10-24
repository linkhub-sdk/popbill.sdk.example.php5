<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * 전자명세서 문서번호 중복여부를 확인합니다.
     * - 관리번호는 1~24자리로 숫자, 영문 '-', '_' 조합하여 사업자별로 중복되지 않도록 구성해야합니다.
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    // 명세서 종류코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
    $itemCode = '121';

    // 문서번호, 1~24자리
    $mgtKey = '20190101-001';

    try {
        $result = $StatementService->CheckMgtKeyInUse($testCorpNum ,$itemCode, $mgtKey);
        $result ? $result = '사용중' : $result = '미사용중';
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
				<legend>문서번호 사용여부 확인</legend>
				<ul>
					<?php
						if ( isset($code) ) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
					?>
							<li>문서번호 사용여부 : <?php echo $result ?></li>
					<?php
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
