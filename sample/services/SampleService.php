<?php
namespace Craft;

class SampleService extends BaseApplicationComponent
{
    protected $record;

    public function __construct()
    {
        $record = null;

        $this->record = $record;
        if (is_null($this->record)) {
            $this->record = SampleRecord::model();
        }

    }

    public function create($attributes = array())
    {
        $model = new SampleModel();
        $model->setAttributes($attributes);

        return $model;
    }

    public function save(SampleModel &$model)
    {

        if ($id = $model->getAttribute('id')) {
            if (null === ($record = $this->record->findByPk($id))) {
                throw new Exception(Craft::t('Can\'t find a sample with ID "{id}"', array('id' => $id)));
            }
        } else {
            $record = new SampleRecord();
        }

        $record->setAttributes($model->getAttributes());

        if ($record->save()) {
            // update id on model (for new records)
            $model->setAttribute('id', $record->getAttribute('id'));

            return true;
        } else {
            $model->addErrors($record->getErrors());

            return false;
        }
    }

    public function samples()
    {

        $samples = craft()->db->createCommand()
            ->select('*')
            ->from('sample')
            ->where('')
            ->queryAll();

        return $samples;
    }


    public function getSample($sampleId)
    {
        if ($record = $this->record->findByPk($sampleId)) {
            return SampleModel::populateModel($record);
        }
    }

    public function delete($id)
    {
        $record = SampleRecord::model()->findByPk($id);

        if ($record)
        {
            $record->delete();
        }
    }
}