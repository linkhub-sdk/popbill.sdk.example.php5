<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="/Example.css" media="screen"/>
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
    /**
     * 팝빌에 로그인 상태로 접근할 수 있는 팝업 URL을 반환합니다.
     * 반환된 URL의 유지시간은 30초이며, 제한된 시간 이후에는 정상적으로 처리되지 않습니다.
     * - https://docs.popbill.com/message/php/api#GetAccessURL
     */

    include 'common.php';

    // 팝빌 회원 사업자 번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    // 팝빌 회원 아이디
    $testUserID = 'testkorea';

    try {
        $url = $MessagingService->GetAccessURL($testCorpNum, $testUserID);
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
        <legend>팝빌 로그인 URL</legend>
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
