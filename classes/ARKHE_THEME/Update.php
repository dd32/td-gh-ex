<?php
namespace ARKHE_THEME;

use \ARKHE_THEME\Data;
if ( ! defined( 'ABSPATH' ) ) exit;

class Update {

	private function __construct() {}

	/**
	 * バージョンチェック
	 */
	public static function version_check() {

		// 現在のバージョンを取得
		$now_version = Data::$arkhe_version;

		// データベースに保存されているバージョンデータを取得
		$old_ver = get_theme_mod( 'version' );

		// まだバージョン情報が記憶されていない（インストール時）、 DB更新だけ
		if ( false === $old_ver ) {
			set_theme_mod( 'version', $now_version );
			return;
		}

		// アップデート時の処理
		if ( $now_version !== $old_ver ) {
			set_theme_mod( 'version', $now_version );
		}
	}

}
