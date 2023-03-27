# WordPress Basic Template Theme with Webpack

WordPress用のwebpackベースのテンプレート。<br>
便利そうな関数、ウィジェット、カスタムブロックなどを登録しているため、不要のものは削除して使用すること。

## WordPressの機能

- パンくずリスト
- グーテンベルクエディタサポート
- ページネーション
- カスタム投稿タイプ雛形
- デフォルトのサイトマップ機能を無効化
- OGP生成（自作関数）
- 人気記事
- タグをチェックボックスから選択
- GoogleFonts読み込み

## JavaScriptの機能

- トップへ戻る（スムーススクロール）
- ユニークユーザIDを生成（session strage）


## 推奨プラグイン

- [User Role Editor](https://ja.wordpress.org/plugins/user-role-editor/)
- [Adminimize](https://ja.wordpress.org/plugins/adminimize/)
- [Easy Table of Contents](https://ja.wordpress.org/plugins/easy-table-of-contents/)
- [Genesis Custom Blocks](https://ja.wordpress.org/plugins/genesis-custom-blocks/)
- [WP Multibyte Patch](https://ja.wordpress.org/plugins/wp-multibyte-patch/)
- [Yoast SEO](https://ja.wordpress.org/plugins/wordpress-seo/)
- [XML Sitemaps](https://ja.wordpress.org/plugins/google-sitemap-generator/)

## 開発環境

対象環境
- node.js v16.4.2
- yarn v1.22.17

### セットアップ

```
yarn
yarn dev
```

※テーマを有効化することで表示可能

### ビルド

```
yarn build
```
