<?php
/**
 * @file
 * The PHP page that serves all page requests on a remezcla installation.
 *
 * Dispatch control to the appropriate handler, which then
 * prints the appropriate page.
 *
 * All remezcla code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 */
#Hewlett-Packard, Asus, Acer, MSI, Dell

include('./inc/bootstrap.php');
$amazon = new Amazon($config['AMAZON']);
$params = array(
  'Keywords' => 'Linux',
  'Sort' => 'salesrank',
  'Manufacturer' => 'Asus',
);
$items = $amazon->ItemSearch($params);
$html = '';
if ($items) {
  $html .= '<ul>';
  $tpl = '<li><a href="%s">%s</a></li>';
  foreach ($items['items'] as $item) {
    $html .= sprintf($tpl, $item['url'], $item['title']);
  }
  $html .= '</ul>';
}
else {
  $html .= '<p>No results</p>';
}

if (isset($_GET['js'])) {
  header('Content-type: text/javascript');
  print $html;
}
else {
  header('Content-type: text/html');
  $site['content'] = $html;
  
  // load the template
  require $path_template . 'layout.tpl.php';
}