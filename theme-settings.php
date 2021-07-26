<?php

/**
 * @file
 * This is the heart of creating custom theme settings. You set all of your form options within
 * the form_system_theme_settings_alter hook. From the Drupal API:
 * "With this hook, themes can alter the theme-specific settings form in any way allowable by
 * Drupal's Form API, such as adding form elements, changing default values and removing form
 * elements. See the Form API documentation on api.drupal.org for detailed information."
 * (https://api.drupal.org/api/drupal/core!lib!Drupal!Core!Render!theme.api.php/function/
 * hook_form_system_theme_settings_alter/8)
 *
 */
use \Drupal\Core\Form\FormStateInterface;

/**
 * Implementation of hook_form_system_theme_settings_alter()
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 *
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function iastate_theme_form_system_theme_settings_alter(&$form, FormStateInterface &$form_state) {
  // Logo settings
  $form['logo']['logo_settings'] = array(
    '#type'         => 'details',
    '#title'        => t('Custom logo Settings'),
    '#weight' => 1,
    '#open' => FALSE,
  );

  // Logo alt text
  $form['logo']['logo_settings']['iastate_logo_alt'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Logo alt text'),
    '#default_value'  => theme_get_setting('iastate_logo_alt'),
    '#description' => t('If left blank the alt text will be "Iowa State University logo".'),
  );

  // Logo custom url
  $form['logo']['logo_settings']['iastate_logo_url'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Logo link'),
    '#description' => t('By default the logo is not linked. Use this field to add a link.'),
    '#default_value'  => theme_get_setting('iastate_logo_url'),
  );

  // Logo dimensions description
    $form['logo']['logo_settings']['logo_dimensions'] = array(
    '#type' => 'details',
    '#title' => t('Logo dimensions'),
    '#markup' => t('If you are using a custom logo, set an explicit width and height to improve page load time.'),
  );

  // Logo width
  $form['logo']['logo_settings']['logo_dimensions']['iastate_logo_width'] = array(
    '#type'   => 'number',
    '#title'  => t('Logo width in pixels'),
    '#default_value'  => theme_get_setting('iastate_logo_width'),
  );

  // Logo height
  $form['logo']['logo_settings']['logo_dimensions']['iastate_logo_height'] = array(
    '#type'   => 'number',
    '#title'  => t('Logo height in pixels'),
    '#default_value'  => theme_get_setting('iastate_logo_height'),
  );

  // Create a section for ISU theme settings
  $form['iastate_theme_settings'] = array(
    '#type'         => 'details',
    '#title'        => t('IASTATE Theme Settings'),
    '#description'  => t('Configure IASTATE Theme options'),
    '#weight' => -1000,
    '#open' => TRUE,
  );

  // Set up the checkbox to include/not include
  // $form['WHICH_SECTION']['OPTION_NAME']
  $form['iastate_theme_settings']['isu_navbar'] = array(
    '#type'         => 'checkbox',
    '#title'        => t('Show ISU navbar'),
    '#default_value' => theme_get_setting('isu_navbar'),
    '#description'  => t('Check this option if you\'d like to show the ISU navbar.'),
  );

  // Set up the checkbox to show/hide the gold border on the Site Header
  $form['iastate_theme_settings']['gold_border_hidden'] = array(
    '#type'         => 'checkbox',
    '#title'        => t('Hide gold border'),
    '#default_value' => theme_get_setting('gold_border_hidden'),
    '#description'  => t('Check this option to hide the gold border on the red header.'),
  );

  // Set up the checkbox to show/hide the copyright
  $form['iastate_theme_settings']['iastate_copyright_hidden'] = array(
    '#type'         => 'checkbox',
    '#title'        => t('Hide copyright'),
    '#default_value' => theme_get_setting('iastate_copyright_hidden'),
    '#description'  => t('Check this option to hide the copyright and legal links in the footer.'),
  );

  // Create a section for Unit settings
  $form['iastate_unit_settings'] = array(
    '#type'         => 'details',
    '#title'        => t('Unit'),
    '#description'  => t('Name and url of official university unit, such as a department or center, if the Site Name (as set in Basic Site Settings) is not already the name of the unit.'),
    '#weight'       => -999,
    '#open'         => TRUE,
  );

  // Unit Name
  $form['iastate_unit_settings']['iastate_unit_name'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Unit Name'),
    '#default_value'  => theme_get_setting('iastate_unit_name'),
  );

  // Unit URL
  $form['iastate_unit_settings']['iastate_unit_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Unit URL'),
    '#default_value'  => theme_get_setting('iastate_unit_url'),
  );

  // Create a section for footer content
  $form['iastate_footer_contact'] = array(
    '#type'         => 'details',
    '#title'        => t('Contact Info'),
    '#description'  => t('Contact information is displayed in the footer'),
    '#weight'       => 10,
    '#open'         => TRUE,
  );

  // Contact Title
  $form['iastate_footer_contact']['iastate_contact_title'] = array(
    '#type'           => 'textfield',
    '#title'          => t('Contact Title'),
    '#description'    => t('Appears above contact information'),
    '#default_value'  => theme_get_setting('iastate_contact_title'),
  );

  // Textarea for contact address
  $form['iastate_footer_contact']['iastate_contact_address'] = array(
    '#type'           => 'textarea',
    '#title'          => t('Address'),
    '#default_value'  => theme_get_setting('iastate_contact_address'),
  );

  // Email
  $form['iastate_footer_contact']['iastate_contact_email'] = array(
    '#type'           => 'email',
    '#title'          => t('Email'),
    '#default_value'  => theme_get_setting('iastate_contact_email'),
  );

  // Phone
  $form['iastate_footer_contact']['iastate_contact_phone'] = array(
    '#type'           => 'textfield',
    '#title'          => t('Phone'),
    '#description'    => t('Please use xxx-xxx-xxxx format.'),
    '#default_value'  => theme_get_setting('iastate_contact_phone'),
  );

  // Fax
  $form['iastate_footer_contact']['iastate_contact_fax'] = array(
    '#type'           => 'textfield',
    '#title'          => t('Fax'),
    '#description'    => t('Please use xxx-xxx-xxxx format.'),
    '#default_value'  => theme_get_setting('iastate_contact_fax'),
  );

  // Create a section for associates
  $form['iastate_footer_associates'] = array(
    '#type'         => 'details',
    '#title'        => t('Associates'),
    '#description'  => t('Organization associates are displayed as a list in the footer.'),
    '#weight' => 11,
    '#open' => TRUE,
  );
  
  // 1
  $form['iastate_footer_associates']['iastate_associate1_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Associate 1 Title'),
    '#default_value'  => theme_get_setting('iastate_associate1_title'),
  );

  $form['iastate_footer_associates']['iastate_associate1_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Associate 1 URL'),
    '#default_value'  => theme_get_setting('iastate_associate1_url'),
  );

  // 2
  $form['iastate_footer_associates']['iastate_associate2_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Associate 2 Title'),
    '#default_value'  => theme_get_setting('iastate_associate2_title'),
  );

  $form['iastate_footer_associates']['iastate_associate2_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Associate 2 URL'),
    '#default_value'  => theme_get_setting('iastate_associate2_url'),
  );

  // 3
  $form['iastate_footer_associates']['iastate_associate3_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Associate 3 Title'),
    '#default_value'  => theme_get_setting('iastate_associate3_title'),
  );

  $form['iastate_footer_associates']['iastate_associate3_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Associate 3 URL'),
    '#default_value'  => theme_get_setting('iastate_associate3_url'),
  );

  // 4
  $form['iastate_footer_associates']['iastate_associate4_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Associate 4 Title'),
    '#default_value'  => theme_get_setting('iastate_associate4_title'),
  );

  $form['iastate_footer_associates']['iastate_associate4_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Associate 4 URL'),
    '#default_value'  => theme_get_setting('iastate_associate4_url'),
  );

  $form['iastate_footer_associates']['iastate_associate5_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Associate 5 Title'),
    '#default_value'  => theme_get_setting('iastate_associate5_title'),
  );

  $form['iastate_footer_associates']['iastate_associate5_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Associate 5 URL'),
    '#default_value'  => theme_get_setting('iastate_associate5_url'),
  );

  // 6
  $form['iastate_footer_associates']['iastate_associate6_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Associate 6 Title'),
    '#default_value'  => theme_get_setting('iastate_associate6_title'),
  );

  $form['iastate_footer_associates']['iastate_associate6_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Associate 6 URL'),
    '#default_value'  => theme_get_setting('iastate_associate6_url'),
  );

  // Create a section for social media links
  $form['iastate_footer_social'] = array(
    '#type'         => 'details',
    '#title'        => t('Social Media Links'),
    '#description'  => t('A list of social media links are displayed in the footer.'),
    '#weight' => 11,
    '#open' => TRUE,
  );
  
  // 1
  $form['iastate_footer_social']['iastate_social1_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Social 1 Title'),
    '#default_value'  => theme_get_setting('iastate_social1_title'),
  );

  $form['iastate_footer_social']['iastate_social1_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Social 1 URL'),
    '#default_value'  => theme_get_setting('iastate_social1_url'),
  );

  // 2
  $form['iastate_footer_social']['iastate_social2_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Social 2 Title'),
    '#default_value'  => theme_get_setting('iastate_social2_title'),
  );

  $form['iastate_footer_social']['iastate_social2_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Social 2 URL'),
    '#default_value'  => theme_get_setting('iastate_social2_url'),
  );

  // 3
  $form['iastate_footer_social']['iastate_social3_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Social 3 Title'),
    '#default_value'  => theme_get_setting('iastate_social3_title'),
  );

  $form['iastate_footer_social']['iastate_social3_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Social 3 URL'),
    '#default_value'  => theme_get_setting('iastate_social3_url'),
  );

  // 4
  $form['iastate_footer_social']['iastate_social4_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Social 4 Title'),
    '#default_value'  => theme_get_setting('iastate_social4_title'),
  );

  $form['iastate_footer_social']['iastate_social4_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Social 4 URL'),
    '#default_value'  => theme_get_setting('iastate_social4_url'),
  );

  // 5
  $form['iastate_footer_social']['iastate_social5_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Social 5 Title'),
    '#default_value'  => theme_get_setting('iastate_social5_title'),
  );

  $form['iastate_footer_social']['iastate_social5_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Social 5 URL'),
    '#default_value'  => theme_get_setting('iastate_social5_url'),
  );

  // 6
  $form['iastate_footer_social']['iastate_social6_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Social 6 Title'),
    '#default_value'  => theme_get_setting('iastate_social6_title'),
  );

  $form['iastate_footer_social']['iastate_social6_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Social 6 URL'),
    '#default_value'  => theme_get_setting('iastate_social6_url'),
  );

  // 7
  $form['iastate_footer_social']['iastate_social7_title'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Social 7 Title'),
    '#default_value'  => theme_get_setting('iastate_social7_title'),
  );

  $form['iastate_footer_social']['iastate_social7_url'] = array(
    '#type'   => 'url',
    '#title'  => t('Social 7 URL'),
    '#default_value'  => theme_get_setting('iastate_social7_url'),
  );

  // Create a section for footer logo
  $form['iastate_footer_logo'] = array(
    '#type'         => 'details',
    '#title'        => t('IASTATE Footer Logo'),
    '#description'  => t('Designate a logo for the footer'),
    '#open' => TRUE,
  );

  $form['iastate_footer_logo']['iastate_footer_logo_path'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Path to custom footer logo'),
    '#description' => t('Examples: logo.svg (for a file in the public filesystem), public://logo.svg, or themes/contrib/iastate_theme/logo.svg.'),
    '#default_value'  => theme_get_setting('iastate_footer_logo_path'),
  ); 

  $form['iastate_footer_logo']['iastate_footer_logo_url'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Custom footer logo url'),
    '#description' => t('Link the footer logo to a different website.'),
    '#default_value'  => theme_get_setting('iastate_footer_logo_url'),
  );

  $form['iastate_footer_logo']['iastate_footer_logo_alt'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Footer logo alt text'),
    '#default_value'  => theme_get_setting('iastate_footer_logo_alt'),
    '#description' => t('If left blank the alt text will be Iowa State University logo'),
  );

  // Footer logo dimensions description
  $form['iastate_footer_logo']['footer_logo_dimensions'] = array(
    '#type' => 'details',
    '#title' => t('Logo dimensions'),
    '#description' => t('Set an explicit width and height for the footer logo.'),
  );

  // Footer logo width
  $form['iastate_footer_logo']['footer_logo_dimensions']['iastate_footer_logo_width'] = array(
    '#type'   => 'number',
    '#title'  => t('Footer logo width in pixels'),
    '#default_value'  => theme_get_setting('iastate_footer_logo_width'),
    '#description' => t('Default is 180.'),
  );

  // Footer logo height
  $form['iastate_footer_logo']['footer_logo_dimensions']['iastate_footer_logo_height'] = array(
    '#type'   => 'number',
    '#title'  => t('Footer logo height in pixels'),
    '#default_value'  => theme_get_setting('iastate_footer_logo_height'),
    '#description' => t('Default is 58.'),
  );
}
