<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>><!-- ページごとにクラスを追加する機能（クラス名は例えばフロントページなら「home page」など決まっている） -->
    <header>
        <h1 class="site-title"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.jpg"></a></h1>
        <input id="menu" type="checkbox" class="hidden">
        <label for="menu" class="open"><i class="bi bi-list"></i></label>
        <div class="drawer">
            <label for="menu" class="close"><i class="bi bi-x"></i></label>
                <!-- ヘッダーにメニューを表示 -->
                <?php $args =array(//まず変数$argsを作ってarray()の中にデータを入れる。
                    'theme_location' => 'header_nav',// functions.phpで設定したメニューの名前を設定 //
                    'container' => 'nav',// <nav>タグを自動で出力してくれる。必ず書かなくてもデフォルトでは<div>タグを出力する。 //
                );
                wp_nav_menu($args);//メニューを表示
                ?>
        </div>
    </header>