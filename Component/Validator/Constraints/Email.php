<?php

/**
 *
 * @author Kadir Yuecel <ky@clicktrend.de> Click Trend Media GmbH www.clicktrend-media.com
 */

namespace Clicktrend\Bundle\FrontendValidationBundle\Component\Validator\Constraints;

class Email extends AbstractConstraint {
    
    public function getDataAttributes() {
        
        $attr = array();

        $attr['data-validation-email-message'] = $this->originalConstraint->message;
        
        return $attr;
    }
}