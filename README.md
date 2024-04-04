# WordPress Basic Template Theme with Webpack

WordPress 用の webpack ベースのテンプレート。

## 機能 ( /functions/\* )

不要なものはファイルごと削除すること。

### 雛形

- カスタム投稿タイプ雛形 ( custom-post-sample.php )
- メニュー追加雛形 ( menu.php )

### 機能

- タグとカテゴリーアーカイブのタイトル表示の出力調整 ( archive-title.php )
- パンくずリスト ( breadcrumb.php )
- Contact Form 7 p と br を削除 ( contact-form-7.php )
- 独自関数 ( function.php )
- グーテンベルクエディタサポート ( gutenberg.php )
- HTML5 サポート ( html5.php )
- iframe の使用を許可 ( iframe.php )
- デフォルトのサイトマップ機能を無効化 ( invalid-default-sitemap.php )
- 人気記事 ( popular-posts.php )
- 一覧ページの件数表示の出し分け ( post-per-page.php )
- 投稿設定 ( post.php )
- wp_head の不要なタグ削除 ( remove.php )
- 検索結果に投稿以外を出力しない ( search.php )
- タグをチェックボックス式で選択 ( tag-select.php )
- CSS／JavaScript／Google Fonts ( theme-scripts.php )
- アイキャッチ設定 ( thumbnail.php )
- title 設定 ( title.php )
- ウィジェット設定 ( wiget.php )
- CSS や JS の外部ファイルから末尾の ?ver=x.x.x を削除 ( remove-file-versions.php )
- OGP 生成（ ogp.php ）

## コンポーネント ( /components/\* )

style は未設定。<br>`<?php get_template_part('components/breadcrumb'); ?>`でテンプレートに挿入して使用する。

- パンくずリスト ( breadcrumb.php )
- ページトップリンク ( go-to-top.php )
- ページネーション ( pagination.php )

## JavaScript

jQuery 対応。ES Modules を採用しているため 1 機能 1 ファイルで管理すること。

- ユニークユーザ ID を生成（session strage）

## CSS

Sass を使用。1 機能 1 ファイルで管理する。<br>設計のベースは FLOCSS を採用。

### foundation

設定やベースとなるスタイルを定義。

### layout

header や footer など大きな単位のレイアウトを定義。

### object/component

2 箇所以上で使用するパーツを共通パーツとし、スタイルを定義。<br>1 パーツ 1 ファイルとすること。

### object/project

共通パーツにならないページ単位やセクション単位のスタイルを定義する。

### object/utility

ユーティリティ class を定義する。

### パーシャルファイルの挿入

パーシャルファイルを作成するたびに `project.scss` に追加することで反映される。<br>ブロックエディタにもスタイルを反映させたい場合には`editor-style.scss`にも挿入する。

## 推奨プラグイン

### 必須レベル

- 日本語対応 ／ [WP Multibyte Patch](https://ja.wordpress.org/plugins/wp-multibyte-patch/)

### ユーザ権限

- ユーザ権限拡張 ／ [User Role Editor](https://ja.wordpress.org/plugins/user-role-editor/)
- 権限に伴う管理画面の表示管理 ／ [Adminimize](https://ja.wordpress.org/plugins/adminimize/)

### 機能拡張

- カスタムフィールド ／ [Advanced Custom Fields](https://ja.wordpress.org/plugins/advanced-custom-fields/)
- ブロックエディタ拡張 ／ [Genesis Custom Blocks](https://ja.wordpress.org/plugins/genesis-custom-blocks/)
- バックアップ ／ [All-in-One WP Migration](https://ja.wordpress.org/plugins/all-in-one-wp-migration/)
- 目次 ／ [Easy Table of Contents](https://ja.wordpress.org/plugins/easy-table-of-contents/)
- SEO ／ [Yoast SEO](https://ja.wordpress.org/plugins/wordpress-seo/)
- サイトマップ ／ [XML Sitemaps](https://ja.wordpress.org/plugins/google-sitemap-generator/)
- FTP ／ [File Manager](https://ja.wordpress.org/plugins/wp-file-manager/)
- フォーム ／ [Contact Form 7](https://ja.wordpress.org/plugins/contact-form-7/)
- マルチステップフォーム ／ [Contact Form 7 Multi-Step Forms](https://ja.wordpress.org/plugins/contact-form-7-multi-step-module/)

※SEO 関連のプラグインを入れる場合は functions から OGP 生成関数を削除すること。

## 開発環境

対象環境

- node.js v20.5.1
- yarn v1.22.17

### セットアップ

セットアップ後に管理画面からテーマを有効化することで使用可能。<br>CSS や JavaScript を編集する際には開発環境を必ず立ち上げている必要がある。

```
yarn
yarn dev
```

### ビルド

```
yarn build
```

## デプロイ

ビルドしてからこのテーマフォルダごとアップロードする。<br>node_modules や git など不要なものを削除してからアップロードすると良い。
