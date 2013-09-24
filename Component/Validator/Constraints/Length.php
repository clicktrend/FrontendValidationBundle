<?php

/**
 *
 * @author Kadir Yuecel <ky@clicktrend.de> Click Trend Media GmbH www.clicktrend-media.com
 */

namespace Clicktrend\Bundle\FrontendValidationBundle\Component\Validator\Constraints;

class Length extends AbstractConstraint {

    public function getDataAttributes() {

        $attr = array();
        
        if($this->originalConstraint->min != NULL) {
            $attr['minlength'] = $this->originalConstraint->min;
            
            $attr['data-validation-minlength-message'] = $this->originalConstraint->minMessage;
        }
        
        // TODO: ORM already uses maxlength in input tag
        if($this->originalConstraint->max != NULL) {
            $attr['data-validation-maxlength-message'] = $this->originalConstraint->maxMessage;
        }

        return $attr;
    }
}