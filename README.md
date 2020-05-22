# Requirements
This module needs to alter the existing Drupal "Site Information" form.
When logged in as the administrator, the "Site Information" form can be found at the path /admin/config/system/site-information.
Specifics:
- A new form text field named "Site API Key" needs to be added to the "Site Information" form with the default value of “No API Key yet”.
- When this form is submitted, the value that the user entered for this field should be saved as the system variable named "siteapikey".
- A Drupal message should inform the user that the Site API Key has been saved with that value.
- When this form is visited after the "Site API Key" is saved, the field should be populated with the correct value.
- The text of the "Save configuration" button should change to "Update Configuration".
- This module also provides a URL that responds with a JSON representation of a given node with the content type "page" only if the previously submitted API Key and a node id (nid) of an appropriate node are present, otherwise it will respond with "access denied".

## Resources
- [Create a Drupal 8 module using Drupal Console](https://www.cloudways.com/blog/how-to-create-a-drupal-8-module-via-drupal-console/)
- [Custom JSON response](https://drupal-up.com/blog/custom-drupal-8-module-json-response)
- [How to remove system.site configurations on module uninstall](https://www.drupal.org/forum/support/module-development-and-code-questions/2015-09-09/how-to-remove-mymodule-configurations)
- [Coding standards](https://www.drupal.org/project/coder)

## Total time to complete task
6 Hours

## Note
It is not very clear whether to change text of "Save configuration" button to
 "Update Configuration" after adding Site API Key or keep it changed forever.
 For now I have changed it to "Update Configuration" in any condition.
 But it can be changed depending on whether Site API Key is entered or not.
