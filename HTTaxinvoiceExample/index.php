<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />

		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
	<body>
		<div id="content">

			<p class="heading1">팝빌 홈택스 전자(세금)계산서 연계 API SDK PHP 5.x Example.</p>

			<br/>

			<fieldset class="fieldset1">
				<legend>팝빌 기본 API</legend>

				<fieldset class="fieldset2">
					<legend>회원사 정보</legend>
					<ul>
						<li><a href="CheckIsMember.php">checkIsMember</a> - 연동회원 가입 여부 확인</li>
						<li><a href="CheckID.php">checkID</a> - 연동회원 아이디 중복 확인</li>
						<li><a href="JoinMember.php">joinMember</a> - 연동회원 가입 요청</li>
            <li><a href="GetChargeInfo.php">getChargeInfo</a> - 과금정보 확인</li>
            <li><a href="GetBalance.php">getBalance</a> - 연동회원 잔여포인트 확인</li>
						<li><a href="GetPartnerBalance.php">getPartnerBalance</a> - 파트너 잔여포인트 확인</li>
						<li><a href="GetPopbillURL.php">getPopbillURL</a> - 팝빌 SSO URL 요청(로그인, 포인트 충전)</li>
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
				<legend>홈택스 전자세금계산서 연계 관련 API</legend>

				<fieldset class="fieldset2">
					<legend>매출/매입 내역 수집</legend>
					<ul>
						<li><a href="RequestJob.php">RequestJob</a> - 수집 요청</li>
						<li><a href="GetJobState.php">GetJobState</a> - 수집 상태 확인</li>
						<li><a href="ListActiveJob.php">ListActiveJob</a> - 수집 상태 목록 확인</li>
					</ul>
				</fieldset>

        <fieldset class="fieldset2">
					<legend>매출/매입 수집 결과 조회</legend>
					<ul>
						<li><a href="Search.php">Search</a> - 수집 결과 조회</li>
						<li><a href="Summary.php">Summary</a> - 수집 결과 요약정보 조회</li>
						<li><a href="GetTaxinvoice.php">GetTaxinvoice</a> - 상세정보 확인</li>
            <li><a href="GetXML.php">GetXML</a> - 상세정보 확인 (XML)</li>
					</ul>
				</fieldset>

				<fieldset class="fieldset2">
					<legend>부가기능</legend>
					<ul>
						<li><a href="GetFlatRatePopUpURL.php">GetFlatRatePopUpURL</a> - 정액제 서비스 신청 URL</li>
						<li><a href="GetFlatRateState.php">GetFlatRateState</a> - 정액제 서비스 상태 확인</li>
						<li><a href="GetCertificatePopUpURL.php">GetCertificatePopUpURL</a> - 홈택스연계 공인인증서 등록 URL</li>
						<li><a href="GetCertificateExpireDate.php">GetCertificateExpireDate</a> - 홈택스연계 공인인증서 만료일자 확인</li>
					</ul>
				</fieldset>


			</fieldset>
		 </div>
	</body>
</html>
