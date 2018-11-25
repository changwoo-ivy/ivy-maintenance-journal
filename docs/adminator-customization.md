# Adminator theme 커스터마이즈 기록

아이비넷 유지보스 플러그인의 대시보드는 [adminator](https://colorlib.com/polygon/adminator/index.html) ([github](https://github.com/puikinsh/Adminator-admin-dashboard))
에서 가져와 사용하고 있습니다.

그런데 이 대시보드는 webpack 등을 이용해서 만들어져 있어서 워드프레스에서 가져와 쓰기가 조금 어렵게 되어 있습니다. 
원래 소스가 만드는 vendor.js, bundle.js에 어떤 기능이 있는지도 알기 어렵고, 또 실제적으로 필요한 소스 외 데모를 위한 소스도
다수 포함되어 있으이라 판단하였습니다. 그러므로 그런 부분들은 과감히 제거하고 필요한 부분만 가져다 쓰기로 결정하였습니다.

이 문서는 adminator 테마를 이 플러그인의 주 테마로 만들기 위해 사용했던 방법에 대해 기록합니다.


## 테마 다운로드
`git clone https://github.com/puikinsh/Adminator-admin-dashboard.git`으로 다운로드 받습니다. 플러그인에서 사용한 버전은 
fork하여 [changwoo-ivy/Adminator-admin-dashboard](https://github.com/changwoo-ivy/Adminator-admin-dashboard)에서도 볼 수 있습니다.


## 필요한 패키지 설치 및 동작 테스트
NodeJS가 필요합니다. 설치법은 생략합니다. 소스의 루트에 있는 `README.md`에 설치법들은 잘 설명되어 있습니다.
먼저 `npm run dev` 동작 테스트를 해서 웹브라우저에서 올바로 페이지가 나오는지 확인하십시오.


## 의존 패키지
테마가 주로 의존하는 것은 아래에 나열되어 있습니다.
* Twitter Bootstrap: 4.1.3 [다운로드](https://getbootstrap.com/docs/4.1/getting-started/download/)
* Font Awesome 4.7.0 [다운로드](https://fontawesome.com/v4.7.0/)
* Themify Icons [다운로드](https://themify.me/themify-icons)

위 라이브러리들은 adminator 소스 코드 내에서도 찾을 수 있지만, 위에서 받아 설치하는 것이 낫습니다.


## style 컴파일
테마에서 지정한 스타일 요소를 얻어내기 위해서는 SCSS 파일을 별개로 컴파일하는 것이 좋습니다.

1. `src/styles/index.scss`에서 `@import "~bootstrap/scss/bootstrap";`을 주석 처리. (앞에 슬래시 두 개를 붙임.)
2. `src/styles/vendor/index.scss`에서,
   * `@import '~perfect-scrollbar/css/perfect-scrollbar';`를 `@import '../../../../node_modules/perfect-scrollbar/css/perfect-scrollbar';`로 변경.
   * `@import 'themify-icons';` 주석 처리
   * `@import 'font-awesome';` 주석 처리
   
이렇게 수정을 한 후에, adminator 루트 디렉토리에서 다음과 같이 명령을 내립니다.

```
node_modules/.bin/node-sass -r src/assets/styles/index.scss > style.css
```

adminator 루트 디렉토리에 style.css 파일이 생성됩니다. 이 파일이 우리 플러그인의 `src/assets/front/dashboard/style.css`입니다.
