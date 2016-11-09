<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 세금계산서에 첨부된 파일을 삭제합니다.
  * - 파일을 식별하는 파일아이디는 첨부파일 목록(GetFileList API) 의 응답항목 중
  *   파일아이디(AttachedFile) 값을 통해 확인할 수 있습니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌회원 아이디
	$testUserID = 'testkorea';

  // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
  $mgtKeyType = ENumMgtKeyType::SELL;

  // 문서관리번호
	$mgtKey = '20161103-01';

  // 삭제할 첨부파일 아이디, getFiles(첨부파일목록) API 응답전문에서 attachedFile 변수값 참조
	$FileID = 'F7635366-BABD-4951-BF45-62025A6F4515.PBF';

	try {
		$result = $TaxinvoiceService->DeleteFile($testCorpNum, $mgtKeyType, $mgtKey, $FileID, $testUserID);
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
				<legend>첨부파일 삭제</legend>
				<ul>
					<li>Response.code : <?= $code ?></li>
					<li>Response.message : <?= $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
