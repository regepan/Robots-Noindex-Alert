<?php
/*
Plugin Name: Robots Noindex Alert
Description: 「表示設定」の「検索エンジンでの表示」が「インデックスしない」になっている場合に管理画面全ページに警告メッセージを表示します。
Version: 1.0.0
Author: Sasaki Yuto
Plugin URI: https://github.com/regepan/Robots-Noindex-Alert
*/

class Robots_Noindex_Alart {
    public function __construct() {
        add_action('init', array($this, 'initialize'));
    }

    public function initialize() {
        add_action('admin_notices', array($this, 'display_noindex_alert'));
    }

    public function display_noindex_alert() {
        $index_setting = get_option('blog_public');

        if ($index_setting == 0) {
            ?>
            <div class="notice notice-error">
                <p>
                    <?php

                    _e('警告: &lt;meta name=&quot;robots&quot; content=&quot;noindex, nofollow&quot; /&gt; が設定されています。「<a href="' . admin_url('options-reading.php') . '">検索エンジンでの表示</a>」でこの設定を変更できます。', 'robots-noindex-alart');

                    ?>
                </p>
            </div>
            <?php
        }
    }
}

new Robots_Noindex_Alart();
