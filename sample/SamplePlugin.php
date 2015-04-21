<?php
namespace Craft;

class SamplePlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Sample Plugin');
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'Adam McCombs';
    }

    function getDeveloperUrl()
    {
        return 'http://crafpl.us';
    }

    function hasCpSection()
    {
        return true;
    }

    function registerCpRoutes()
    {
        return array(

        // Build page - Edit your previously saved samples
        'sample/build\/(?P<sampleId>\d+)' => 'sample/build',

        );
    }
}