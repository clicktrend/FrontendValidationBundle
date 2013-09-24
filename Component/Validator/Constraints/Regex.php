<?php

/**
 *
 * @author Kadir Yuecel <ky@clicktrend.de> Click Trend Media GmbH www.clicktrend-media.com
 */

namespace Clicktrend\Bundle\FrontendValidationBundle\Component\Validator\Constraints;

class Regex extends AbstractConstraint {
    
    public function getDataAttributes() {
        
        $attr = array();

        if($this->originalConstraint->match) {
            $attr['data-validation-regex-regex'] = str_replace('/', '', $this->originalConstraint->pattern);
            $attr['data-validation-regex-message'] = $this->originalConstraint->message;
        }
        
        
        return $attr;
    }
}