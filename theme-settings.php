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

/**
 * Implementation of hook_form_system_theme_settings_alter()
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 *
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function iastate_theme_form_system_theme_settings_alter(&$form, &$form_state) {

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

  // Create a section for footer content
  $form['iastate_footer_settings'] = array(
    '#type'         => 'details',
    '#title'        => t('IASTATE Footer Settings'),
    '#description'  => t('This information will be displayed in the footer'),
    '#weight'       => -999,
    '#open'         => TRUE,
    );

  // Textarea for contact address
  $form['iastate_footer_settings']['iastate_contact_address'] = array(
    '#type'           => 'textarea',
    '#title'          => t('Contact address'),
    '#default_value'  => theme_get_setting('iastate_contact_address'),
    );

  // Email
  $form['iastate_footer_settings']['iastate_contact_email'] = array(
    '#type'           => 'email',
    '#title'          => t('Contact email'),
    '#default_value'  => theme_get_setting('iastate_contact_email'),
    );

  // Phone
  $form['iastate_footer_settings']['iastate_contact_phone'] = array(
    '#type'           => 'textfield',
    '#title'          => t('Contact phone'),
    '#default_value'  => theme_get_setting('iastate_contact_phone'),
    );

  // Fax
  $form['iastate_footer_settings']['iastate_contact_fax'] = array(
    '#type'           => 'textfield',
    '#title'          => t('Contact fax'),
    '#default_value'  => theme_get_setting('iastate_contact_fax'),
    );
}