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

  // Set up the checkbox to show/hide the gold border on the Site Header
  $form['iastate_theme_settings']['gold_border_hidden'] = array(
    '#type'         => 'checkbox',
    '#title'        => t('Hide gold border'),
    '#default_value' => theme_get_setting('gold_border_hidden'),
    '#description'  => t('Check this option to hide the gold border on the red header.'),
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
  
  // Copyright details field
  $form['iastate_copyright'] = array(
    '#type'         => 'details',
    '#title'        => t('Copyright Info'),
    '#description'  => t(''),
    '#weight' => -800,
    '#open' => TRUE,
    );
  
  // Checkbox to use copyright defaults, default_copyright boolean variable
  $form['iastate_copyright']['default_copyright'] = array(
	'#type'		=> 'checkbox',
	'#title'	=> t('Use copyright defaults supplied by the theme'),
	'#default_value'	=> theme_get_setting('default_copyright'),
	'#tree'		=> '',
	);

  // Hiding functionality dependent on 'default_copyright'
  $form['iastate_copyright']['settings'] = array(
	'#type'	=> 'container',
	'#states'	=> array(
	  'invisible'	=> array(
	    'input[name="default_copyright"]' => array(
		  'checked'	=> true
		  ),
		),
	  ),
	);

  // Creates wysiwyg restricted editor field, text value saved in copyright_subject['#text'] of render array
  $form['iastate_copyright']['settings']['copyright_subject'] = array(
	'#type'	=> 'text_format',
	'#title'	=> t('Copyright subject'),
	'#allowed_formats'	=> [ 'wysiwyg' ],
	// Tenery checks to see if 'use defaults' checkbox is enabled, if so we use a default if not take user input
	// Value is also reflected in respective theme setting field
	'#default_value'	=> theme_get_setting('default_copyright') ? 'Copyright © 1995-'. date("Y") . '<br><a href="https://www.iastate.edu/">Iowa State University of Science and Technology.</a> All rights reserved.<br>2150 Beardshear Hall<br>Ames, IA 50011-2031<br>(800) 262-3804<br><br><a href="https://www.iastate.edu/">Iowa State University</a> | <a href="https://www.extension.iastate.edu/legal">Policies</a><br><a href="http://nifa.usda.gov/partners-and-extension-map">State & National Extension Partners</a>' : theme_get_setting('copyright_subject')['value'],
    );

  // Create a section for footer content
  $form['iastate_footer_contact'] = array(
    '#type'         => 'details',
    '#title'        => t('Contact Info'),
    '#description'  => t('Contact information is displayed in the footer'),
    '#weight'       => -998,
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
    '#weight' => -800,
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

  // Weight variable affects ordering
  $form['logo']['#weight'] = 20;

  $form['site_logo_alttext_url'] = array(
	'#type'	=> 'details',
    '#title'	=> t('Logo Image Alternative Text & URL'),
    '#description'	=> t('Designate alternative text and URL for logo'),
	'#weight'	=> 30,
	'#open'	=> TRUE,
    );

  $form['site_logo_alttext_url']['default_site_logo_alttext_url'] = array(
	'#type'		=> 'checkbox',
	'#title'	=> t('Use the default alternative text and URL supplied by the theme for logo'),
	'#default_value'	=> theme_get_setting('default_site_logo_alttext_url'),
	'#tree'		=> '',
	);

  $form['site_logo_alttext_url']['settings'] = array(
	'#type'	=> 'container',
	'#states'	=> array(
	  'invisible'	=> array(
	    'input[name="default_site_logo_alttext_url"]' => array(
		  'checked'	=> true
		  ),
		),
	  ),
	);

  $form['site_logo_alttext_url']['settings']['site_logo_alttext'] = array(
	'#type'	=> 'textfield',
	'#title'	=> t('Logo alternative text'),
	'#description'  => t('Alternative text for logo image'),
	// Tenery checks to see if 'use defaults' checkbox is enabled, if so we use a default if not take user input
	// Value is also reflected in respective theme setting field
	'#default_value'	=> theme_get_setting('default_site_logo_alttext_url') ? 'Iowa State University Extension and Outreach' : theme_get_setting('site_logo_alttext'),
    );

  $form['site_logo_alttext_url']['settings']['site_logo_url'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Logo URL'),
    '#description' => t('Link the logo image to a different website.'),
	// Tenery checks to see if 'use defaults' checkbox is enabled, if so we use a default if not take user input
	// Value is also reflected in respective theme setting field
    '#default_value'  => theme_get_setting('default_site_logo_alttext_url') ? 'https://www.extension.iastate.edu' : theme_get_setting('site_logo_url'),
    );

  // Create a section for footer logo
  $form['iastate_footer_logo'] = array(
	'#type'	=> 'details',
    '#title'	=> t('IASTATE Footer Logo'),
    '#description'	=> t('Designate a logo for the footer'),
	'#weight'	=> 40,
	'#open'	=> TRUE,
    );

  $form['iastate_footer_logo']['default_footer_logo'] = array(
	'#type'		=> 'checkbox',
	'#title'	=> t('Use the logo supplied by the theme'),
	'#default_value'	=> theme_get_setting('default_footer_logo'),
	'#tree'		=> '',
	);

  $form['iastate_footer_logo']['settings'] = array(
	'#type'	=> 'container',
	'#states'	=> array(
	  'invisible'	=> array(
	    'input[name="default_footer_logo"]' => array(
		  'checked'	=> true
		  ),
		),
	  ),
	);

  $form['iastate_footer_logo']['settings']['iastate_footer_logo_path'] = array(
    '#type'	=> 'textfield',
    '#title'	=> t('Path to custom footer logo'),
    '#description' => t('Examples: logo.svg (for a file in the public filesystem), public://logo.svg, or themes/contrib/iastate_theme/logo.svg.'),
	// Tenery checks to see if 'use defaults' checkbox is enabled, if so we use a default if not take user input
	// Value is also reflected in respective theme setting field
    '#default_value'  => theme_get_setting('default_footer_logo') ? 'themes/custom/iastate_theme/images/wordmark-stacked.svg' : theme_get_setting('iastate_footer_logo_path'),
    ); 

  $form['iastate_footer_logo']['settings']['iastate_footer_logo_alttext'] = array(
	'#type'	=> 'textfield',
	'#title'	=> t('Footer logo alternate text'),
	'#description'  => t('Alternative text for footer logo image'),
	// Tenery checks to see if 'use defaults' checkbox is enabled, if so we use a default if not take user input
	// Value is also reflected in respective theme setting field
	'#default_value'	=> theme_get_setting('default_footer_logo') ? 'Iowa State University Extension and Outreach' : theme_get_setting('iastate_footer_logo_alttext'),
    );

  $form['iastate_footer_logo']['settings']['iastate_footer_logo_url'] = array(
    '#type'   => 'textfield',
    '#title'  => t('Footer logo URL'),
    '#description' => t('Link the footer logo to a different website.'),
	// Tenery checks to see if 'use defaults' checkbox is enabled, if so we use a default if not take user input
	// Value is also reflected in respective theme setting field
    '#default_value'  => theme_get_setting('default_footer_logo') ? 'https://www.extension.iastate.edu' : theme_get_setting('iastate_footer_logo_url'),
    );

  // Create a section for social media links
  $form['iastate_social_footer'] = array(
    '#type'         => 'details',
    '#title'        => t('Social Media Icons'),
    '#description'  => t('A row of social media icon links displayed under footer logo'),
    '#weight' => 45,
    '#open' => TRUE,
    );
  
  $form['iastate_social_footer']['default_social_footer'] = array(
	'#type'		=> 'checkbox',
	'#title'	=> t('Show social footer icons'),
	'#default_value'	=> theme_get_setting('default_social_footer'),
	'#tree'		=> '',
	);

  // Weight variable affects ordering
  $form['favicon']['#weight'] = 50;

}

