<?php

/**
 *
 * @author Kadir Yuecel <ky@clicktrend.de> Click Trend Media GmbH www.clicktrend-media.com
 */

namespace Clicktrend\Bundle\FrontendValidationBundle\Component\Validator\Constraints;

class NotBlank extends AbstractConstraint {
    
    public function getDataAttributes() {
        
        $attr = array();

        $attr['data-validation-required-message'] = $this->originalConstraint->message;
        
        return $attr;
    }
}