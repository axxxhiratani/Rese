# Rese

## 1.アプリ概要

**Rese は、ある企業のグループ会社の飲食店予約サービスです。**

-   アプリケーション URL  
    http://limitless-wave-90876.herokuapp.com

![home](https://user-images.githubusercontent.com/91531795/155330915-e217bb0d-e7ac-43b3-8fce-f0d155077d3b.png)

## 2.ER 図

![Chunk Database - ページ 1 (4)](https://user-images.githubusercontent.com/91531795/155494347-fe2d380b-aeff-4d12-8254-8793722277b0.png)

## 3.アプリの機能一覧

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

## 4.環境構築

```
//①コンテナの立ち上げ
./vendor/bin/sail up -d

//②マイグレーションの実行
./vendor/bin/sail artisan migrate

//③シーダーの実行
./vendor/bin/sail artisan db:seed
```
