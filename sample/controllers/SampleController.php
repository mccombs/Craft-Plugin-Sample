<?php
namespace Craft;

/**
 * Sample Controller
 */
class SampleController extends BaseController
{

    protected $allowAnonymous = false;

    /**
    * This action is called when a Sample is saved
    */
    public function actionSave()
    {
        // Is this a new or existing sample?
        if ($id = craft()->request->getPost('sampleId')) {
            $model = craft()->sample->getSample($id);
        } else {
            $model = craft()->sample->create();
        }

        // Get the submitted data
        $data = craft()->request->getPost();
        $model->name = $data['name'];
        $model->desc = $data['desc'];

        // Did we pass validation?
        if($model->validate()) {
            craft()->sample->save($model);

            craft()->userSession->setNotice(Craft::t('Sample saved.'));

            return $this->redirectToPostedUrl();
        } else {
            craft()->userSession->setError(Craft::t('There was a problem with your submission, please check the form and try again!'));
            craft()->urlManager->setRouteVariables(array('sample' => $model));
        }
    }


    /**
     * Delete a single Sample
     */
    public function actionDelete()
    {
        $this->requirePostRequest();
        $id = craft()->request->getRequiredPost('id');
        craft()->sample->delete($id);
        craft()->end();
    }
}