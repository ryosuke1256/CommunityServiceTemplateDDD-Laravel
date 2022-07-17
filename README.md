## 🎋 なぜやるのか

-   ドメイン駆動設計を実践しながら理解を深める
-   Laravel と PHP のリハビリ（最近書いて無さすぎて書き方を忘れている）

## ⛱ アーキテクチャ

| 項目                         | 　技術  |
| ---------------------------- | ------- |
| フロントエンド、バックエンド | Laravel |
| RDBMS                        | MySQL   |
| インフラ                     | Heroku  |

## 🗽 開発のルール

-   タスクを Github の Issue に切り出す、Issue 毎にプルリクを作成、[
    プルリクと Issue をリンクしてマージする](https://docs.github.com/ja/issues/tracking-your-work-with-issues/linking-a-pull-request-to-an-issue)

## 🦭 Git のルール

-   GitHub Flow
-   コミットメッセージに適切な prefix をつける

## 🔥 使い方

-   `.env`を作成する
-   `composer install`
-   `./vendor/bin/sail up -d`
-   `./vendor/bin/sail artisan sail:publish`
-   `./vendor/bin/sail artisan migrate`
-   `./vendor/bin/sail artisan db:seed --class=ArticleStatusSeeder`
