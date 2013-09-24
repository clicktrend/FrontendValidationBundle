<?php

/**
 *
 * @author Kadir Yuecel <ky@clicktrend.de> Click Trend Media GmbH www.clicktrend-media.com
 */

namespace Clicktrend\Bundle\FrontendValidationBundle\Component\Validator;

class Mapper {
    
    private $translator;
    
    private $constraints;
    
    public function __construct(array $mappings, $translator) {
        $this->constraints = $mappings;
        $this->translator = $translator;
    }
    
    public function find($constraint) {
        $key = array_key_exists(get_class($constraint), $this->constraints);

        if(!$key)
            return NULL;
        else
            return new $this->constraints[get_class($constraint)]($constraint, $this->translator);
    }
    
    public function hasConstraint($constraint) {
        return in_array($constraint, $this->constraints);
    }
}