<?php

namespace Craft;

class SampleModel extends BaseModel
{
    protected function defineAttributes()
    {
        return array(
            'name' => AttributeType::String,
            'desc' => AttributeType::String
        );
    }

}

