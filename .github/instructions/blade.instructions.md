---
applyTo: "resources/views/**/*.blade.php"
---

# Blade（View）指示

- HTML は最小限で読みやすく
- ユーザー入力の表示は必ずエスケープ（Blade の {{ }} を使う）
- フォームはエラー表示（全体要約 + 各フィールド）を必須
- 削除は confirm() 程度の最小 JS のみ許可
