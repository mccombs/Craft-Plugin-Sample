<?php
namespace Craft;

/**
 * Sample Variable File
 */
class SampleVariable
{
    // Output Hello World {{ craft.sample.hello }}
    public function hello()
    {
        return 'Hello world!';
    }

    // Grab all Samples
    public function samples()
    {
        return craft()->sample->samples();
    }
    // Grab an individual Sample
    public function getSample($sampleId)
    {
        return craft()->sample->getSample($sampleId);
    }

}
