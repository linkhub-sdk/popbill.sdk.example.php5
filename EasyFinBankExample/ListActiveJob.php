<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /*
    * 1시간 이내 수집 요청 목록을 확인한다.
    * - https://docs.popbill.com/easyfinbank/php/api#ListActiveJob
    */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $testCorpNum = '1234567890';

    try {
        $result = $EasyFinBankService->ListActiveJob($testCorpNum);
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
            <legend>수집 상태 목록 확인</legend>
            <ul>
                <?php
                if ( isset($code)) {
                    ?>
                    <li>Response.code : <?php echo $code ?> </li>
                    <li>Response.message : <?php echo $message ?></li>
                    <?php
                } else {
                    for ( $i = 0; $i < Count ( $result ) ; $i++) {
                  ?>
                    <fieldset class="fieldset2">
                        <legend>수집 상태 [ <?php echo $i+1 ?> / <?php echo Count($result) ?> ]</legend>
                        <ul>
                            <li>jobID (작업아이디) : <?php echo $result[$i]->jobID ?></li>
                            <li>jobState (수집상태) : <?php echo $result[$i]->jobState ?></li>
                            <li>startDate (시작일자) : <?php echo $result[$i]->startDate ?></li>
                            <li>endDate (종료일자) : <?php echo $result[$i]->endDate ?></li>
                            <li>errorCode (오류코드) : <?php echo $result[$i]->errorCode ?></li>
                            <li>errorReason (오류메시지) : <?php echo $result[$i]->errorReason ?></li>
                            <li>jobStartDT (작업 시작일시) : <?php echo $result[$i]->jobStartDT ?></li>
                            <li>jobEndDT (작업 종료일시) : <?php echo $result[$i]->jobEndDT ?></li>
                            <li>regDT (수집 요청일시) : <?php echo $result[$i]->regDT ?></li>
                        </ul>
                    </fieldset>
                  <?php
                    }
                }
                ?>
            </ul>
        </fieldset>
    </div>
    </body>
</html>
