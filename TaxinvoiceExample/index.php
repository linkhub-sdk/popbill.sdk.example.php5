<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />

		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
	<body>
		<div id="content">

			<p class="heading1">팝빌 세금계산서 SDK PHP 5.x Example.</p>

			<br/>

			<fieldset class="fieldset1">
				<legend>팝빌 기본 API</legend>

				<fieldset class="fieldset2">
					<legend>회원사 정보</legend>
					<ul>
						<li><a href="CheckIsMember.php">checkIsMember</a> - 연동회원 가입여부 확인</li>
						<li><a href="CheckID.php">checkID</a> - 연동회원 아이디 중복 확인</li>
						<li><a href="JoinMember.php">joinMember</a> - 연동회원 가입 요청</li>
            <li><a href="GetChargeInfo.php">getChargeInfo</a> - 과금정보 확인</li>
            <li><a href="GetBalance.php">getBalance</a> - 연동회원 잔여포인트 확인</li>
						<li><a href="GetPartnerBalance.php">getPartnerBalance</a> - 파트너 잔여포인트 확인</li>
						<li><a href="GetPopbillURL.php">getPopbillURL</a> - 팝빌 SSO URL 요청(로그인, 포인트 충전, 공인인증서 등록)</li>
						<li><a href="RegistContact.php">registContact</a> - 담당자 추가</li>
						<li><a href="ListContact.php">listContact</a> - 담당자 목록 확인</li>
						<li><a href="UpdateContact.php">updateContact</a> - 담당자 정보 수정</li>
						<li><a href="GetCorpInfo.php">getCorpInfo</a> - 회사정보 확인</li>
						<li><a href="UpdateCorpInfo.php">updateCorpInfo</a> - 회사정보 수정</li>
					</ul>
				</fieldset>

			</fieldset>

			<br />

			<fieldset class="fieldset1">
				<legend>전자세금계산서 관련 API</legend>

				<fieldset class="fieldset2">
					<legend>등록/수정/확인/삭제</legend>
					<ul>
						<li><a href="CheckMgtKeyInUse.php">checkMgtKeyInUse</a> - 세금계산서 관리번호 사용여부 확인</li>
            <li><a href="RegistIssue.php">registIssue</a> - 세금계산서 즉시발행</li>
						<li><a href="Register.php">register</a> - 세금계산서 임시저장</li>
						<li><a href="Update.php">update</a> - 세금계산서 수정</li>
						<li><a href="GetInfo.php">getInfo</a> - 세금계산서 상태/요약 정보 확인</li>
						<li><a href="GetInfos.php">getInfos</a> - 세금계산서 상태/요약 정보 확인 - 대량</li>
						<li><a href="GetDetailInfo.php">getDetailInfo</a> - 세금계산서 상세 정보 확인</li>
						<li><a href="Delete.php">delete</a> - 세금계산서 삭제</li>
						<li><a href="GetLogs.php">getLogs</a> - 세금계산서 문서 상태변경 이력</li>
						<li><a href="Search.php">search</a> - 세금계산서 기간조회</li>
						<li><a href="AttachFile.php">attachFile</a> - 세금계산서 첨부파일 추가</li>
						<li><a href="GetFiles.php">getFiles</a> - 세금계산서 첨부파일 목록확인</li>
						<li><a href="DeleteFile.php">deleteFile</a> - 세금계산서 첨부파일 삭제</li>
					</ul>
				</fieldset>

				<fieldset class="fieldset2">
					<legend>처리 프로세스</legend>
					<ul>
						<li><a href="Send.php">send</a> - 세금계산서 발행예정</li>
						<li><a href="CancelSend.php">cancelSend</a> - 발행예정 취소</li>
						<li><a href="Accept.php">accept</a> - 발행예정 승인</li>
						<li><a href="Deny.php">deny</a> - 발행예정 거부</li>
						<li><a href="Issue.php">issue</a> - 세금계산서 발행</li>
						<li><a href="CancelIssue.php">cancelIssue</a> - 세금계산서 발행취소</li>
						<li><a href="Request.php">request</a> - 세금계산서 역발행요청</li>
						<li><a href="CancelRequest.php">cancelRequest</a> - 역발행 세금계산서 취소</li>
						<li><a href="Refuse.php">refuse</a> -  역발행 세금계산서 거부</li>
						<li><a href="SendToNTS.php">sendToNTS</a> - 국세청 즉시전송</li>
					</ul>
				</fieldset>

				<fieldset class="fieldset2">
					<legend>부가 기능</legend>
					<ul>
						<li><a href="SendEmail.php">sendEmail</a> - 발행 안내메일 전송</li>
						<li><a href="SendSMS.php">sendSMS</a> - 알림문자 전송</li>
						<li><a href="SendFAX.php">sendFAX</a> - 세금계산서 팩스 전송</li>
						<li><a href="AttachStatement.php">attachStatement</a> - 전자명세서 첨부</li>
						<li><a href="DetachStatement.php">detachStatement</a> - 전자명세서 첨부해제</li>
					</ul>
				</fieldset>

				<fieldset class="fieldset2">
					<legend>팝빌 세금계산서 SSO URL 기능</legend>
					<ul>
						<li><a href="GetURL.php">getURL</a> - 세금계산서 관련 SSO URL 확인</li>
						<li><a href="GetPopUpURL.php">getPopUpURL</a> - 세금계산서 보기 팝업 URL</li>
						<li><a href="GetPrintURL.php">getPrintURL</a> - 세금계산서 인쇄 팝업 URL</li>
						<li><a href="GetMassPrintURL.php">getMassPrintURL</a> - 세금계산서 인쇄 팝업 URL - 대량 (최대 100건))</li>
						<li><a href="GetEPrintURL.php">getEPrintURL</a> - 세금계산서 인쇄 팝업 URL - 공급받는자</li>
						<li><a href="GetMailURL.php">getMailURL</a> - 세금계산서 공급받는자 메일링크 URL</li>
					</ul>
				</fieldset>

				<fieldset class="fieldset2">
					<legend>기타</legend>
					<ul>
						<li><a href="GetUnitCost.php">getUnitCost</a> - 세금계산서 발행 단가 확인</li>
						<li><a href="GetCertificateExpireDate.php">getCertificateExpireDate</a> - 공인인증서 만료일시 확인</li>
						<li><a href="GetEmailPublicKeys.php">getEmailPublicKeys</a> - 대용량 연계사업자 이메일 목록 확인</li>
					</ul>
				</fieldset>
			</fieldset>
		 </div>
	</body>
</html>
