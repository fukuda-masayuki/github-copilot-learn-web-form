# Laravel CRUD Form（仕様駆動）

実装は GitHub Copilot が docs/SPEC.md と docs/CODING_RULES.md に基づいて行います。
人間は仕様（SPEC）と変更依頼のみを更新します。

## 仕様

- [docs/SPEC.md](docs/SPEC.md)
- [docs/CODING_RULES.md](docs/CODING_RULES.md)

## ローカル実行（Dockerなし）

前提：PHP 8.2+ / Composer がインストール済み。

```bash
composer install
cp .env.example .env
php artisan key:generate
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate
php artisan serve
```

ブラウザで `http://localhost:8000` を開きます。

## テスト

```bash
php artisan test
```

## Docker実行（学習向け簡易構成）

前提：Docker Desktop などで Docker デーモンが起動していること。

```bash
docker compose up --build
```

ブラウザで `http://localhost:8000` を開きます。

※ 初回起動時はコンテナ側で `.env` 作成と `APP_KEY` 生成、`migrate` を自動実行します。

テストをDockerで実行する場合：

```bash
docker compose run --rm app php artisan test
```
