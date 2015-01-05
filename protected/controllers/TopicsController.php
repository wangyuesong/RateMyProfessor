<?php

date_default_timezone_set('Asia/Shanghai');

class TopicsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/homeMain';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'makeReply', 'publishTopic', "collectTopic"),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('王岳松'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $criteria1 = new CDbCriteria;

        $criteria1->condition = "topic_id = '" . $id . "'";
        $criteria1->order = 'floor';
        $replyDataProvider = new CActiveDataProvider('Topicreply', array(
            'criteria' => $criteria1,
            'pagination' => array(
                'pageSize' => 15,
        )));
        /* @var topic  Topic */
        $topic = Topic::model()->findByPk($id);
        $topic->clicktime ++;
        $topic->save();

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'replyDataProvider' => $replyDataProvider
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Topic;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Topic'])) {
            $model->attributes = $_POST['Topic'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Topic'])) {
            $model->attributes = $_POST['Topic'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $criteria1 = new CDbCriteria;
        $criteria2 = new CDbCriteria;
        $criteria3 = new CDbCriteria;
        $criteria4 = new CDbCriteria;
        $criteria5 = new CDbCriteria;
        $criteria6 = new CDbCriteria;
        $criteria1->condition = "type = '换课区'";
        $criteria1->order = 'lastreplytime DESC';
        $courseDataProvider = new CActiveDataProvider('Topic', array(
            'criteria' => $criteria1,
            'pagination' => array(
                'pageSize' => 15,
        )));
        $criteria2->condition = "type = '换书区'";
        $criteria2->order = 'lastreplytime DESC';
        $bookDataProvider = new CActiveDataProvider('Topic', array(
            'criteria' => $criteria2,
            'pagination' => array(
                'pageSize' => 15,
        )));

        $criteria3->condition = "type = '约课区'";
        $criteria3->order = 'lastreplytime DESC';
        $dateDataProvider = new CActiveDataProvider('Topic', array(
            'criteria' => $criteria3,
            'pagination' => array(
                'pageSize' => 15,
        )));

        $criteria4->condition = "account = " . Yii::app()->user->id;
//        $criteria4->order = 'lastreplytime DESC';
        $myCollectionDataProvider = new CActiveDataProvider('Topiccollection', array(
            'criteria' => $criteria4,
            'pagination' => array(
                'pageSize' => 15,
        )));


        $criteria5->condition = "account = " . Yii::app()->user->id;
//        $criteria4->order = 'lastreplytime DESC';
        $myTopicDataProvider = new CActiveDataProvider('Topic', array(
            'criteria' => $criteria5,
            'pagination' => array(
                'pageSize' => 15,
        )));

        $criteria6->condition = "account = " . Yii::app()->user->id;
//        $criteria4->order = 'lastreplytime DESC';
        $myReplyDataProvider = new CActiveDataProvider('Topicreply', array(
            'criteria' => $criteria6,
            'pagination' => array(
                'pageSize' => 15,
        )));


        $this->render('index', array(
            'courseDataProvider' => $courseDataProvider,
            'bookDataProvider' => $bookDataProvider,
            'dateDataProvider' => $dateDataProvider,
            'myCollectionDataProvider' => $myCollectionDataProvider,
            'myTopicDataProvider' => $myTopicDataProvider,
                'myReplyDataProvider'=>$myReplyDataProvider
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Topic('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Topic']))
            $model->attributes = $_GET['Topic'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionMakeReply($id) {
        if (isset($_POST)) {
            $topicId = $id;
            $replyContent = $_POST["replyContent"];
            $replyFloor = $_POST["ref"];
            $realReplyContent = "";

            $topic = Topic::model()->findByPk($id);
            //帖子
            $topic->currentfloor ++;
            $topic->lastreplytime = date("Y-m-d H:i:s");
            //改变帖子的一些属性

            $reply = "";
            if ($replyFloor != "NO") {
                //如果是回复某一层的话
                $criteria = new CDbCriteria;
                $criteria->addCondition("topic_id = :topicId");
                $criteria->params["topicId"] = $id;
                $criteria->addCondition("floor = :floor");
                $criteria->params["floor"] = $replyFloor;
                $tr = Topicreply::model()->find($criteria);
                //找到回复的层数，构造回复内容
                $realReplyContent = "<em>";
                $realReplyContent .= "回复" . $replyFloor . "楼:";
                $realReplyContent .= "<hr/>";
                $realReplyContent .= "</em>";
                $realReplyContent .= $replyContent;

                $reply = new Topicreply();
                $reply->account = Yii::app()->user->id;
                $reply->content = $realReplyContent;
                $reply->floor = $topic->currentfloor;
                $reply->reference = (int) $tr->id;
                $reply->topic_id = (int) $id;
                $reply->addtime = date("Y-m-d H:i:s");
            } else {
                $reply = new Topicreply();

                $reply->account = Yii::app()->user->id;
                $reply->content = $replyContent;
                $reply->floor = $topic->currentfloor;
                $reply->topic_id = (int) $id;
                $reply->addtime = date("Y-m-d H:i:s");
            }

            /* @var reply Topicreply */

            $reply->save();
            $topic->save();
        }
        $criteria1 = new CDbCriteria;

        $criteria1->condition = "topic_id = '" . $id . "'";
        $criteria1->order = 'floor';
        $replyDataProvider = new CActiveDataProvider('Topicreply', array(
            'criteria' => $criteria1,
            'pagination' => array(
                'pageSize' => 15,
        )));
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'replyDataProvider' => $replyDataProvider
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Topic the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Topic::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Topic $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'topic-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPublishTopic() {

        $zone = $_POST["topicZone"];
        $title = $_POST["topicTitle"];
        $content = $_POST['topicContent'];

        /* @var topic Topic */
        $topic = new Topic;
        $topic->account = Yii::app()->user->id;
        $topic->content = $content;
        $topic->title = $title;
        $topic->type = $zone;
        $topic->addtime = date("Y-m-d H:i:s");
        $topic->lastreplytime = date("Y-m-d H:i:s");
//            if(isset($_POST["file"])){
        //$upfile="../upload_file/".$_FILES["file"]["name"];
        $name = date("YmdHis"); //定义变量，保存图片名，以防图片的名字相同
        $name .= $title;

        $type = '.jpg';
        if (isset($_FILES)) {
            $filetype = $_FILES['file']['type'];
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

            $topic->photo = $name;

            $tmp_name = $_FILES["file"]["tmp_name"];

            if (move_uploaded_file($tmp_name, Yii::getPathOfAlias('webroot') . '/' . "topicPhotos/" . $name)) {
                $topic->save();
                $this->actionIndex();

//    echo "<script>alert('上传成功');</script>";
            } else {
                echo "<script>alert('上传失败,请检查图片的格式（支持JPG，GIF）');</script>";
            }
        } else {
            $this->actionIndex();
        }
    }

    public function actionCollectTopic() {
        if (isset($_POST)) {
            $topic_id = $_POST["id"];
            $criteria = new CDbCriteria;
            $criteria->addCondition("topic_id = :topicId");
            $criteria->params["topicId"] = $topic_id;
            $criteria->addCondition("account = :account");
            $criteria->params["account"] = Yii::app()->user->id;
            $t = TopicCollection::model()->find($criteria);
            if (is_null($t)) {
                $tc = new TopicCollection;
                $tc->topic_id = $topic_id;
                $tc->account = Yii::app()->user->id;
                $tc->save();
            } else {
                $t->delete();
            }
        }
    }

    public function actionIsCollected() {
        $topic_id = $_POST["id"];
        $criteria = new CDbCriteria;
        $criteria->addCondition("topic_id = :topicId");
        $criteria->params["topicId"] = $topic_id;
        $criteria->addCondition("account = :account");
        $criteria->params["account"] = Yii::app()->user->id;
        $t = TopicCollection::model()->find($criteria);
        if (is_null($t)) {
            return true;
        } else {
            return false;
        }
    }

//}
}
