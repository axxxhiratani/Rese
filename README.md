# Rese

## 1.アプリ概要

**Rese は、ある企業のグループ会社の飲食店予約サービスです。**

-   アプリケーション URL  
    http://akio-rese.net

![home](https://user-images.githubusercontent.com/91531795/155330915-e217bb0d-e7ac-43b3-8fce-f0d155077d3b.png)

## 2.ER 図

![Chunk Database - ページ 1 (4)](https://user-images.githubusercontent.com/91531795/155963984-2aaa57e4-0beb-43aa-8a33-f5aab7ab6488.png)

## 3.使用技術

-   言語/ライブラリ/フレームワーク
    -   PHP 7.4.3
    -   Laravel 8.75
    -   JavaScript
    -   Vue 2.0
    -   JQuery 3.3.1
    -   Axios
-   インフラ
    -   Docker 20.10.10
    -   docker-compose 1.29.2
    -   AWS(EC2,RDS,S3,VPC)
    -   Apache 2.4.52
    -   MySQL 15.1
    -   Git 2.32.0
    -   Composer 2.2.7

## 4.アプリの機能一覧

-   会員登録・ログイン・ログアウト
-   ユーザー情報、ユーザー飲食店お気に入り一覧、ユーザー飲食店予約情報の取得
-   飲食店一覧、飲食店詳細の取得
-   飲食店お気に入り追加・削除
-   飲食店予約情報追加・削除・変更
-   飲食店をエリア、ジャンル、店名で検索する
-   評価機能
-   QR コード表示
-   店舗情報追加・変更(オーナー)
-   予約情報確認(オーナー)
-   オーナー作成(管理者)
-   ジャンルの作成と S3 へ画像ファイルの保存(管理者)
-   エリアの追加(管理者)
-   利用者全員へメール送信(管理者)

## 5.環境構築

```
//①.envファイルの編集
APP_PORT=8573

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=rese
DB_USERNAME=sail
DB_PASSWORD=password

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=yourAdress@gmail.com
MAIL_PASSWORD=yourPassword
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=yourAdress@gmail.com
MAIL_FROM_NAME=Rese

AWS_ACCESS_KEY_ID=yourId
AWS_SECRET_ACCESS_KEY=yourKey
AWS_DEFAULT_REGION=ap-northeast-1
AWS_BUCKET=rese-genres
```

```
//②コンテナの立ち上げ
./vendor/bin/sail up -d
```

```
//③マイグレーションの実行
./vendor/bin/sail artisan migrate
```

```
//④シーダーの実行
./vendor/bin/sail artisan db:seed
```
