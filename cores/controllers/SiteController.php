<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TrainingGejala;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionHepatitis()
    {
        return $this->render('hepatitis');
    }

    public function actionGejala()
    {
        return $this->render("cek-gejala");
    }

    public function actionHitunggejala()
    {
        $alpha = 0.5;
        $lambda = 0.5;
        $gamma = 0.5;
        $cost = 1;
        $epsilon = 0.01;

        $data = array();
        $label = array();

        $getTraining = TrainingGejala::find()->all();

        foreach ($getTraining as $value) {
                $data[] = array($value->gejala_1,$value->gejala_2,$value->gejala_3,$value->gejala_4,$value->gejala_5,$value->gejala_6,$value->gejala_7,$value->gejala_8);
        }
        foreach ($getTraining as $value) {
                $label[] = $value->class;
        }
        $hasilT = $this->Transpose($data);

        $dataKernel = array();
        foreach ($hasilT as $key => $value) {   
            foreach ($value as $k => $v) {
                $dataKernel[$k][$key] = $v;
            }
        }

        $hasilK = $this->Karnel($dataKernel);

        $hasilM = $this->Matrik($hasilK,$label,$lambda);

        $hasilSvm = $this->Svm($hasilM,$alpha,$lambda,$cost,$label,$epsilon);

        $fungsi = $hasilSvm["bobot"]["max"]*(array_sum($hasilK[0]))+$hasilSvm["bobot"]["min"];

        $dataTesting =  explode(",", $_POST["data"]);

        $prediksi = $this->Predict($data,$label,$dataTesting,$hasilSvm["bobot"],$hasilSvm["bias"]);

        $string = "";
        if ($prediksi == 1) {
            $string = "Positif Hepatitis";
        }else {
            $string = "Negatif Hepatitis";
        }

        $result = array();
        
        $result["response"] = array("code"=>"OK","result_code"=>$prediksi,"result_string"=>$string);
        return json_encode($result);
    }

    public function actionHitunglab()
    {
        $alpha = 0.5;
        $lambda = 0.5;
        $gamma = 0.5;
        $cost = 1;
        $epsilon = 0.01;

        $data = array();
        $label = array();
        $labelSerologi = array();

        $getTraining = TrainingGejala::find()->all();

        foreach ($getTraining as $value) {
                $data[] = array($value->gejala_1,$value->gejala_2,$value->gejala_3,$value->gejala_4,$value->gejala_5,$value->gejala_6,$value->gejala_7,$value->gejala_8,$value->bilirubin,$value->sgot,$value->sgpt,$value->gamma,$value->afp,$value->protime);
        }
        foreach ($getTraining as $value) {
                $label[] = $value->class;
        }
        foreach ($getTraining as $value) {
                $labelSerologi[] = $value->serologi;
        }

        $hasilT = $this->Transpose($data);

        $dataKernel = array();
        foreach ($hasilT as $key => $value) {   
            foreach ($value as $k => $v) {
                $dataKernel[$k][$key] = $v;
            }
        }

        $hasilK = $this->Karnel($dataKernel);

        $hasilM = $this->Matrik($hasilK,$label,$lambda);

        $hasilSvm = $this->Svm($hasilM,$alpha,$lambda,$cost,$label,$epsilon);

        $fungsi = $hasilSvm["bobot"]["max"]*(array_sum($hasilK[0]))+$hasilSvm["bobot"]["min"];

        $dataTesting =  explode(",", $_POST["data"]);

        $prediksi = $this->Predict($data,$label,$dataTesting,$hasilSvm["bobot"],$hasilSvm["bias"]);

        $string = "";
        if ($prediksi == 1) {
            $string = "Positif Hepatitis";
        }else {
            $string = "Negatif Hepatitis";
        }

        $virus = $this->Virus($_POST["serologi"]);

        $result = array();
        $result["response"] = array("code"=>"OK","result_code"=>$prediksi,"result_string"=>$string,"serologi"=>$virus);
        return json_encode($result);
    }

    public function Virus($v)
    {
        $hasilakhir = "";
        $v = explode(",", $v);

        // print_r($v);
        $hasil = "";
        if((!empty($v[0])) || (!empty($v[1])) ){
            if($v[0] == '1' || $v == '1'){
                $hasil = "A";
            }
        }
        if(!empty($v[2]) || !empty($v[3]) || !empty($v[4]) || !empty($v[5])){
            if(($v[2] == '1') || ($v[3] == '1')|| ($v[4] == '1')|| ($v[5] == '1')){
                $hasil = "B";
            }
        }

        if(!empty($v[6]) || !empty($v[7])){
            if(($v[6] == '1') || ($v[7] == '1')){
                $hasil = "C";
            }
        }

        if(!empty($v[8]) || !empty($v[9]) || !empty($v[10])){
            if(($v[8] == '1') || ($v[9] == '1')|| ($v[10] == '1')){
                $hasil = "D";
            }
        }

        if(!empty($v[11]) || !empty($v[12]) || $v[13]){
            if(($v[11] == '1') || ($v[12] == '1')|| ($v[13] == '1')){
                $hasil = "E";
            }
        }

        if($hasil == ""){
            $hasilakhir = "Anda Tidak Terkena Penyakit Hepatitis";
        }
        else{
            $hasilakhir = "Anda Terkena Penyakit Hepatitis ".$hasil;
        }

        return $hasilakhir;
    }

    //Matrik
    public function Matrik(array $data, array $class , $lambda) {
        $hasil = array();
        for ($i=0; $i < count($class); $i++) { 
            foreach ($data[$i] as $key => $value) {
                    $hasil[$i][$key] = ($class[$i]*$class[$key])*($value+sqrt($lambda));
                    // echo $class[$i]."*".$class[$key]."*".$value."+".sqrt($lambda)."<br>";
            }
        }
        return $hasil;
    }
    //Karnel
    public function Karnel(array $data) {
        $nilai = array();
        $sumx = array();

        for ($i=0; $i < count($data); $i++) { 
            for ($j=0; $j < count($data); $j++) { 
                    for ($k=0; $k < count($data[$i]); $k++) { 
                            $nilai[$i][$j][$k] = $data[$i][$k]*$data[$j][$k];

                            // echo $data[$i][$k]."*".$data[$j][$k]." || ";
                    }
                    // echo "<br>";
            }
        }

        foreach ($nilai as $key => $value) {
                foreach ($value as $v) {
                        $sumx[$key][] = array_sum($v);
                }
        }

        return $sumx;
    }
    //Transpose Data
    public function Transpose(array $data) {
        $retData = array();
        foreach ($data as $row => $columns) {
          foreach ($columns as $row2 => $column2) {
              $retData[$row2][$row] = $column2;
          }
        }
      return $retData;
    }
    public function Svm(array $data,$alpha,$gamma,$cost,$class,$epsilon) {
            $nilaiError = $this->Error($data,$alpha);

            $nilaiDA = $this->deltaAlpha($nilaiError,$gamma,$alpha,$cost);

            $nilaiNA = $this->newAlpha($nilaiDA,$alpha);

            $nilaiMaxMin = $this->maxMin($nilaiError);

            $nilaiBobot = $this->bobot(
                        $nilaiNA,
                        $data[$nilaiMaxMin["max"][0]],
                        $data[$nilaiMaxMin["min"][0]],
                        $class
                    );

            $bias = (-1/2)*array_sum($nilaiBobot);

            $svm = array("error"=>$nilaiError,"delta_alpha"=>$nilaiDA,"alpha_baru"=>$nilaiNA,"bobot"=>$nilaiBobot,"bias"=>$bias);
            // echo "<pre>";
            // print_r(max($nilaiDA));
            return $svm;
    }

    protected function Error(array $data, $alpha) {
            $nilai = array();
            foreach ($data as $key => $value) {
                $nilai[] = $alpha*array_sum($value);
            }

            return $nilai;
    }

    protected function deltaAlpha(array $error,$gamma,$alpha,$cost){
        $nilai = array();
        foreach ($error as $key => $value) {
            $nilai[] = min(max($gamma*(1-$value),-$alpha),$cost-$alpha);
        }
        return $nilai;
    }

    protected function newAlpha(array $da,$alpha){
        $nilai = array();

        foreach ($da as $value) {
            $nilai[] = $alpha+$value;
        }

        return $nilai;
    }

    protected function maxMin(array $error) {
            $nilai = array();
            
            $max = array_keys($error, max($error));
            $min = array_keys($error, min($error));
            $nilai = array("max"=>$max,"min"=>$min);
            return $nilai;
    }

    protected function bobot(array $alpha, array $max, array $min, array $class) {
        $nilai = array();
        $nilaiMax = array();
        $nilaiMin = array();

        $i = 0;
        foreach ($max as $key => $value) {
            $nilaiMax[] = $alpha[$i]*$value*$class[$i];
            // echo $alpha[$i]."*".$value."*".$class[$i]."<br>";
            $i++;
        }

        $j = 0;
        foreach ($min as $key => $value) {
            $nilaiMin[] = $alpha[$j]*$value*$class[$j];
            $j++;   
        }

        $sumMax = array_sum($nilaiMax);
        $sumMin = array_sum($nilaiMin);

        $nilai = array("max"=>$sumMax,"min"=>$sumMin);

        return $nilai;
    }

    public function Predict(array $training,array $labels,array $testing,array $bobot, $bias) {
            $nilai = array();
            $hasilKali = array();

            $randKey = array_rand($training);
            $randTraining = $training[$randKey];
            // echo $randKey;
            $randLabels = $labels[$randKey];

            for ($i=0; $i < count($randTraining); $i++) { 
                    $hasilKali[] = $randTraining[$i]*$testing[$i];
            }

            $sum = array_sum($hasilKali);

            $bobot = ($randLabels == 1)? $bobot["max"]: $bobot["min"];

            $getPredict = ($bobot*$sum)+$bias;
            // print_r($getPredict);
            $nilai = ($getPredict > 0 )? 1 : -1 ;
            
            // echo "<pre>";
            // print_r($randTraining);
            // print_r($testing);
            // print_r($hasilKali);
            // print_r($getPredict);
            // echo "<br>";
            // print_r($nilai);

            return $nilai;
    }
}
