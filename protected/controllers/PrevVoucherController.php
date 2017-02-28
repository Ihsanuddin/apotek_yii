<?php

class PrevVoucherController extends Controller
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
				'actions'=>array('index','view','admin','update','delete','create'),
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
	public function actionCreateOld()
	{
		$model=new PrevVoucher;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PrevVoucher']))
		{
			$model->attributes=$_POST['PrevVoucher'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreate()
	{
		$model=new PrevVoucher;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PrevVoucher']))
		{
			$model->attributes=$_POST['PrevVoucher'];
			if ($model->validate()) {
				if(isset($_FILES['PrevVoucher']['name']['image']) && $_FILES['PrevVoucher']['name']['image'] != '') {
                  // upload image
                  $VUpload = new VUpload();
                  $VUpload->path = 'images/voucher/';
                  $VUpload->doUpload($model, 'image');

                  $fileImage = 'images/voucher/' . $VUpload->getFileName();
                }

                $color = $model->font_color;
                $style = $model->font_style;
                $size  = $model->font_size;
                $coorX = $model->coor_x;
                $coorY = $model->coor_y;
                $code  = "56TEST4792cjT47".$model->id;

                $font_path = Yii::getPathOfAlias('webroot') . "/themes/blackboot/font/".$style.".ttf";

                // echo $font_path;
                // exit();
				  // Set Text to Be Printed On Image
				  // $text = "This is a sunset!";
            	$pathImage = Yii::getPathOfAlias('webroot') . "/$fileImage";
		        if (exif_imagetype($pathImage) == IMAGETYPE_JPEG) {
    				$jpg_image = imagecreatefromjpeg($pathImage);
				}else if (exif_imagetype($pathImage) == IMAGETYPE_PNG) {
					$jpg_image = imagecreatefrompng($pathImage);
				}
		        		
		        // Allocate A Color For The 
		        if ($color == 'white') {
		        	$setColor = imagecolorallocate($jpg_image, 255, 255, 255);
		        }else{
		        	$setColor = imagecolorallocate($jpg_image, 0, 0, 0);
		        }
 				
 		
		        imagettftext($jpg_image, $size, 0, $coorX, $coorY, $setColor, $font_path, $code);

		        $imageName = $code.date('Ymdhis');
		        if (exif_imagetype($pathImage) == IMAGETYPE_JPEG) {
    				$model->image_voucher = $imageName.".jpg";
				}else if (exif_imagetype($pathImage) == IMAGETYPE_PNG) {
					$model->image_voucher = $imageName.".PNG";
				}       

		        $dirImage = Yii::getPathOfAlias('webroot') . "/images/voucherPrev/".$imageName;
		        if (exif_imagetype($pathImage) == IMAGETYPE_JPEG) {
    				imagejpeg($jpg_image,$dirImage.".jpg");
				}else if (exif_imagetype($pathImage) == IMAGETYPE_PNG) {
					imagepng($jpg_image,$dirImage.".PNG");
				} 
				imagedestroy($jpg_image);   
			}
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		// $imageResource = $model->image;

		if(isset($_POST['PrevVoucher']))
		{
			$imageResource = PrevVoucher::model()->findByPk($id)->image;
			// echo $model->image;
			// exit();
			$model->attributes=$_POST['PrevVoucher'];
			if(isset($_FILES['PrevVoucher']['name']['image']) && $_FILES['PrevVoucher']['name']['image'] != '') {
                // upload image
                $VUpload = new VUpload();
                $VUpload->path = 'images/voucher/';
                $VUpload->doUpdate($model, 'image');

                $fileImage = 'images/voucher/' . $VUpload->getFileName();
                // $fileImage = 'images/voucher/' .;
            }else {
            	$model->image = Gallery::model()->findByPk($id)->image;
            	$fileImage = 'images/voucher/' . $imageResource;
            }

            $color = $model->font_color;
            $style = $model->font_style;
            $size  = $model->font_size;
            $coorX = $model->coor_x;
            $coorY = $model->coor_y;
            $code  = "56TEST4792cjT47".$model->id;

            $font_path = Yii::getPathOfAlias('webroot') . "/themes/blackboot/font/".$style.".ttf";

               // echo $font_path;
               // exit();
			  // Set Text to Be Printed On Image
			  // $text = "This is a sunset!";
            $pathImage = Yii::getPathOfAlias('webroot') . "/$fileImage";
            
            // echo $pathImage;
            // exit();

		    if (exif_imagetype($pathImage) == IMAGETYPE_JPEG) {
    			$jpg_image = imagecreatefromjpeg($pathImage);
			}else if (exif_imagetype($pathImage) == IMAGETYPE_PNG) {
				$jpg_image = imagecreatefrompng($pathImage);
			}
		        		
		    // Allocate A Color For The 
		    if ($color == 'white') {
		    	$setColor = imagecolorallocate($jpg_image, 255, 255, 255);
		    }else{
		     	$setColor = imagecolorallocate($jpg_image, 0, 0, 0);
		    }
 				
 		
		    imagettftext($jpg_image, $size, 0, $coorX, $coorY, $setColor, $font_path, $code);

		    $imageName = $code.date('Ymdhis');
		    if (exif_imagetype($pathImage) == IMAGETYPE_JPEG) {
    			$model->image_voucher = $imageName.".jpg";
			}else if (exif_imagetype($pathImage) == IMAGETYPE_PNG) {
				$model->image_voucher = $imageName.".PNG";
			}       

		       $dirImage = Yii::getPathOfAlias('webroot') . "/images/voucherPrev/".$imageName;
		       if (exif_imagetype($pathImage) == IMAGETYPE_JPEG) {
    			imagejpeg($jpg_image,$dirImage.".jpg");
			}else if (exif_imagetype($pathImage) == IMAGETYPE_PNG) {
				imagepng($jpg_image,$dirImage.".PNG");
			} 
			// imagedestroy($jpg_image);   

			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateOld($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PrevVoucher']))
		{

			$model->attributes=$_POST['PrevVoucher'];
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
		$dataProvider=new CActiveDataProvider('PrevVoucher');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PrevVoucher('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PrevVoucher']))
			$model->attributes=$_GET['PrevVoucher'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=PrevVoucher::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='prev-voucher-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
