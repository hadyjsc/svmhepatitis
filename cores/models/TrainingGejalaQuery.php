<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TrainingGejala]].
 *
 * @see TrainingGejala
 */
class TrainingGejalaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TrainingGejala[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TrainingGejala|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
