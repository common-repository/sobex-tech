<?php
defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

delete_option('stsearch_opts');
delete_option('stsearch_style_opts');

global $wpdb;
$table_name = $wpdb->prefix.'sobex_tech_widget_sidebar';
$sql = "DROP TABLE IF EXISTS $table_name";
$wpdb->query($sql);

$table_name = $wpdb->prefix.'sobex_tech_widget_menu';
$sql = "DROP TABLE IF EXISTS $table_name";
$wpdb->query($sql);

?>