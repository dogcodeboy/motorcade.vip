<?php
if (php_sapi_name() !== 'cli') { echo "Run via WP-CLI\n"; exit(1); }
if (!function_exists('wp_insert_attachment')) { echo "WP not loaded\n"; exit(1); }
if (!function_exists('wp_generate_attachment_metadata')) require_once ABSPATH.'wp-admin/includes/image.php';
$args = $argv; array_shift($args);
if (count($args) < 1) { echo "No files provided\n"; exit(0); }
$uploads = wp_upload_dir();
$base_dir = $uploads['basedir'];
$base_url = $uploads['baseurl'];
$imported=0; $skipped=0; $errors=0;
foreach ($args as $file_path) {
  $file_path = trim($file_path);
  if ($file_path === '') continue;
  if (!file_exists($file_path)) { echo "ERROR missing: $file_path\n"; $errors++; continue; }
  if (strpos($file_path, $base_dir) !== 0) { echo "SKIP not in uploads: $file_path\n"; $skipped++; continue; }
  $rel = ltrim(str_replace($base_dir, '', $file_path), '/');
  $url = rtrim($base_url, '/') . '/' . str_replace(DIRECTORY_SEPARATOR, '/', $rel);
  $existing_id = attachment_url_to_postid($url);
  if ($existing_id) { echo "OK exists ($existing_id) $url\n"; $skipped++; continue; }
  $filename = basename($file_path);
  $filetype = wp_check_filetype($filename, null);
  $attachment = array(
    'guid' => $url,
    'post_mime_type' => $filetype['type'],
    'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
    'post_content' => '',
    'post_status' => 'inherit',
  );
  $attach_id = wp_insert_attachment($attachment, $file_path);
  if (is_wp_error($attach_id) || !$attach_id) { echo "ERROR insert: $file_path\n"; $errors++; continue; }
  $meta = wp_generate_attachment_metadata($attach_id, $file_path);
  if (!is_wp_error($meta) && is_array($meta)) wp_update_attachment_metadata($attach_id, $meta);
  echo "IMPORTED $attach_id $url\n";
  $imported++;
}
echo "Summary: imported=$imported skipped=$skipped errors=$errors\n";
exit($errors>0?1:0);
