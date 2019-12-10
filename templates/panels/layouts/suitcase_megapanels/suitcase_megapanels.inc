<?php

/**
 * Implements hook_panels_layouts().
 */
function suitcase_interim_suitcase_megapanels_panels_layouts() {
  $items['suitcase_megapanels'] = array(
    'title' => t('Suitcase Mega Panel'),
    'category' => t('Suitcase: Mega Panels'),
    'icon' => 'suitcase_megapanels.jpg',
    'theme' => 'suitcase_megapanels',
    'admin css' => 'suitcase_megapanels_admin.css',
    'regions' => array(
      'top_full' => t('Top Full'),
      'top_grow_first' => t('Top Grow First'),
      'top_1' => t('Top 1'),
      'top_2' => t('Top 2'),
      'top_3' => t('Top 3'),
      'top_4' => t('Top 4'),
      'top_grow_last' => t('Top Grow Last'),
      'middle_grow_first' => t('Middle Grow First'),
      'middle_1' => t('Middle 1'),
      'middle_2' => t('Middle 2'),
      'middle_3' => t('Middle 3'),
      'middle_4' => t('Middle 4'),
      'middle_grow_last' => t('Middle Grow Last'),
      'bottom_grow_first' => t('Bottom Grow First'),
      'bottom_1' => t('Bottom 1'),
      'bottom_2' => t('Bottom 2'),
      'bottom_3' => t('Bottom 3'),
      'bottom_4' => t('Bottom 4'),
      'bottom_grow_last' => t('Bottom Grow Last'),
      'bottom_full' => t('Bottom Full'),
    ),
  );
  return $items;
}


