<?php
  /**
  * 팜빌 홈택스 전자세금계산서 연계 API PHP SDK Example
  *
  * PHP SDK 연동환경 설정방법 안내 : blog.linkhub.co.kr/584
  * 업테이트 일자 : 2017-05-22
  * 연동기술지원 연락처 : 1600-8539 / 070-4304-2991~2
  * 연동기술지원 이메일 : code@linkhub.co.kr
  *
  * <테스트 연동개발 준비사항>
  * 1) 23, 26번 라인에 선언된 링크아이디(LinkID)와 비밀키(SecretKey)를
  *    링크허브 가입시 메일로 발급받은 인증정보를 참조하여 변경합니다.
  * 2) 팝빌 개발용 사이트(test.popbill.com)에 연동회원으로 가입합니다.
  * 3) 홈택스에서 이용가능한 공인인증서를 등록합니다.
  *    - 팝빌로그인 > [홈택스연계] > [환경설정] > [공인인증서 관리] 메뉴
  *    - 공인인증서 등록(GetCertificatePopUpURL API) 반환된 URL을 이용하여
  *      팝업 페이지에서 공인인증서 등록
  */

  require_once '../Popbill/PopbillHTTaxinvoice.php';

  // 링크 아이디
  $LinkID = 'TESTER';

  // 발급받은 비밀키. 유출에 주의하시기 바랍니다.
  $SecretKey = 'SwWxqU+0TErBXy/9TVjIPEnI0VTUMMSQZtJf3Ed8q3I=';

  // 통신방식 기본은 CURL , curl 사용에 문제가 있을경우 STREAM 사용가능.
  // STREAM 사용시에는 php.ini 파일의 allow_fopen_url = on 으로 설정해야함.
  define('LINKHUB_COMM_MODE','CURL');

  $HTTaxinvoiceService = new HTTaxinvoiceService($LinkID, $SecretKey);

  // 연동환경 설정값, 개발용(true), 상업용(false)
  $HTTaxinvoiceService->IsTest(true);

?>
