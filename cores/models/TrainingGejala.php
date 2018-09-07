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
 * @property string $serologi
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
            [['gejala_1', 'gejala_2', 'gejala_3', 'gejala_4', 'gejala_5', 'gejala_6', 'gejala_7', 'gejala_8', 'bilirubin', 'sgot', 'sgpt', 'gamma', 'afp', 'protime', 'class', 'serologi'], 'required'],
            [['gejala_1', 'gejala_2', 'gejala_3', 'gejala_4', 'gejala_5', 'gejala_6', 'gejala_7', 'gejala_8'], 'integer'],
            [['bilirubin', 'sgot', 'sgpt', 'gamma', 'afp', 'protime'], 'number'],
            [['class', 'serologi'], 'string'],
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
            'bilirubin' => 'Bilirubin',
            'sgot' => 'Sgot',
            'sgpt' => 'Sgpt',
            'gamma' => 'Gamma',
            'afp' => 'Afp',
            'protime' => 'Protime',
            'class' => 'Class',
            'serologi' => 'Serologi',
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
