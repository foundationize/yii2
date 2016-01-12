<?php

/* @var $this yii\web\View */
/* @var $form foundationize\foundation\FnActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use foundationize\foundation\FnActiveForm;
//use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact us';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="large-5 columns">
                
                <?php // Forms: 
                // http://foundation.zurb.com/sites/docs/forms.html 
                // http://www.yiiframework.com/doc-2.0/guide-input-forms.html
                // http://www.yiiframework.com/doc-2.0/guide-input-validation.html                
                ?>
                                                
                <?php $form = FnActiveForm::begin(['id' => 'contact-form',                    
                    /*, 'options'=>['data-abide'=>true]]*/ ] ); ?>
                    
                    <?php // http://www.yiiframework.com/doc-2.0/guide-input-validation.html#ajax-validation ?>
                    <?= $form->field($model, 'name', ['enableAjaxValidation' => true])
                            ->textInput(['placeholder'=>'Name (ajaxValidated, voila!)'])->label('Name')->hint('Please enter only first name here. Minimum 2 characters (try entering only 1).'); ?>
                                                        
                    <!-- Conditional validation: if they want to be called back, must provide phone number -->
                                        
                    <?= $form->field($model, 'callme')->checkbox(['selected' => true])                            
                            ->hint('If you would like to get a call from us, please leave your phone number.') ?>
                    
                    <?= $form->field($model, 'phone_no')
                            ->textInput(['placeholder'=>'(Conditionally validated based on checkbox above, groovy!)'])
                            ->hint('Integers only (we know we know, you can have +s and things normally! <a target="_blank" href="https://en.wikipedia.org/wiki/KISS_principle">KISS</a> for now, hmmkay?)') ?>                    
                        
                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="large-3 columns">{image}</div><div class="large-6 columns">{input}</div></div>',
                    ]) 
                    ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'small button', 'name' => 'contact-button']) ?>
                    </div>

                <?php FnActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
        
        <br>
        
</div>
