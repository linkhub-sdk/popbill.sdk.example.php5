<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen"/>
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
    /**
     * 검색조건에 해당하는 팩스 전송내역 목록을 조회합니다. (조회기간 단위 : 최대 2개월)
     * - 팩스 접수일시로부터 2개월 이내 접수건만 조회할 수 있습니다.
     * - https://developers.popbill.com/reference/fax/php/api/info#Search
     */

    include 'common.php';

    // 팝빌회원 사업자 번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 검색시작일자
    $SDate = '20230101';

    // 검색종료일자
    $EDate = '20230131';

    // 전송상태 배열 ("1" , "2" , "3" , "4" 중 선택, 다중 선택 가능)
    // └ 1 = 대기 , 2 = 성공 , 3 = 실패 , 4 = 취소
    // - 미입력 시 전체조회
    $State = array(1, 2, 3, 4);

    // 예약여부 (null, false, true 중 택 1)
    // └ null = 전체, false = 즉시전송건, true = 예약전송건 
    // - 미입력 시 전체조회
    $ReserveYN = null;

    // 개인조회 여부 (false , true 중 택 1)
    // false = 접수한 팩스 전체 조회 (관리자권한)
    // true = 해당 담당자 계정으로 접수한 팩스만 조회 (개인권한)
    // 미입력시 기본값 false 처리
    $SenderOnly = false;

    // 페이지 번호, 기본값 1
    $Page = 1;

    // 페이지당 검색갯수, 기본값 500, 최대값 1000
    $PerPage = 500;

    // 정렬방향, D-내림차순, A-오름차순
    $Order = 'D';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    // 조회하고자 하는 발신자명 또는 수신자명
    // - 미입력시 전체조회
    $QString = null;

    try {
        $result = $FaxService->Search($CorpNum, $SDate, $EDate, $State, $ReserveYN, $SenderOnly, $Page, $PerPage, $Order, $UserID, $QString);
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
        <legend>팩스전송내역 조회</legend>
        <ul>
            <?php
            if (isset($code)) {
                ?>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>
                <?php
            } else {
                ?>
                <li>code (응답코드) : <?php echo $result->code ?> </li>
                <li>message (응답메시지) : <?php echo $result->message ?> </li>
                <li>total (총 검색결과 건수) : <?php echo $result->total ?> </li>
                <li>perPage (페이지당 목록개수) : <?php echo $result->perPage ?> </li>
                <li>pageNum (페이지 번호) : <?php echo $result->pageNum ?> </li>
                <li>pageCount (페이지 개수) : <?php echo $result->pageCount ?> </li>
                <?php
                for ($i = 0; $i < Count($result->list); $i++) {
                    ?>
                    <fieldset class="fieldset2">
                        <legend> 팩스전송내역 조회 결과 [<?php echo $i + 1 ?>]</legend>
                        <ul>
                            <li>state (전송상태 코드) : <?php echo $result->list[$i]->state ?> </li>
                            <li>result (전송결과 코드) : <?php echo $result->list[$i]->result ?> </li>
                            <li>sendNum (발신번호) : <?php echo $result->list[$i]->sendNum ?> </li>
                            <li>senderName (발신자명) : <?php echo $result->list[$i]->senderName ?> </li>
                            <li>receiveNum (수신번호) : <?php echo $result->list[$i]->receiveNum ?> </li>
                            <li>receiveNumType (수신번호 유형) : <?php echo $result->list[$i]->receiveNumType ?> </li>
                            <li>receiveName (수신자명) : <?php echo $result->list[$i]->receiveName ?> </li>
                            <li>title (팩스제목) : <?php echo $result->list[$i]->title ?> </li>
                            <li>sendPageCnt (전체 페이지수) : <?php echo $result->list[$i]->sendPageCnt ?> </li>
                            <li>successPageCnt (성공 페이지수) : <?php echo $result->list[$i]->successPageCnt ?> </li>
                            <li>failPageCnt (실패 페이지수) : <?php echo $result->list[$i]->failPageCnt ?> </li>
                            <li>cancelPageCnt (취소 페이지수) : <?php echo $result->list[$i]->cancelPageCnt ?> </li>
                            <li>receiptDT (접수일시) : <?php echo $result->list[$i]->receiptDT ?> </li>
                            <li>reserveDT (예약일시) : <?php echo $result->list[$i]->reserveDT ?> </li>
                            <li>sendDT (전송일시) : <?php echo $result->list[$i]->sendDT ?> </li>
                            <li>resultDT (전송결과 수신일시) : <?php echo $result->list[$i]->resultDT ?> </li>
                            <li>fileNames (전송 파일명 리스트) : <?php echo implode(', ', $result->list[$i]->fileNames) ?> </li>
                            <li>receiptNum (접수번호) : <?php echo $result->list[$i]->receiptNum ?> </li>
                            <li>requestNum (요청번호) : <?php echo $result->list[$i]->requestNum ?> </li>
                            <li>interOPRefKey (파트너 지정키) : <?php echo $result->list[$i]->interOPRefKey ?> </li>
                            <li>chargePageCnt (과금 페이지수) : <?php echo $result->list[$i]->chargePageCnt ?> </li>
                            <li>refundPageCnt (환불 페이지수) : <?php echo $result->list[$i]->refundPageCnt ?> </li>
                            <li>tiffFileSize (변환파일용량) : <?php echo $result->list[$i]->tiffFileSize ?> </li>
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
