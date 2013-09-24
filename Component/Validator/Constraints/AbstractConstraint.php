<?php

/**
 *
 * @author Kadir Yuecel <ky@clicktrend.de> Click Trend Media GmbH www.clicktrend-media.com
 */

namespace Clicktrend\Bundle\FrontendValidationBundle\Component\Validator\Constraints;

abstract class AbstractConstraint {

    protected $translator;
    protected $originalConstraint;

    public function __construct($originalConstraint, $translator) {
        $this->originalConstraint = $originalConstraint;
        $this->translator = $translator;
    }
    
    abstract public function getDataAttributes();
    
}