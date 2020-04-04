<?php

namespace Drupal\custom_site_info\Form;

use Drupal\system\Form\SiteInformationForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CustomSiteInfoForm.
 */
class CustomSiteInfoForm extends SiteInformationForm {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_site_info_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Get system site configurations.
    $site_config = $this->config('system.site');
    $form = parent::buildForm($form, $form_state);
    $form['site_information']['siteapikey'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Site API Key'),
      '#description' => $this->t('Custom Site API Key'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $site_config->get('siteapikey'),
      '#placeholder' => t('No API Key yet'),
      '#weight' => '3',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Get system site configurations.
    $site_config = $this->config('system.site');
    // Get site api key from form.
    $site_api_key = $form_state->getValue('siteapikey');
    // Save site api key.
    $site_config->set('siteapikey', $site_api_key)->save();
    parent::submitForm($form, $form_state);

    // Show message after save.
    $this->messenger()->addMessage($this->t('Site API Key has been saved with value: %value', ['%value' => $site_api_key]));
  }

}
