<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />

		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>

	<body>

		<div id="content">

			<p class="heading1">팝빌 팩스 SDK PHP 5.X Example.</p>

			<br/>

			<fieldset class="fieldset1">
				<legend>팝빌 기본 API</legend>

				<fieldset class="fieldset2">
					<legend>회원사 정보</legend>
					<ul>
						<li><a href="CheckIsMember.php">checkIsMember</a> - 연동회원사 가입 여부 확인</li>
						<li><a href="CheckID.php">checkID</a> - 연동회원 아이디 중복 확인</li>
						<li><a href="JoinMember.php">joinMember</a> - 연동회원사 가입 요청</li>
            <li><a href="GetChargeInfo.php">getChargeInfo</a> - 과금정보 확인</li>
            <li><a href="GetBalance.php">getBalance</a> - 연동회원사 잔여포인트 확인</li>
						<li><a href="GetPartnerBalance.php">getPartnerBalance</a> - 파트너 잔여포인트 확인</li>
						<li><a href="GetPopbillURL.php">getPopbillURL</a> - 팝빌 SSO URL 요청</li>
						<li><a href="RegistContact.php">registContact</a> - 담당자 추가</li>
						<li><a href="ListContact.php">listContact</a> - 담당자 목록 확인</li>
						<li><a href="UpdateContact.php">updateContact</a> - 담당자 정보 수정</li>
						<li><a href="GetCorpInfo.php">GetCorpInfo</a> - 회사정보 확인</li>
						<li><a href="UpdateCorpInfo.php">UpdateCorpInfo</a> - 회사정보 수정</li>
					</ul>
				</fieldset>

			</fieldset>
			<br />
			<fieldset class="fieldset1">
				<legend>팩스 관련 API</legend>

				<fieldset class="fieldset2">
					<legend>팩스 전송</legend>
					<ul>
						<li><a href="SendFAX.php">sendFAX</a> - 팩스 전송. 1파일 1건 전송</li>
						<li><a href="SendFAX_Multi.php">sendFAX_Multi</a> - 팩스 전송. 1파일 동보 전송(수신번호 최대 1000개)</li>
            <li><a href="ResendFAX.php">ResendFAX</a> - 팩스 재전송</li>
            <li><a href="ResendFAX_Multi.php">ResendFAX_Multi</a> - 팩스 동보 재전송</li>
					</ul>
				</fieldset>

				<fieldset class="fieldset2">
					<legend>전송결과/예약취소</legend>
					<ul>
						<li><a href="GetFaxDetail.php">getFaxDetail</a> - 팩스전송 전송결과 확인</li>
						<li><a href="Search.php">search</a> - 팩스전송 목록조회</li>
						<li><a href="CancelReserve.php">cancelReserve</a> - 예약전송 팩스 취소</li>
					</ul>
				</fieldset>

				<fieldset class="fieldset2">
					<legend>기타</legend>
					<ul>
						<li><a href="GetURL.php">getURL</a> - 팩스 전송내역 팝업 URL</li>
						<li><a href="GetUnitCost.php">getUnitCost</a> 팩스 전송단가 확인</li>
					</ul>
				</fieldset>
			</fieldset>
		 </div>
	</body>
</html>
