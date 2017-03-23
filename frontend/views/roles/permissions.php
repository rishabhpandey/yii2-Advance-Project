<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\RolePermission;

$this->title = 'Set Role Permissions';
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-md-12">
    
    <div class="panel panel-color panel-primary"><!-- Add class "collapsed" to minimize the panel -->
    	<div class="panel-heading">
    		<h3 class="panel-title">
    			<i class="glyphicon glyphicon-lock"></i> 
    			<?= Html::encode($this->title) ?>
    		</h3>
               
           	<div class="panel-options">
                    <div class="btn-group">
                       
                    </div>
            </div>
        </div>
        
        <div class="panel-body"> 
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'role_id')->hiddenInput(['maxlength' => true])->label('') ?>
            <table class="table table-bordered table-striped">   
                <thead>
                    <tr>
                        <th style="width:15%;">Roles</th>
                        <th style="width:65%;">Permission</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="width:15%;">
                            <?= $model['role']; ?>
                        </th>
                        
                        <?php if($model['role_id']==7){ ?>
                        
                            <p>Note: You can't set role permissions for Admin.</p>
                            <th style="width:15%;">
                                <input type="checkbox" id="create" name="create" checked='checked' value='1' disabled readonly>Create &nbsp;
                                <input type="checkbox" id="update" name="update" checked='checked' value='1' disabled readonly>Update &nbsp;
                                <input type="checkbox" id="view" name="view" checked='checked' value='1' disabled readonly>View &nbsp;
                                <input type="checkbox" id="delete" name="delete" checked='checked' value='1' disabled readonly>Delete &nbsp;
                            </th>
                        
                        <?php }else{ ?>
                        
                            <th style="width:15%;">
                                <input type="checkbox" id='create' name="create" <?php if (isset($select[0]['create']) && ($select[0]['create'] == 1)){?> checked='checked' value='1' <?php } else { ?>  value='0' <?php } ?> onchange="setRolePer(this.id)">Create &nbsp;
                                <input type="checkbox" id='update' name="update" <?php if (isset($select[0]['update']) && ($select[0]['update'] == 1)){?> checked='checked' value='1' <?php } else { ?>  value='0' <?php } ?> onchange="setRolePer(this.id)">Update &nbsp;
                                <input type="checkbox" id='view' name="view" <?php if (isset($select[0]['view']) && ($select[0]['view'] == 1)){?> checked='checked' value='1'<?php } else { ?>  value='0'<?php } ?> onchange="setRolePer(this.id)">View &nbsp;
                                <input type="checkbox" id='delete' name="delete" <?php if (isset($select[0]['delete'])&& ($select[0]['delete'] == 1)){?> checked='checked' value='1'<?php } else { ?>  value='0'<?php } ?> onchange="setRolePer(this.id)">Delete &nbsp;
                            </th>
                        
                        <?php } ?>
                    </tr>
                </tbody>
            </table>      
            <button type="submit" name="submitForm" id="submitForm" class="btn btn-primary">
                <i class="fa fa-check"></i> 
                Save Permissions
            </button>        
            <?php ActiveForm::end(); ?>
        </div>
    
    </div>
        
    <p>
        <?= Html::a('Back', ['roles/index'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>

<script>
    /* To reset checkbox values from 1 to 0 and vice versa */
    function setRolePer(id){
        var value = $('#'+id).val();
        if(value == 1){
            $('#'+id).val('0');
        }else{
            $('#'+id).val('1');
        }
    }
</script>