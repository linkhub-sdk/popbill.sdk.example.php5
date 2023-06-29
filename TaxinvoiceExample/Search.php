<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 검색조건에 해당하는 세금계산서를 조회합니다. (조회기간 단위 : 최대 6개월)
     * - https://developers.popbill.com/reference/taxinvoice/php/api/info#Search
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
    $MgtKeyType = ENumMgtKeyType::SELL;

    // 일자 유형 ("R" , "W" , "I" 중 택 1)
    // └ R = 등록일자 , W = 작성일자 , I = 발행일자
    $DType = 'W';

    // 시작일자
    $SDate = '20230101';

    // 종료일자
    $EDate = '20230131';

    // 상태코드 배열 (2,3번째 자리에 와일드카드(*) 사용 가능)
    // - 미입력시 전체조회
    $State = array (
        '3**',
        '6**'
    );

    // 문서 유형 배열 ("N" , "M" 중 선택, 다중 선택 가능)
    // - N = 일반 세금계산서 , M = 수정 세금계산서
    // - 미입력시 전체조회
    $Type = array (
        'N',
        'M'
    );

    // 과세형태 배열 ("T" , "N" , "Z" 중 선택, 다중 선택 가능)
    // - T = 과세 , N = 면세 , Z = 영세
    // - 미입력시 전체조회
    $TaxType = array (
        'T',
        'N',
        'Z'
    );

    // 발행형태 배열 ("N" , "R" , "T" 중 선택, 다중 선택 가능)
    // - N = 정발행 , R = 역발행 , T = 위수탁발행
    // - 미입력시 전체조회
    $IssueType = array (
        'N',
        'R',
        'T'
    );

    // 공급받는자 휴폐업상태 배열 ("N" , "0" , "1" , "2" , "3" , "4" 중 선택, 다중 선택 가능)
    // - N = 미확인 , 0 = 미등록 , 1 = 사업 , 2 = 폐업 , 3 = 휴업 , 4 = 확인실패
    // - 미입력시 전체조회
    $CloseDownState = array (
        'N',
        '0',
        '1',
        '2',
        '3'
    );

    // 등록유형 배열 ("P" , "H" 중 선택, 다중 선택 가능)
    // - P = 팝빌, H = 홈택스 또는 외부ASP
    // - 미입력시 전체조회
    $RegType = array (
        'P',
        'H'
    );

    // 지연발행 여부 (null , true , false 중 택 1)
    // - null = 전체조회 , true = 지연발행 , false = 정상발행
    $LateOnly = 0;

    // 종사업장번호 유무 (null , "0" , "1" 중 택 1)
    // - null = 전체 , 0 = 없음, 1 = 있음
    $TaxRegIDYN = "";

    // 종사업장번호의 주체 ("S" , "B" , "T" 중 택 1)
    // └ S = 공급자 , B = 공급받는자 , T = 수탁자
    // - 미입력시 전체조회
    $TaxRegIDType = "S";

    // 종사업장번호
    // 다수기재시 콤마(",")로 구분하여 구성 ex ) "0001,0002"
    // - 미입력시 전체조회
    $TaxRegID = "";

    // 페이지 번호 기본값 1
    $Page = 1;

    // 페이지당 검색갯수, 기본값 500, 최대값 1000
    $PerPage = 5;

    // 정렬방향, D-내림차순, A-오름차순
    $Order = 'D';

    // 거래처 상호 / 사업자번호 (사업자) / 주민등록번호 (개인) / "9999999999999" (외국인) 중 검색하고자 하는 정보 입력
    // - 사업자번호 / 주민등록번호는 하이픈('-')을 제외한 숫자만 입력
    // - 미입력시 전체조회
    $QString = '';

    // 연동문서 여부 (null , "0" , "1" 중 택 1)
    // - null = 전체조회 , 0 = 일반문서 , 1 = 연동문서
    // - 일반문서 : 세금계산서 작성 시 API가 아닌 팝빌 사이트를 통해 등록한 문서
    // - 연동문서 : 세금계산서 작성 시 API를 통해 등록한 문서
    $InterOPYN = '';

    // 전자세금계산서 문서번호, 공백-전체조회
    $MgtKey = '';

    try {
        $result = $TaxinvoiceService->Search($CorpNum, $MgtKeyType, $DType, $SDate,
            $EDate, $State, $Type, $TaxType, $LateOnly, $Page, $PerPage, $Order,
            $TaxRegIDType, $TaxRegIDYN, $TaxRegID, $QString, $InterOPYN, $UserID,
            $IssueType, $CloseDownState, $MgtKey, $RegType);
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
                <legend>세금계산서 목록조회 </legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
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
                            for ( $i = 0; $i < Count($result->list); $i++ ) {
                    ?>
                                <fieldset class="fieldset2">
                                    <legend> 세금계산서 상태/요약 정보 [<?php echo $i+1?>]</legend>
                                    <ul>
                                        <li>itemKey (팝빌번호) : <?php echo $result->list[$i]->itemKey ?></li>
                                        <li>taxType (과세형태) : <?php echo $result->list[$i]->taxType ?></li>
                                        <li>writeDate (작성일자) : <?php echo $result->list[$i]->writeDate ?></li>
                                        <li>regDT (임시저장 일자) : <?php echo $result->list[$i]->regDT ?></li>
                                        <li>issueType (발행형태) : <?php echo $result->list[$i]->issueType ?></li>
                                        <li>supplyCostTotal (공급가액 합계): <?php echo $result->list[$i]->supplyCostTotal ?></li>
                                        <li>taxTotal (세액 합계) : <?php echo $result->list[$i]->taxTotal ?></li>
                                        <li>purposeType (영수/청구) : <?php echo $result->list[$i]->purposeType ?></li>
                                        <li>issueDT (발행일시) : <?php echo $result->list[$i]->issueDT ?></li>
                                        <li>lateIssueYN (지연발행 여부) : <?php echo $result->list[$i]->lateIssueYN ? 'true' : 'false' ?></li>
                                        <li>preIssueDT (발행예정일시) : <?php echo $result->list[$i]->preIssueDT ?></li>
                                        <li>openYN (개봉 여부) : <?php echo $result->list[$i]->openYN ? 'true' : 'false' ?></li>
                                        <li>openDT (개봉 일시) : <?php echo $result->list[$i]->openDT ?></li>
                                        <li>stateMemo (상태메모) : <?php echo $result->list[$i]->stateMemo ?></li>
                                        <li>stateCode (상태코드) : <?php echo $result->list[$i]->stateCode ?></li>
                                        <li>stateDT (상태변경일시) : <?php echo $result->list[$i]->stateDT ?></li>
                                        <li>ntsconfirmNum (국세청승인번호) : <?php echo $result->list[$i]->ntsconfirmNum ?></li>
                                        <li>ntsresult (국세청 전송결과) : <?php echo $result->list[$i]->ntsresult ?></li>
                                        <li>ntssendDT (국세청 전송일시) : <?php echo $result->list[$i]->ntssendDT ?></li>
                                        <li>ntsresultDT (국세청 결과 수신일시) : <?php echo $result->list[$i]->ntsresultDT ?></li>
                                        <li>ntssendErrCode (전송실패 사유코드) : <?php echo $result->list[$i]->ntssendErrCode ?></li>
                                        <li>modifyCode (수정 사유코드) : <?php echo $result->list[$i]->modifyCode ?></li>
                                        <li>interOPYN (연동문서 여부) : <?php echo $result->list[$i]->interOPYN ? 'true' : 'false' ?></li>

                                        <li>invoicerCorpName (공급자 상호) : <?php echo $result->list[$i]->invoicerCorpName ?></li>
                                        <li>invoicerCorpNum (공급자 사업자번호) : <?php echo $result->list[$i]->invoicerCorpNum ?></li>
                                        <li>invoicerMgtKey (공급자 문서번호) : <?php echo $result->list[$i]->invoicerMgtKey ?></li>
                                        <li>invoicerPrintYN (공급자 인쇄여부) : <?php echo $result->list[$i]->invoicerPrintYN ? 'true' : 'false' ?></li>

                                        <li>invoiceeCorpName (공급받는자 상호) : <?php echo $result->list[$i]->invoiceeCorpName ?></li>
                                        <li>invoiceeCorpNum (공급받는자 사업자번호) : <?php echo $result->list[$i]->invoiceeCorpNum ?></li>
                                        <li>invoiceeMgtKey (공급받는자 문서번호) : <?php echo $result->list[$i]->invoiceeMgtKey ?></li>
                                        <li>invoiceePrintYN (공급받는자 인쇄여부) : <?php echo $result->list[$i]->invoiceePrintYN ? 'true' : 'false' ?></li>
                                        <li>closeDownState (공급받는자 휴폐업상태) : <?php echo $result->list[$i]->closeDownState ?></li>
                                        <li>closeDownStateDate (공급받는자 휴폐업일자) : <?php echo $result->list[$i]->closeDownStateDate ?></li>

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
