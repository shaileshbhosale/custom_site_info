<?php

namespace Drupal\custom_site_info\Controller;

use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class CustomSiteInfoForm.
 */
class ShowPageJson {

  /**
   * {@inheritdoc}
   */
  public function nodeAccess($site_api_key, NodeInterface $node) {
    // Get site api key from configuration.
    $site_api_key_conf = \Drupal::config('system.site')->get('siteapikey');

    // Check if node id provided in url is of type page, the configuration key
    // is saved and matches with provided key in url.
    if ($node->getType() == 'page' && $site_api_key_conf && $site_api_key_conf === $site_api_key) {
      // Respond with JSON representation of the given node.
      return new JsonResponse($node->toArray(), 200, ['Content-Type' => 'application/json']);
    }

    // Respond with access denied.
    return new JsonResponse(["error" => "access denied"], 401, ['Content-Type' => 'application/json']);
  }

}
