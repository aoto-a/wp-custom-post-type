<?php

/////////////////////////////////////////////////////////////

// 各種ファイルの読み込み
function enqueue_scripts() {
    // CSSファイル
    wp_enqueue_style('main', get_stylesheet_uri());
    //bootstrap
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css');
    //google-fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Roboto&display=swap');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

/////////////////////////////////////////////////////////////

// 各種機能（テーマに登録するもの）

function theme_setup() {
    // ページごとの<title>タグを表示
    add_theme_support('title-tag');

    //アイキャッチ画像を登録
    add_theme_support('post-thumbnails');

    // カスタム投稿タイプ
    register_post_type('preblog', [
        'labels' => [
            'name' => '社長のブログ',// ブログ一覧のトップに表示される名前
            'singular_name' => '社長のブログ',// 複数形。英語の場合
            'menu_name' => '社長のブログ',// 管理画面のメニューに表示される名前
            // 'name_admin_bar' => '',// アドミンバー「社長のブログ」になっているところ。デフォルトのままで良いので設定しない
            'add_new' => 'ブログを追加',// 管理画面のメニューとブログ一覧のトップに表示される
            'add_new_item' => '新規追加',//投稿画面のトップに表示される名前（新規作成時）
            'new_item' => 'あたらしいとうこう',
            'edit_item' => 'ブログを編集',//投稿画面のトップに表示される名前（編集時）
            'view_item' => 'ブログ一覧を表示',// アドミンバーに表示される...わけではないみたい
            'all_items' => '全てのブログ',// 管理画面のメニューに表示される一覧名
            'search_items' => 'ブログを検索',//ブログ一覧画面の右上のほうに表示される
            'parent_item_colon' => '「親〜：」のテキスト。階層あり投稿タイプのときのみ使われる。デフォルトは "Parent Page"。',
            'not_found' => 'ブログは見つかりませんでした',
            'not_found_in_trash' => 'ゴミ箱は空です',
        ],
        'public' => true,
        'has_archive' => true,
        'hierarchical' => false,//投稿タイプにするか固定ページのように階層を持たせるか
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-write-blog',// 管理画面のメニューに表示される名前に付けるアイコン
    ]);
    // カスタム投稿タイプのカテゴリー
    register_taxonomy('preblog_category', 'preblog', [
        'labels' => [
            'name' => 'ブログカテゴリー',
        ],
        'hierarchical' => true,// falseならタグ
    ]);
}
add_action('after_setup_theme', 'theme_setup');

function add_menus() {
    // カスタムメニューを登録
    register_nav_menus(array(
        // ↓メニューの名前　↓メニューが表示される位置の説明
        'header_nav' => 'ヘッダーに表示されるナビゲーション'
    ));
}
add_action('after_setup_theme', 'add_menus');

/////////////////////////////////////////////////////////////

