# GitHub Copilot リポジトリ指示（必読）

あなた（Copilot）が実装者です。人間は仕様書・変更依頼・コーディングルールのみを書きます。
コードの作成、修正、リファクタ、テスト、Docker 対応はすべてあなたが行います。

## 最優先ドキュメント（ソースオブトゥルース）

- docs/SPEC.md
- docs/コーディングルール.md

仕様と実装が矛盾する場合は、仕様を正として実装を修正してください。

## 進め方（必須）

1. 変更前に docs/SPEC.md と docs/コーディングルール.md を読む
2. 仕様が不足/矛盾している場合：
   - 勝手に要件を増やさない
   - docs/SPEC.md に「未確定事項（Open Questions）」を追記
   - 最小で安全な仮定で実装を進める

## 品質ゲート（必ず満たす）

- ローカルで以下が動くこと：
  - `composer install`
  - `php artisan migrate`
  - `php artisan test`
  - `php artisan serve`
- Docker で以下が動くこと：
  - `docker compose up --build`
  - http://localhost:8000 でアクセス可能
- 入力バリデーション、404/500 のエラーハンドリングを実装
- DB は ORM（Eloquent）またはクエリビルダを使い、安全な実装にする
- 重要ロジックには最小限の自動テストを追加
- 初学者が読める分かりやすいコード（過度な抽象化禁止）
- README に実行手順を正確に記載
