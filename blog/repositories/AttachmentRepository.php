<?php


namespace app\blog\repositories;


use app\blog\entities\Attachment;

class AttachmentRepository
{
    public function findAttachmentById($id): Attachment
    {
        return Attachment::find()->andWhere(['id' => $id])->one();
    }

    public function findAttachmentByName($name): Attachment
    {
        return Attachment::find()->andWhere(['name' => $name])->one();
    }

    public function findAttachmentBySlug($path): Attachment
    {
        return Attachment::find()->andWhere(['filename' => $path])->one();
    }

    public function save(Attachment $Attachment)
    {
        if (!$Attachment->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Attachment $Attachment)
    {
        if (!$Attachment->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}