# Rese

## 1.アプリ概要

**Rese は、ある企業のグループ会社の飲食店予約サービスです。**

-   アプリケーション URL  
    http://akio-rese.net

![home](https://user-images.githubusercontent.com/91531795/155988990-ed1edf84-93d4-4bdc-97c5-536eb2c4f46a.PNG)

## 2.ER 図

![Chunk Database - ページ 1 (4)](https://user-images.githubusercontent.com/91531795/155963984-2aaa57e4-0beb-43aa-8a33-f5aab7ab6488.png)

## 3.使用技術

-   言語/ライブラリ/フレームワーク
    -   PHP 7.4.3
    -   Laravel 8.75
    -   HTML/CSS
    -   JavaScript
    -   Vue 2.0
    -   JQuery 3.3.1
    -   Axios
-   インフラ
    -   Docker 20.10.10
    -   docker-compose 1.29.2
    -   AWS(EC2,RDS,S3,VPC,Route53)
    -   Apache 2.4.52
    -   MySQL 15.1
    -   Git 2.32.0
    -   Composer 2.2.7

## 4.アプリの機能一覧

-   ユーザー
    -   会員登録・ログイン・ログアウト
    -   ユーザー情報、ユーザー飲食店お気に入り一覧、ユーザー飲食店予約情報の取得
    -   飲食店一覧、飲食店詳細の取得
    -   飲食店お気に入り追加・削除
    -   飲食店予約情報の追加・削除・変更
    -   飲食店をエリア、ジャンル、店名で検索する
    -   評価機能
    -   QR コード表示
    -   登録メールアドレスに予約のリマインドを送信
-   オーナー
    -   店舗情報の追加・変更・削除
    -   予約情報確認
-   管理者
    -   オーナー作成
    -   ジャンルの作成と S3 へ画像ファイルの保存
    -   エリアの追加
    -   ユーザー全員へメール送信

## 5.環境構築

①.env ファイルの設定(※1)

```
cp .env.example .env
```

② コンテナの立ち上げ

```
./vendor/bin/sail up -d
```

③ マイグレーションの実行

```
./vendor/bin/sail artisan migrate
```

④ シーダーの実行

```
./vendor/bin/sail artisan db:seed
```

※1 **AWS 及び SMTP の情報は各自用意したものを設定してください**
