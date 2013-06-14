<?php

/**
 *
 * @author Kadir Yuecel <ky@clicktrend.de> Click Trend Media GmbH www.clicktrend-media.com
 */

namespace Clicktrend\Bundle\FrontendValidationBundle\Form\Type;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class FrontendValidationTypeExtension extends AbstractTypeExtension {

    private $validator;
    private $mapper;

    public function __construct($validator, $mapper) {
        $this->validator = $validator;
        $this->mapper = $mapper;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $parentBuilder = $builder->getParent();
        if($parentBuilder instanceof FormBuilderInterface) {
            $dataClass = $parentBuilder->getOption('data_class');

            if($dataClass !== NULL) {

                $validationGroups = $parentBuilder->getOption('validation_groups');

                $metaData = $this->validator->getMetadataFactory()->getMetadataFor($dataClass);

                if($metaData->hasMemberMetadatas($builder->getName())) {
                    $datas = $metaData->getMemberMetadatas($builder->getName());

                    // TODO: If there is no validation group defined catch error
                    foreach ($validationGroups as $group) {
                        foreach ($datas as $data) {
                            
                            if(isset($data->constraintsByGroup[$group])) {
                                $constraints = $data->constraintsByGroup[$group];

                                foreach ($constraints as $constraint) {

                                    $newConstraint = $this->mapper->find($constraint);
                                    
                                    if($newConstraint !== NULL) {
                                        $attrs = (array) $newConstraint->getDataAttributes();
                                        $builder->setAttribute('attr', (array) $builder->getAttribute('attr') + $attrs);
                                    } else {
                                        echo get_class($constraint);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['attr'] = $options['attr'] +  (array) $form->getConfig()->getAttribute('attr');
    }

    public function getExtendedType() {
        return "form";
    }

}