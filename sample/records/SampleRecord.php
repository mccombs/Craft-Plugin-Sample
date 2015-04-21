<?php

namespace Craft;

class SampleRecord extends BaseRecord
{
    public function getTableName()
    {
        return 'sample';
    }

    protected function defineAttributes()
    {
        return array(
            'name' => array(AttributeType::String, 'required' => true),
            'desc' => array(AttributeType::String, 'required' => true),
        );
    }
    
}