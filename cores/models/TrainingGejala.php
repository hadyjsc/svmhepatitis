<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training_gejala".
 *
 * @property int $id
 * @property int $gejala_1
 * @property int $gejala_2
 * @property int $gejala_3
 * @property int $gejala_4
 * @property int $gejala_5
 * @property int $gejala_6
 * @property int $gejala_7
 * @property int $gejala_8
 * @property double $bilirubin
 * @property double $sgot
 * @property double $sgpt
 * @property double $gamma
 * @property double $afp
 * @property double $protime
 * @property string $class
 */
class TrainingGejala extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_gejala';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gejala_1', 'gejala_2', 'gejala_3', 'gejala_4', 'gejala_5', 'gejala_6', 'gejala_7', 'gejala_8', 'albumin', 'globulin', 'protein', 'sgot', 'sgpt', 'bilirubin', 'class'], 'required'],
            [['gejala_1', 'gejala_2', 'gejala_3', 'gejala_4', 'gejala_5', 'gejala_6', 'gejala_7', 'gejala_8'], 'integer'],
            [['albumin', 'globulin', 'protein', 'sgot', 'sgpt', 'bilirubin'], 'number'],
            [['class'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gejala_1' => 'Gejala 1',
            'gejala_2' => 'Gejala 2',
            'gejala_3' => 'Gejala 3',
            'gejala_4' => 'Gejala 4',
            'gejala_5' => 'Gejala 5',
            'gejala_6' => 'Gejala 6',
            'gejala_7' => 'Gejala 7',
            'gejala_8' => 'Gejala 8',
            'albumin' => 'Albumin',
            'globulin' => 'Globulin',
            'protein' => 'Protein',
            'sgot' => 'SGOT',
            'sgpt' => 'SGPT',
            'bilirubin' => 'Protime',
            'class' => 'Class',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TrainingGejalaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TrainingGejalaQuery(get_called_class());
    }
}
