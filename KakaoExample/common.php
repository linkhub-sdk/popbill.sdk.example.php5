<?php
/**
 * 팝빌 카카오톡 API PHP SDK Example
 *
 * PHP SDK 연동환경 설정방법 안내 : https://docs.popbill.com/kakao/tutorial/php
 * 업데이트 일자 : 2020-10-07
 * 연동기술지원 연락처 : 1600-9854 / 070-4304-2991
 * 연동기술지원 이메일 : code@linkhub.co.kr
 *
 * <테스트 연동개발 준비사항>
 * 1) 28, 31번 라인에 선언된 링크아이디(LinkID)와 비밀키(SecretKey)를
 *    링크허브 가입시 메일로 발급받은 인증정보를 참조하여 변경합니다.
 * 2) 팝빌 개발용 사이트(test.popbill.com)에 연동회원으로 가입합니다.
 * 3) 친구톡/알림톡을 전송하기 위해 발신번호 사전등록을 합니다. (등록방법은 사이트/API 두가지 방식이 있습니다.)
 *   - 팝빌 사이트 로그인 > [문자/팩스] > [카카오톡] > [발신번호 사전등록] 메뉴에서 등록
 *   - getSenderNumberMgtURL API를 통해 반환된 URL을 이용하여 발신번호 등록
 * 4) 친구톡/알림톡을 전송하기 위해 카카오톡채널를 등록 합니다. (등록방법은 사이트/API 두가지 방식이 있습니다.)
 *   - 팝빌 사이트 로그인 > [문자/팩스] > [카카오톡] > [카카오톡 관리]  > 카카오톡채널 계정관리 메뉴에서 등록
 *   - GetPlusFriendMgtURL API를 통해 반환된 URL을 이용하여 카카오톡채널 계정관리 등록
 * 5) 알림톡 전송을 하기 위해 알림톡 템플릿을 신청 합니다. (등록방법은 사이트/API 두가지 방식이 있습니다.)
 *   - 팝빌 사이트 로그인 > [문자/팩스] > [카카오톡] > [카카오톡 관리]  > 알림톡 템플릿 관리 메뉴에서 등록
 *   - GetATSTemplateMgtURL API를 통해 반환된 URL을 이용하여 알림톡 템플릿 등록
 */

  require_once '../Popbill/PopbillKakao.php';

  // 링크아이디
  $LinkID = 'TESTER';

  // 비밀키
  $SecretKey = 'SwWxqU+0TErBXy/9TVjIPEnI0VTUMMSQZtJf3Ed8q3I=';

  //통신방식 기본은 CURL , curl 사용에 문제가 있을경우 STREAM 사용가능.
  //STREAM 사용시에는 allow_url_fopen = on 으로 설정해야함.
  define('LINKHUB_COMM_MODE','CURL');

  $KakaoService = new KakaoService($LinkID, $SecretKey);

  // 연동환경 설정값, 개발용(true), 상업용(false)
  $KakaoService->IsTest(true);

  // 인증토큰에 대한 IP제한기능 사용여부, 권장(true)
  $KakaoService->IPRestrictOnOff(true);

  // 팝빌 API 서비스 고정 IP 사용여부(GA), 기본값(false)
  $KakaoService->UseStaticIP(false);

  // 로컬서버 시간 사용 여부 true(기본값) - 사용, false(미사용)
  $KakaoService->UseLocalTimeYN(true);
?>
