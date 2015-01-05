<?php

date_default_timezone_set('Asia/Shanghai');
class TeacherController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin_column2';

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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index','view'),
				'users'=>array('王岳松'),
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
		$model=new Teacher;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Teacher']))
		{
			$model->attributes=$_POST['Teacher'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->teacher_id));
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
		 $model = $this->loadModel($id);
        if (isset($_POST['Teacher'])) {
            $this->performAjaxValidation($model);
          
            $name = $id;
            $type = '.jpg';
            if (isset($_FILES)) {
                $filetype = $_FILES['file']['type'];
                $type = '.jpg';
                if ($filetype == 'image/jpeg') {
                    $type = '.jpg';
                }
                if ($filetype == 'image/jpg') {
                    $type = '.jpg';
                }
                if ($filetype == 'image/pjpeg') {
                    $type = '.jpg';
                }
                if ($filetype == 'image/gif') {
                    $type = '.gif';
                }
                $name = $name . $type;
                $tmp_name = $_FILES["file"]["tmp_name"];
                if (move_uploaded_file($tmp_name, Yii::getPathOfAlias('webroot') . '/' . "teacherPhotos/" . $name)) {
                   
                } else {
                    echo "<script>alert('上传失败,请检查图片的格式（支持JPG，GIF）');</script>";
                }
            }
            $model->attributes = $_POST['Teacher'];
            if ($model->save())
                 $teacher = Teacher::model()->findByPk($id);
                    $teacher->photo = $name;
                    $teacher->save();
                $this->redirect(array('view', 'id' => $model->teacher_id));
        }
        $this->render('update', array(
            'model' => $model,
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
		$dataProvider=new CActiveDataProvider('Teacher');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Teacher('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Teacher']))
			$model->attributes=$_GET['Teacher'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Teacher the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Teacher::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Teacher $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='teacher-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
