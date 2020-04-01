<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * 세금계산서 PDF 파일을 byte 배열로 반환합니다.
     * - https://docs.popbill.com/taxinvoice/php/api#GetPDF
     */

    include 'common.php';

    // 팝빌 회원 사업자 번호, '-'제외 10자리
    $testCorpNum = '1234567890';

    // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
    $mgtKeyType = ENumMgtKeyType::SELL;

    // 문서번호
    $mgtKey = '20200401-01';

    // PDF 파일경로, PDF 파일을 저장할 폴더에 777 권한 필요.
    $pdfFilePath = './'.$mgtKey.'.pdf';

    try {
        $bytes = $TaxinvoiceService->GetPDF($testCorpNum, $mgtKeyType, $mgtKey);
    }
    catch(PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }

    if(file_put_contents( $pdfFilePath, $bytes )){
      $code = 1;
      $message = $pdfFilePath;
    };

?>
  <body>
    <div id="content">
      <p class="heading1">Response</p>
      <br/>
      <fieldset class="fieldset1">
        <legend>전자세금계산서 PDF 저장 </legend>
        <ul>
          <li>Response.code : <?php echo $code ?></li>
          <li>Response.message : <?php echo $message ?></li>
        </ul>
      </fieldset>
     </div>
  </body>
</html>
