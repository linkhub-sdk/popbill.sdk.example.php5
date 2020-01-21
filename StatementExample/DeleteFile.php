<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * 전자명세서에 첨부된 파일을 삭제합니다.
     * - 파일을 식별하는 파일아이디는 첨부파일 목록(GetFileList API) 의 응답항목
     *   중 파일아이디(AttachedFile) 값을 통해 확인할 수 있습니다.
     * - https://docs.popbill.com/statement/php/api#DeleteFile
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, '-' 제외 10자리
    $testCorpNum = '1234567890';

    // 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
    $itemCode = '121';

    // 문서번호
    $mgtKey = '20190101-001';

    // 첨부된 파일의 아이디, GetFiles API 응답항목중 AttachedFile 항목
    $FileID= 'A0450FBE-FF2D-43E7-ABAB-EFC17886C456.PBF';

    try {
        $result = $StatementService->DeleteFile($testCorpNum, $itemCode, $mgtKey, $FileID);
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
				<legend>첨부파일 삭제 </legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
