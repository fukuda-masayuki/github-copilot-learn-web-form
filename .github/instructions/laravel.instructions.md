---
applyTo: "**/*.php"
---

# Laravel 実装指示

- ルーティングは routes/web.php を使用
- CRUD は Resource Controller を基本とする
- DB は Eloquent を基本とする（必要なら Form Request でバリデーション）
- 例外/404/500 は Laravel 標準の仕組みを活用しつつ、ユーザー向け表示を整える
- ビューは Blade（resources/views）で実装する
- 依存追加は最小限にする（採用理由を README か docs に一言残す）
