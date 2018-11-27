<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * 080 서비스 수신거부 목록을 확인합니다.
     */

    include 'common.php';

    // 팝빌회원 사업자번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    try {
        $result = $MessagingService->GetAutoDenyList($testCorpNum);
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
            <legend>080 수신거부목록 확인</legend>
            <ul>
                <?php
                if ( isset( $result ) ) {
                ?>
                    <fieldset class="fieldset2">
                        <ul>
                            <?php
                            for ( $i = 0; $i < Count ( $result ) ; $i++) {
                            ?>
                                <li>
                                    <?php
                                    foreach($result[$i] as $number=>$regDT) {
                                     ?>
                                        <?php echo $number ?> : <?php echo $regDT?>
                                    <?php
                                    }
                                    ?>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </fieldset>
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
