<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="/Example.css" media="screen"/>
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
    /**
     * 접수한 팩스 전송건에 대한 미리보기 팝업 URL을 반환합니다.
     * - 반환된 URL은 보안정책에 따라 30초의 유효시간을 갖습니다.
     * - https://docs.popbill.com/fax/php/api#GetPreviewURL
     */

    include 'common.php';

    // 팝빌 회원 사업자 번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    // 팩스전송 접수번호
    $ReceiptNum = '018091015373100001';

    // 팝빌 회원 아이디
    $testUserID = 'testkorea';

    try {
        $url = $FaxService->GetPreviewURL($testCorpNum,$ReceiptNum,$testUserID);
    } catch (PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
<body>
<div id="content">
    <p class="heading1">Response</p>
    <br/>
    <fieldset class="fieldset1">
        <legend>팩스 미리보기 팝업 URL</legend>
        <ul>
          <?php
          if (isset($url)) {
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
