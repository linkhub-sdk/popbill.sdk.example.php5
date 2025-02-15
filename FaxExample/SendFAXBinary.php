<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 전송할 파일의 바이너리 데이터를 팩스 1건 전송합니다. (최대 전송파일 개수: 20개)
     * - https://developers.popbill.com/reference/fax/php/api/send#SendFAXBinary
     */

    include 'common.php';

    // 팝빌 회원 사업자번호
    $CorpNum = '1234567890';

    // 발신번호
    // 팝빌에 등록되지 않은 번호를 입력하는 경우 '원발신번호'로 팩스 전송됨
    $Sender = '';

    // 팩스 수신정보 배열, 최대 1,000건
    $Receivers[] = array(
        // 팩스 수신번호
        'rcv' => '',
        // 팩스 수신자명
        'rcvnm' => '팝빌담당자'
    );

    // 팩스전송파일 (최대 20개)
    $FileDatas[] = array(
        //파일명
        'fileName' => 'test.pdf',
        //fileData - BLOB 데이터 입력
        'fileData' => file_get_contents('./test.pdf') //file_get_contenst-바이너리데이터 추출
    );

    $FileDatas[] = array(
        //파일명
        'fileName' => 'test2.PNG',
        //fileData - BLOB 데이터 입력
        'fileData' => file_get_contents('./test2.PNG') //file_get_contenst-바이너리데이터 추출
    );

    // 예약전송일시(yyyyMMddHHmmss) ex) 2020324230000, null인경우 즉시전송
    $ReserveDT = null;

    // 팝빌 회원 아이디
    $UserID = 'testkorea';

    // 팩스전송 발신자명
    $SenderName = '발신자명';

    // 광고팩스 전송여부 , true / false 중 택 1
    // └ true = 광고 , false = 일반
    // └ 미입력 시 기본값 false 처리
    $adsYN = false;

    // 팩스제목
    $title = null;

    // 전송요청번호
    // 파트너가 전송 건에 대해 관리번호를 생성하여 관리하는 경우 사용.
    // 1~36자리로 구성. 영문, 숫자, 하이픈(-), 언더바(_)를 조합하여 팝빌 회원별로 중복되지 않도록 할당.
    $RequestNum = null;
    
    try {
        $receiptNum = $FaxService->SendFAXBinary($CorpNum, $Sender, $Receivers, $FileDatas,
            $ReserveDT, $UserID, $SenderName, $adsYN, $title, $RequestNum);
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
                <legend>바이너리 데이터 팩스 전송 요청</legend>
                <ul>
                    <?php
                        if ( isset($receiptNum) ) {
                    ?>
                            <li>receiptNum (팩스접수번호) : <?php echo $receiptNum?></li>
                    <?php
                        } else {
                    ?>
                            <li>code (응답 코드) : <?php echo $code ?></li>
                            <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
