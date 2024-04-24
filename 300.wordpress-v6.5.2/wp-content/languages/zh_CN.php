<?php
/**
 * WordPress 简体中文本地化支持
 *
 * @since 6.5.0
 * @updated 2024-04-13
 */

defined( 'ABSPATH' ) || exit;

/**
 * 哔哩哔哩嵌入
 *
 * @since 6.5.0
 */
function cn_embed_handler_bilibili( $matches, $attr, $url, $rawattr ) {
	$width  = "100%";
	$height = 500;
	if ( ! empty( $rawattr['width'] ) && ! empty( $rawattr['height'] ) ) {
		$width  = $rawattr['width'];
		$height = $rawattr['height'];
	}

	$av = $matches['id'];
	$bv = $matches['id'];
	if ( strpos( $matches['id'], 'BV' ) === 0 ) {
		$av = "";
	} else {
		$av = substr( $av, 2 );
		$bv = "";
	}

	$embed = sprintf(
		'<iframe src="//player.bilibili.com/player.html?aid=%1$s&bvid=%2$s&p=1" width="%3$s" height="%4$s" frameborder="0" allowfullscreen></iframe>',
		esc_attr( $av ), esc_attr( $bv ), esc_attr( $width ), esc_attr( $height ) );

	return apply_filters( 'embed_bilibili', $embed, $matches, $attr, $url, $rawattr );
}

wp_embed_register_handler( 'bilibili',
	'#https?://(?:www\.)?bilibili\.com/video/(?<id>[A-Za-z0-9]+)#i',
	'cn_embed_handler_bilibili' );

/**
 * 优酷视频嵌入
 *
 * @since 6.5.0
 */
function cn_embed_handler_youku( $matches, $attr, $url, $rawattr ) {
	$width  = "100%";
	$height = 500;
	if ( ! empty( $rawattr['width'] ) && ! empty( $rawattr['height'] ) ) {
		$width  = $rawattr['width'];
		$height = $rawattr['height'];
	}

	$embed = sprintf(
		'<iframe src="//player.youku.com/embed/%1$s" width="%2$s" height="%3$s" frameborder="0" allowfullscreen></iframe>',
		esc_attr( $matches['id'] ), esc_attr( $width ), esc_attr( $height ) );

	return apply_filters( 'embed_youku', $embed, $matches, $attr, $url, $rawattr );
}

wp_embed_register_handler( 'youku',
	'#https?://v\.youku\.com/v_show/id_(?<id>[A-Za-z0-9=]+)\.html#i',
	'cn_embed_handler_youku' );

/**
 * 腾讯视频嵌入
 *
 * @since 6.5.0
 */
function cn_embed_handler_qq( $matches, $attr, $url, $rawattr ) {
	$width  = "100%";
	$height = 500;
	if ( ! empty( $rawattr['width'] ) && ! empty( $rawattr['height'] ) ) {
		$width  = $rawattr['width'];
		$height = $rawattr['height'];
	}

	$embed = sprintf(
		'<iframe src="//v.qq.com/txp/iframe/player.html?vid=%1$s" width="%2$s" height="%3$s" frameborder="0" allowfullscreen></iframe>',
		esc_attr( $matches['id'] ), esc_attr( $width ), esc_attr( $height ) );

	return apply_filters( 'embed_qq', $embed, $matches, $attr, $url, $rawattr );
}

wp_embed_register_handler( 'qq',
	'#https?://v\.qq\.com/x/page/(?<id>[A-Za-z0-9]+)\.html#i',
	'cn_embed_handler_qq' );


/**
 * ICP 备案号及公安备案号
 *
 * 为了遵守电信管理条例。可以在 wp-config.php 中关闭。
 *
 * @since 6.5.0
 */
function cn_settings_init() {
	if ( defined( 'CN_ICP' ) && CN_ICP ) {
		add_settings_field( 'cn_icp',
			'ICP 备案号',
			'cn_icp_callback',
			'general' );
		register_setting( 'general', 'cn_icp' );
	}
	if ( defined( 'CN_GA' ) && CN_GA ) {
		add_settings_field( 'cn_ga',
			'公安备案号',
			'cn_ga_callback',
			'general' );
		register_setting( 'general', 'cn_ga' );
	}
}

add_action( 'admin_init', 'cn_settings_init' );

function cn_icp_callback() {
	echo sprintf(
		'<input name="cn_icp" type="text" id="cn_icp" value="%s" class="regular-text ltr" />' .
		'<p class="description">仅对部分支持的主题生效。</p>',
		esc_attr( get_option( 'cn_icp' ) )
	);
}

function cn_ga_callback() {
	echo sprintf(
		'<input name="cn_ga" type="text" id="cn_ga" value="%s" class="regular-text ltr" />' .
		'<p class="description">仅对部分支持的主题生效（需自行添加公安图标）。</p>',
		esc_attr( get_option( 'cn_ga' ) )
	);
}

// 带链接的 ICP 备案号
function cn_icp(): string {
	if ( defined( 'CN_ICP' ) && CN_ICP &&
	     get_option( 'cn_icp' ) ) {
		return sprintf(
			'<a target="_blank" href="https://beian.miit.gov.cn/" rel="nofollow">%s</a>',
			esc_attr( get_option( 'cn_icp' ) )
		);
	}

	return '';
}

// 纯文本 ICP 备案号
function cn_icp_text(): string {
	if ( defined( 'CN_ICP' ) && CN_ICP &&
	     get_option( 'cn_icp' ) ) {
		return esc_attr( get_option( 'cn_icp' ) );
	}

	return '';
}

// 带链接的公安备案号
function cn_ga(): string {
	if ( defined( 'CN_GA' ) && CN_GA &&
	     get_option( 'cn_ga' ) ) {
		$ga = preg_replace( '/\D/', '', get_option( 'cn_ga' ) );

		return sprintf(
			'<a target="_blank" href="https://beian.mps.gov.cn/#/query/webSearch?code=%s" rel="nofollow">%s</a>',
			esc_attr( $ga ),
			esc_attr( get_option( 'cn_ga' ) )
		);
	}

	return '';
}

// 纯文本公安备案号
function cn_ga_text(): string {
	if ( defined( 'CN_GA' ) && CN_GA &&
	     get_option( 'cn_ga' ) ) {
		return esc_attr( get_option( 'cn_ga' ) );
	}

	return '';
}

// 注册简码
add_shortcode( 'cn_icp', 'cn_icp' );
add_shortcode( 'cn_icp_text', 'cn_icp_text' );
add_shortcode( 'cn_ga', 'cn_ga' );
add_shortcode( 'cn_ga_text', 'cn_ga_text' );
