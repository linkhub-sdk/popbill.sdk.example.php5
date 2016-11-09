<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 전자명세서에 첨부된 파일의 목록을 확인합니다.
  * - 응답항목 중 파일아이디(AttachedFile) 항목은 파일삭제(DeleteFile API)
  *   호출시 이용할 수 있습니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$itemCode = '121';

  // 문서관리번호
	$mgtKey = '20161109-03';

  // 팝빌회원 아이디
	$testUserID = 'testkorea';

	try {
		$result = $StatementService->GetFiles($testCorpNum, $itemCode, $mgtKey, $testUserID);
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
				<legend>전자명세서 첨부파일 목록 확인 </legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						} else {

						for ($i = 0; $i < Count($result) ; $i++) {
					?>
							<fieldset class ="fieldset2">
								<legend> 첨부파일 [<?= $i+1 ?>] </legend>
								<ul>
                  <li> serialNum : <?= $result[$i]->serialNum ?></li>
									<li> attachedFile : <?= $result[$i]->attachedFile ?></li>
									<li> displayName : <?= $result[$i]->displayName ?></li>
									<li> regDT : <?= $result[$i]->regDT ?></li>
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
