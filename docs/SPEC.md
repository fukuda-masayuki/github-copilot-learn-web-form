# 仕様書（SPEC）：Laravel 申込フォーム + CRUD

## 目的
申込（Application）を登録できるWebフォームを作成し、CRUD（作成・一覧・詳細・更新・削除）を提供する。
実装と今後の修正はすべてCopilotが行う。人間は仕様と変更依頼のみを書く。

## 技術スタック（固定）
- Laravel 12
- PHP 8.2 以上
- Blade（サーバーサイドレンダリング）
- SQLite
- Docker + docker-compose（学習向け簡易構成）

## データモデル
### Application（申込）
- id: integer（主キー）
- name: string（必須、1〜100文字）
- email: string（必須、3〜254文字、メール形式）
- message: text（任意、0〜2000文字）
- created_at / updated_at: timestamps

## 画面/ルート（Web）
- GET `/`：`/applications` にリダイレクト
- Resource:
  - GET `/applications`：一覧（新しい順）
  - GET `/applications/create`：新規フォーム
  - POST `/applications`：作成（成功→詳細へ）
  - GET `/applications/{id}`：詳細
  - GET `/applications/{id}/edit`：編集フォーム
  - PUT/PATCH `/applications/{id}`：更新（成功→詳細へ）
  - DELETE `/applications/{id}`：削除（成功→一覧へ）

## バリデーション（必須）
- name：required, string, trim相当, min=1, max=100
- email：required, string, email, min=3, max=254
- message：nullable, string, max=2000

### バリデーションエラー時の挙動
- フォームを再表示
- 画面上部にエラー要約
- 各フィールドのエラー表示
- 入力値を保持

## エラー表示
- 存在しないIDは404表示（ユーザー向けメッセージ）
- 想定外エラーは500表示（ユーザー向けメッセージ）

## 受け入れ条件（Done）
- UIからCRUDが一通り動作する
- 不正入力でも落ちず、エラーが表示される
- SQLiteにデータが永続化される
- `docker compose up --build` で http://localhost:8000 が開く
- `php artisan test` が通る（最小限でOK）
