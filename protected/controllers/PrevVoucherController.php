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
				'actions'=>array('index','view','admin','update','delete','create','generate'),
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

                if(isset($_FILES['Csv']['name']['csv_file']) && $_FILES['Csv']['name']['csv_file'] != '') {
	                // upload csv
	                $VUpload = new VUpload();
	                $VUpload->path = 'file/voucher/';
	                $VUpload->doUpload($model, 'csv_file');

	                $fileCsv = 'file/voucher/' . $VUpload->getFileName();
	               
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
            	$model->image = PrevVoucher::model()->findByPk($id)->image;
            	$fileImage = 'images/voucher/' . $imageResource;
            }

            if(isset($_FILES['PrevVoucher']['name']['csv_file']) && $_FILES['PrevVoucher']['name']['csv_file'] != '') {
                // upload csv
                $VUpload = new VUpload();
                $VUpload->path = 'file/voucher/';
                $VUpload->doUpdate($model, 'csv_file');

                $fileCsv = 'file/voucher/' . $VUpload->getFileName();
            }else{
            	$model->csv_file = PrevVoucher::model()->findByPk($id)->csv_file;
            }

            //delete image preview lama
            $pathImagePrevOld = Yii::getPathOfAlias('webroot') . "/images/voucherPrev/".$model->image_voucher;
            unlink($pathImagePrevOld);

            $color = $model->font_color;
            $style = $model->font_style;
            $size  = $model->font_size;
            $coorX = $model->coor_x;
            $coorY = $model->coor_y;
            $code  = "56TEST4792cjTK24".$model->id;

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
			imagedestroy($jpg_image);   

			if($model->save()){
				$this->redirect(array('update','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionGenerate($id)
	{
		$model = $this->loadModel($id);

		// $cekCsvDir = file_exists(Yii::getPathOfAlias('webroot') . "/file/voucher/".$model->csv_file);

		if ((Yii::app()->file->set('file/voucher/'.$model->csv_file)->isfile) && (Yii::app()->file->set('file/voucher/'.$model->csv_file)->exists)) {
                	$cekCsvDir = 1;
                }else{
                  	$cekCsvDir = 0;
                }

		// var_dump($cekCsvDir);
		// exit();

		if(isset($_POST['PrevVoucher']))
		{
			if ($model->validate()) {
				if(isset($_FILES['PrevVoucher']['name']['csv_file']) && $_FILES['PrevVoucher']['name']['csv_file'] != '') {
			        // upload csv
			        $VUpload = new VUpload();
			        $VUpload->path = 'file/voucher/';
			        $VUpload->doUpdate($model, 'csv_file');

			        $fileCsv = 'file/voucher/' . $VUpload->getFileName();
			                
			    }else{
			       	$model->csv_file = PrevVoucher::model()->findByPk($id)->csv_file;
			       	// $model->save();
			           $fileCsv = Yii::getPathOfAlias('webroot') . "/file/voucher/".$model->csv_file;
			    }
			    if ($model->save()) {
			           if ($cekCsvDir == 0 || $model->csv_file == '') {
			           		if ($_FILES['PrevVoucher']['name']['csv_file']== '') {
			           			$model->addError('csv_file','File Csv Belum Ditambahkan!');
			           		}
			           }
			       }
			}
			

		    $pathDirImage = Yii::getPathOfAlias('webroot') . "/images/generate/".$model->voucher_name;
			//echo $pathDirImage;
			if( ! file_exists($pathDirImage)) {
			    $mask=umask(0);
			    mkdir($pathDirImage, 0777);
			    umask($mask);
			}

			//exit();
			// $fileCsv = Yii::getPathOfAlias('webroot') . "/file/voucher/".$model->csv_file;
			// echo $fileCsv;
			// exit();
			$data = array();
			if (($handle = fopen($fileCsv, 'r')) !== false) {
				$i = 0;
			    while (($row = fgetcsv($handle, 1000, ";")) !== false) {
					$fileImage = $model->image;
					$color = $model->font_color;
		            $style = $model->font_style;
		            $size  = $model->font_size;
		            $coorX = $model->coor_x;
		            $coorY = $model->coor_y;
		            //$code  = "56TEST4792cjT47".$model->id;

		            $font_path = Yii::getPathOfAlias('webroot') . "/themes/blackboot/font/".$style.".ttf";

		            $pathImage = Yii::getPathOfAlias('webroot') . "/images/voucher/".$fileImage;
		            //echo $pathImage;

				    if (exif_imagetype($pathImage) == IMAGETYPE_JPEG) {
				    	//echo "jpg";
		    			$jpg_image = imagecreatefromjpeg($pathImage);
					}else if (exif_imagetype($pathImage) == IMAGETYPE_PNG) {
						//echo "PNG";
						$jpg_image = imagecreatefrompng($pathImage);
					}
					//exit();
				        		
				    // Allocate A Color For The 
				    if ($color == 'white') {
				    	$setColor = imagecolorallocate($jpg_image, 255, 255, 255);
				    }else{
				     	$setColor = imagecolorallocate($jpg_image, 0, 0, 0);
				    }
		 				
				    imagettftext($jpg_image, $size, 0, $coorX, $coorY, $setColor, $font_path, $row[1]);

				    //$imageName = $code.date('Ymdhis');
				    $imageName = $row[1];
				    $dirImage = $pathDirImage."/".$imageName;
				    // echo $dirImage;
				    // exit(); 
				    // $dirImage = Yii::getPathOfAlias('webroot') . "/images/voucherPrev/".$imageName;
				    if (exif_imagetype($pathImage) == IMAGETYPE_JPEG) {
		    			imagejpeg($jpg_image,$dirImage.".jpg");
					}else if (exif_imagetype($pathImage) == IMAGETYPE_PNG) {
						imagepng($jpg_image,$dirImage.".PNG");
					} 
					//imagedestroy($jpg_image); 
				}
			}
			$destination = Yii::getPathOfAlias('webroot') . "/images/generate/".$model->voucher_name;
			chmod($destination, 0777);
			// echo "'".$destination.'.zip'."'";
			// exit();
			$zipname = Yii::getPathOfAlias('webroot') . "/images/generate/".'new.zip';
			$zip = new ZipArchive;
			if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
			  	//point 1
				if ($handle = opendir($destination)) {    
			  	              // point 2
					while (false !== ($entry = readdir($handle))) 
					{
			  	                                	//point 3             
						if ($entry != "." && $entry != ".." && !is_dir($destination.'/' . $entry))
						{
							//point 4  
							$zip->addFile($destination.'/' . $entry);             
						} 
					}
					closedir($handle);
			 
				}
				$zip->close(); 
				/* download file jika eksis*/
				if(file_exists($zipname)){
					header('Content-Description: File Transfer');
					header('Content-Type: application/zip');
					header('Content-disposition: attachment; 
					filename="'.$zipname.'"');
					header('Content-Length: ' . filesize($zipname));
					readfile($zipname);
					unlink($zipname);
				 
				} else{
					$error = "Proses mengkompresi file gagal  ";
				}
			} 

			
			// ///Then download the zipped file.
			// header('Content-Type: application/zip');
			// header('Content-disposition: attachment; filename='.'new.zip');
			// header('Content-Length: ' . filesize($destination.'/new.zip'));
			// readfile('new.zip');

			// $files = scandir($pathDirImage,1);
			// // $files = array('image.jpeg','text.txt','music.wav');
			// $zipname = 'enter_any_name_for_the_zipped_file.zip';
			// $zip = new ZipArchive;
			// $create = $zip->open($zipname, ZipArchive::OVERWRITE);
			// if ($create == TRUE) {
			// 	foreach ($files as $file) {
			// 	  $zip->addFile($file);
			// 	}
			// 	$zip->close();
			// }else{
			// 	echo "gagal";
			// }
			

			// ///Then download the zipped file.
			// header('Content-Type: application/zip');
			// header('Content-disposition: attachment; filename='.$zipname);
			// header('Content-Length: ' . filesize($zipname));
			// readfile($zipname);

			// $the_folder = $destination;
			// $zip_file_name = 'archived_name.zip';

			// $za = Yii::app()->zipf;

			// $za = new ZIPARCHIVE;
			// $res = $za->open($zip_file_name, ZipArchive::CREATE | ZipArchive::OVERWRITE);
			// if($res === TRUE)    {
			//     $za->addDir($the_folder, basename($the_folder)); $za->close();
			// }
			// else  { echo 'Could not create a zip archive';}
			// echo $destination;
			// $zipname = "'".$destination.".zip'";
			// // $zipname = 'adcs.zip';
		 //    $zip = new ZipArchive;
		 //    $zip->open($zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE);
		 //    if ($handle = opendir('.')) {
		 //      while (false !== ($entry = readdir($handle))) {
		 //        if ($entry != "." && $entry != ".." && !strstr($entry,'.php')) {
		 //            $zip->addFile($entry);
		 //        }
		 //      }
		 //      closedir($handle);
		 //    }

		 //    $ret = $zip->close();
		 //    echo "Closed with: " . ($ret ? "true" : "false") . "\n";
		 //    header('Content-Type: application/zip');
		 //    header("Content-Disposition: attachment; filename='adcs.zip'");
		 //    header('Content-Length: ' . filesize($zipname));
		 //    header("Location: adcs.zip");

			// echo $destination;
			// echo $destination.$model->voucher_name.".zip";
			// exit();
			// $path = Yii::getPathOfAlias('webroot') . "/images/generate/";
			// $folder = "'".$path."file.zip'";
			// echo $folder;
			// exit();
			// $z = new ZipArchive();
			// $z->open($folder, ZipArchive::OVERWRITE);
			// $this->folderToZip($destination, $z);
			// $z->close();

			// echo $pathDirImage;
			// exit();
			// $zip = Yii::app()->zip;
			// $zip->makeZip($destination, "'".$pathDirImage."zip"."'"); // make an ZIP archive

			// Get real path for our folder
			// $rootPath = realpath($pathDirImage);
			// $path = Yii::getPathOfAlias('webroot') . "/images/generate/";
			// $zipname = "'".$path.$model->voucher_name.".zip'";
			// echo $zipname;
			// exit();
			// chmod($path, 0777);
			// Initialize archive object
			// $zip = new ZipArchive();
			// $zip->open('file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
			// $res = $zip->open($zipname, ZipArchive::OVERWRITE|ZipArchive::CREATE);
			// Create recursive directory iterator
			/** @var SplFileInfo[] $files */
			// $files = new RecursiveIteratorIterator(
			//     new RecursiveDirectoryIterator($rootPath),
			//     RecursiveIteratorIterator::LEAVES_ONLY
			// );

			// $file = scandir($pathDirImage,1);

			// echo json_encode($file);
			// exit();
			// if ($res === TRUE) {
				// $zip->addFile("'".$pathDirImage."/".'325gd654fe4534tweg.jpg'."'");
				// foreach ($file as $value){ 
				// 	if ($value != "." && $value != "..") {
				// 		$zip->addFile("'".$pathDirImage."/".$value."'","'".$value."'");
				// 		exit();
				// 		unlink($rootPath.DIRECTORY_SEPARATOR.$value);
				// 	}
				// }
				// unlink($rootPath);
				// $zip->close();
				// $handle = opendir($pathDirImage);
				// while ($file = readdir($handle)) { $zip->addFile($pathDirImage . DIRECTORY_SEPARATOR . $file); }
				// $zip->close();
			// 	echo "oke";
			// }else{
			// 	echo "gagal";
			// }
				
			// exit();
			// foreach ($files as $name => $file)
			// {
			    // Skip directories (they would be added automatically)
			//     if (!$file->isDir())
			//     {
			//         // Get real and relative path for current file
			//         $filePath = $file->getRealPath();
			//         $relativePath = substr($filePath, strlen($rootPath) + 1);

			//         // Add current file to archive
			//         $zip->addFile($filePath, $relativePath);
			//     }
			// }

			// Zip archive will be created only after closing object
			// $zip->close();

        }
		
			// $this->redirect(array('update','id'=>$model->id));
			$this->render('update',array(
				'model'=>$model,
			));
		
	}

	public function folderToZip($folder, &$zipFile, $subfolder = null) {
	    if ($zipFile == null) {
	        // no resource given, exit
	        return false;
	    }
	    // we check if $folder has a slash at its end, if not, we append one
	    $folder .= end(str_split($folder)) == "/" ? "" : "/";
	    $subfolder .= end(str_split($subfolder)) == "/" ? "" : "/";
	    // we start by going through all files in $folder
	    $handle = opendir($folder);
	    while ($f = readdir($handle)) {
	        if ($f != "." && $f != "..") {
	            if (is_file($folder . $f)) {
	                // if we find a file, store it
	                // if we have a subfolder, store it there
	                if ($subfolder != null)
	                    $zipFile->addFile($folder . $f, $subfolder . $f);
	                else
	                    $zipFile->addFile($folder . $f);
	            } elseif (is_dir($folder . $f)) {
	                // if we find a folder, create a folder in the zip 
	                $zipFile->addEmptyDir($f);
	                // and call the function again
	                folderToZip($folder . $f, $zipFile, $f);
	            }
	        }
	    }
	}

	/* creates a compressed zip file */
	function create_zip($files = array(),$destination = '',$overwrite = false) {
		//if the zip file already exists and overwrite is false, return false
		if(file_exists($destination) && !$overwrite) { return false; }
		//vars
		$valid_files = array();
		//if files were passed in...
		if(is_array($files)) {
			//cycle through each file
			foreach($files as $file) {
				//make sure the file exists
				if(file_exists($file)) {
					$valid_files[] = $file;
				}
			}
		}
		//if we have good files...
		if(count($valid_files)) {
			//create the archive
			$zip = new ZipArchive();
			if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
				return false;
			}
			//add the files
			foreach($valid_files as $file) {
				$zip->addFile($file,$file);
			}
			//debug
			//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
			
			//close the zip -- done!
			$zip->close();
			
			//check to make sure the file exists
			return file_exists($destination);
		}
		else
		{
			return false;
		}
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
