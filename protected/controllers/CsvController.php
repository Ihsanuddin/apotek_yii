<?php

class CsvController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','update','admin','create','delete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Csv;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Csv']))
		{
			$model->attributes=$_POST['Csv'];
			// echo $_FILES['Csv']['name']['csv_file'];
			// exit();
			if($model->validate()){
				if(isset($_FILES['Csv']['name']['csv_file']) && $_FILES['Csv']['name']['csv_file'] != '') {
                // upload csv
                $VUpload = new VUpload();
                $VUpload->path = 'file/voucher/';
                $VUpload->doUpload($model, 'csv_file');

                $file = 'file/voucher/' . $VUpload->getFileName();
                $data = array();
		        if (($handle = fopen($file, 'r')) !== false) {
		            $i = 0;
		            while (($row = fgetcsv($handle, 1000, ";")) !== false) {
		                $modeldata = new DataCsv();
		                $modeldata->voucher_code = $row[1];
		              
		                if ($modeldata->validate()) {
		                    $modeldata->save();
		                } 
		            }
		            fclose($handle);
		        }
		

                  //resizing image           
                  // Yii::import('application.extensions.image.Image');
                  // $file = 'file/gall/' . $VUpload->getFileName();
                  // $image = new Image($file);
                  // $image->resize(1350, 400);
                  // $image->save();
                  // $this->tinyPng($file);
                }

                if(isset($_FILES['Csv']['name']['image']) && $_FILES['Csv']['name']['image'] != '') {
                  // upload image
                  $VUpload = new VUpload();
                  $VUpload->path = 'images/voucher/';
                  $VUpload->doUpload($model, 'image');

                  // resizing image mini
                  Yii::import('application.extensions.image.Image');
                  $file = 'images/voucher/' . $VUpload->getFileName();
                  $imagemini = new Image($file);
                  $imagemini->resize(1350, 600);
                  $imagemini->save();
                  $this->tinyPng($file);
                }
			}	
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreateOld()
	{
		$model=new Csv;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Csv']))
		{
			$model->attributes=$_POST['Csv'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Csv']))
		{
			$model->attributes=$_POST['Csv'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Csv');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Csv('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Csv']))
			$model->attributes=$_GET['Csv'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	private function tinyPng($image)
    {
        $key = "wiAzqKxb0rigert_3Vylr37y60RejBLs";
        $input = $image;
        $output = $image;

        $request = curl_init();
        curl_setopt_array($request, array(
          CURLOPT_URL => "https://api.tinypng.com/shrink",
          CURLOPT_USERPWD => "api:" . $key,
          CURLOPT_POSTFIELDS => file_get_contents($input),
          CURLOPT_BINARYTRANSFER => true,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HEADER => true,
          /* Uncomment below if you have trouble validating our SSL certificate.
             Download cacert.pem from: http://curl.haxx.se/ca/cacert.pem */
          // CURLOPT_CAINFO => __DIR__ . "/cacert.pem",
          CURLOPT_SSL_VERIFYPEER => true
        ));

        $response = curl_exec($request);
        if (curl_getinfo($request, CURLINFO_HTTP_CODE) === 201) {
          /* Compression was successful, retrieve output from Location header. */
          $headers = substr($response, 0, curl_getinfo($request, CURLINFO_HEADER_SIZE));
          foreach (explode("\r\n", $headers) as $header) {
            if (substr($header, 0, 10) === "Location: ") {
              $request = curl_init();
              curl_setopt_array($request, array(
                CURLOPT_URL => substr($header, 10),
                CURLOPT_RETURNTRANSFER => true,
                /* Uncomment below if you have trouble validating our SSL certificate. */
                // CURLOPT_CAINFO => __DIR__ . "/cacert.pem",
                CURLOPT_SSL_VERIFYPEER => true
              ));
              file_put_contents($output, curl_exec($request));
            }
          }
        } else {
            print(curl_error($request));
            /* Something went wrong! */
            print("Compression failed");
        }
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Csv::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='csv-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
