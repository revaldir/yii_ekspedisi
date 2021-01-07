<?php

namespace backend\controllers;

use Yii;
use common\models\Ekspedisi;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use PhpOffice\PhpSpreadsheet\IOFactory;

class EkspedisiController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST']
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Ekspedisi::find()
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new Ekspedisi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }
        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionImport()
    {
        $model = new Ekspedisi();
        // $model->scenario = Ekspedisi::SCENARIO_IMPORT;

        if ($model->load(Yii::$app->request->post())) {
            $model->importFile = UploadedFile::getInstance($model, 'importFile');
            // var_dump($model); die();
            if ($model->importFile != null) {
                $filename = 'IMPORT-EKSPEDISI';
                $filePath = Yii::getAlias('@backend/web/storage/'.$filename.'.'.$model->importFile->extension);
                $uploaded = $model->importFile->saveAs($filePath);

                if ($uploaded) {
                    // identifikasi filename
                    $readerType = IOFactory::identify($filePath);
                    // membaca filename berdasarkan type file
                    $objReader = IOFactory::createReader($readerType);
                    // load filename
                    $objPHPExcel = $objReader->load($filePath);
                    // baca sheet / halaman 1
                    $sheet = $objPHPExcel->getSheet(0);
                    // baca baris terakhir
                    $highestRow = $sheet->getHighestRow();
                    // baca kolom terakhir
                    $highestColumn = $sheet->getHighestColumn();

                    // loop data dari baris 3
                    for ($row = 3; $row <= $highestRow; ++$row) {
                        // baca kolom dari baris
                        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                        $kota = $rowData[0][1];
                        $service_code = $rowData[0][2];
                        $berat = $rowData[0][3];
                        $harga = $rowData[0][4];

                        // query untuk insert data ke database
                        $insert = Yii::$app->db
                                    ->createCommand("INSERT INTO ekspedisi(kota, service_code, berat, harga) " . "VALUE(:kota, :service_code, :berat, :harga)", [
                                        ':kota' => $kota,
                                        ':service_code' => $service_code,
                                        ':berat' => $berat,
                                        ':harga' => $harga
                                    ])
                                    ->execute();
                    }
                }
            }

            return $this->redirect(['index']);
        }

        return $this->render('import', [
            'model' => $model
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Ekspedisi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The request is not found!');
    }
}
