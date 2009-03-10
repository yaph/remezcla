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
var_dump($items);
if ($items) {
  $tpl = '<li><a href="%s">%s</a></li>';
  foreach ($items['items'] as $item) {
    print sprintf($tpl, $item['url'], $item['title']);
  }
}
else {
  print 'No results';
}
