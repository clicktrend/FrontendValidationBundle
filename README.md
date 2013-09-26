ClicktrendFrontendValidationBundle
==================================

jQuery Validation using Symfony2 Constraints and Twitter Bootstrap.

Installation
------------

Install this bundle using composer

> composer.phar require clicktrend/frontend-validation-bundle:dev-master

Register the bundle in àpp/AppKernel.php`

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Clicktrend\Bundle\FrontendValidationBundle\ClicktrendFrontendValidationBundle(),
        );
    }

Add assets files to assetic bundle in `app/config/config.yml`

    assetic:
        assets:
            jquery_validation:
                inputs:
                    - %kernel.root_dir%/../vendor/reactive-raven/jq-bootstrap-validation/src/jqBootstrapValidation.js
                output: js/jqBootstrapValidation.js

Add `js/jqBootstrapValidation.js` to project

Usage
-----

Example for annotation usage

    /**
     * @Assert\NotBlank(groups={"registration_finish"})
     * @Assert\Length(
     *      min="4", 
     *      max="12",
     *      minMessage = "form.username.min_length",
     *      maxMessage = "form.username.max_length",
     *      groups={"registration_finish"})
     */
    protected $username;

Actually only four constraints are implemented: Email, Length, NotBlank and Regex.

Example HTML form

    <form class="form-horizontal" action="{{ path('registration') }}" {{ form_enctype(form) }} method="POST" novalidate>
        {{ form_widget(form)}}
        <!-- detailed example
        <div class="row-fluid">
            <div class="control-group">
                <div class="controls-row">
                    {{ form_widget(form.email, { 'attr': {'id': 'email-field', 'class': 'span12', 'placeholder': 'form.email.label'|trans(), 'data-validation-required-message': 'form.email.not_blank'|trans(), 'data-validation-email-message': 'form.email.not_valid'|trans()} }) }}
                    <div class="help-block"></div>
                    <small> {{ 'form.email.help'|trans() }} {{ form_errors(form.email) }}</small>
                </div>
            </div><!-- End .control-group  -->
        </div><!-- End .row-fluid  -->
        -->
    </form>

Tip
---

To validate NotBlank with validation script add "novalidate" attribute to form 
element to skip HTML5 validation.