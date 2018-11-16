<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="/Example.css" media="screen"/>

    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<body>
<div id="content">

    <p class="heading1">팝빌 현금영수증 SDK PHP 5.X Example.</p>

    <br/>

    <fieldset class="fieldset1">
        <legend>팝빌 기본 API</legend>

        <fieldset class="fieldset2">
            <legend>회원정보</legend>
            <ul>
                <li><a href="CheckIsMember.php">CheckIsMember</a> - 연동회원 가입여부 확인</li>
                <li><a href="CheckID.php">CheckID</a> - 연동회원 아이디 중복 확인</li>
                <li><a href="JoinMember.php">JoinMember</a> - 연동회원 가입 요청</li>
                <li><a href="GetChargeInfo.php">GetChargeInfo</a> - 과금정보 확인</li>
                <li><a href="GetBalance.php">GetBalance</a> - 연동회원 잔여포인트 확인</li>
                <li><a href="GetAccessURL.php">GetAccessURL</a> - 팝빌 로그인 URL</li>
                <li><a href="GetChargeURL.php">GetChargeURL</a> - 연동회원 포인트충전 URL</li>
                <li><a href="GetPartnerBalance.php">GetPartnerBalance</a> - 파트너 잔여포인트 확인</li>
                <li><a href="GetPartnerURL.php">GetPartnerURL</a> - 파트너 포인트충전 팝업 URL</li>
                <li><a href="RegistContact.php">RegistContact</a> - 담당자 추가</li>
                <li><a href="ListContact.php">ListContact</a> - 담당자 목록 확인</li>
                <li><a href="UpdateContact.php">UpdateContact</a> - 담당자 정보 수정</li>
                <li><a href="GetCorpInfo.php">GetCorpInfo</a> - 회사정보 확인</li>
                <li><a href="UpdateCorpInfo.php">UpdateCorpInfo</a> - 회사정보 수정</li>
            </ul>
        </fieldset>
    </fieldset>

    <br/>

    <fieldset class="fieldset1">
        <legend>현금영수증 관련 API</legend>

        <fieldset class="fieldset2">
            <legend>등록/수정/발행/삭제</legend>
            <ul>
                <li><a href="CheckMgtKeyInUse.php">CheckMgtKeyInUse</a> - 문서관리번호 사용여부 확인</li>
                <li><a href="RegistIssue.php">RegistIssue</a> - 현금영수증 즉시발행</li>
                <li><a href="Register.php">Register</a> - 현금영수증 임시저장</li>
                <li><a href="Update.php">Update</a> - 현금영수증 수정</li>
                <li><a href="Issue.php">Issue</a> - 현금영수증 발행</li>
                <li><a href="CancelIssue.php">CancelIssue</a> - 현금영수증 발행취소</li>
                <li><a href="Delete.php">Delete</a> - 현금영수증 삭제</li>
            </ul>
        </fieldset>

        <fieldset class="fieldset2">
            <legend>취소현금영수증 발행</legend>
            <ul>
                <li><a href="RevokeRegistIssue.php">RevokeRegistIssue</a> - 취소현금영수증 즉시발행</li>
                <li><a href="RevokeRegistIssue_part.php">RevokeRegistIssue</a> - (부분)취소현금영수증 즉시발행</li>
                <li><a href="RevokeRegister.php">RevokeRegister</a> - 취소현금영수증 임시저장</li>
                <li><a href="RevokeRegister_part.php">RevokeRegister</a> - (부분)취소현금영수증 임시저장</li>
            </ul>
        </fieldset>

        <fieldset class="fieldset2">
            <legend>정보 확인</legend>
            <ul>
                <li><a href="GetInfo.php">GetInfo</a> - 현금영수증 상태/요약정보 확인</li>
                <li><a href="GetInfos.php">GetInfos</a> - 현금영수증 상태/요약정보 확인 - 대량</li>
                <li><a href="GetLogs.php">GetLogs</a> - 현금영수증 상태변경 이력 확인</li>
                <li><a href="GetDetailInfo.php">GetDetailInfo</a> - 현금영수증 상세정보 확인</li>
                <li><a href="Search.php">Search</a> - 현금영수증 목록조회</li>
            </ul>
        </fieldset>

        <fieldset class="fieldset2">
            <legend>부가기능</legend>
            <ul>
                <li><a href="SendEmail.php">SendEmail</a> - 알림메일 전송</li>
                <li><a href="SendSMS.php">SendSMS</a> - 알림문자 전송</li>
                <li><a href="SendFAX.php">SendFAX</a> - 현금영수증 팩스전송</li>
                <li><a href="ListEmailConfig.php">ListEmailConfig</a> - 알림메일 전송목록 확인</li>
                <li><a href="UpdateEmailConfig.php">UpdateEmailConfig</a> - 알림메일 전송설정 수정</li>
            </ul>
        </fieldset>

        <fieldset class="fieldset2">
            <legend>팝빌 현금영수증 SSO URL 기능</legend>
            <ul>
                <li><a href="GetURL.php">GetURL</a> - 현금영수증 관련 SSO URL 확인</li>
                <li><a href="GetPopUpURL.php">GetPopUpURL</a> - 현금영수증 보기 팝업 URL</li>
                <li><a href="GetPrintURL.php">GetPrintURL</a> - 현금영수증 인쇄 팝업 URL</li>
                <li><a href="GetEPrintURL.php">GetEPrintURL</a> - 현금영수증 인쇄 팝업 URL - 공급받는자용</li>
                <li><a href="GetMassPrintURL.php">GetMassPrintURL</a> - 현금영수증 인쇄 팝업 URL - 대량</li>
                <li><a href="GetMailURL.php">GetMailURL</a> - 현금영수증 메일링크 URL</li>
            </ul>
        </fieldset>
        <fieldset class="fieldset2">
            <legend>기타</legend>
            <ul>
                <li><a href="GetUnitCost.php">GetUnitCost</a> - 현금영수증 발행단가 확인</li>
            </ul>
        </fieldset>

    </fieldset>
</div>
</body>
</html>
