<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Roles;
use frontend\models\RolesSearch;
use frontend\models\Permission;
use frontend\models\PermissionRole;
use frontend\models\RolePermission;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RolesController implements the CRUD actions for Roles model.
 */
class RolesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Roles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RolesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Roles model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Roles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Roles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->role_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Roles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) )
        { 
            $model->updated_at = date('Y-m-d H:i:s');
            
            $model->updated_by = Yii::$app->user->identity->id;
            
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->role_id]);
            }
        }
        
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Roles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Roles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Roles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Roles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findPermission($id)
    {
        if (($model = Permission::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionPermissions($id)
    {        
        $model = $this->findModel($id);
        
        if(isset($_POST['submitForm']) && $model['role_id']!=7){
            
            if(empty($_POST['create']) || (!isset($_POST['create']))){
               $create = 0; 
            }else{
                $create = $_POST['create'];            
            }
            if(empty($_POST['update']) || (!isset($_POST['update']))){
               $update = 0; 
            }else{
                $update = $_POST['update'];            
            }
            if(empty($_POST['view']) || (!isset($_POST['view']))){
               $view = 0; 
            }else{
                $view = $_POST['view'];            
            }
            if(empty($_POST['delete']) || (!isset($_POST['delete']))){
               $delete = 0; 
            }else{
                $delete = $_POST['delete'];            
            }       

            $select = RolePermission::find()->select('*')
                                            ->where(['=','role_id',$id])
                                            ->all();
            
            if(count($select)>0){
                $update = "UPDATE `role_permission` SET `create`='".$create."',`update`='".$update."',`delete`='".$delete."',`view`='".$view."' WHERE `role_id` = $id";
                $updateExecute = Yii::$app->db->createCommand($update)->execute();
                
            }else{
                $insert = "insert into role_permission (`role_id`,`create`,`update`,`delete`,`view`) values('".$id."','".$create."','".$update."','".$delete."','".$view."')";
                $insertExecute = Yii::$app->db->createCommand($insert)->execute();
            } 
        }
        $select = RolePermission::find()->select('*')
                                        ->where(['=','role_id',$id])
                                        ->all();
        
        return $this->render('permissions', [
            'model' => $model,
            'id' => $id,
            'select' => $select,
        ]);
               
    }
}
