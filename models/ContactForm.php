<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            
            ['name', 'validateName'],
            
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }
    
    // http://www.yiiframework.com/doc-2.0/guide-input-validation.html#creating-validators
    public function validateName($attribute, $params)
    {
        Yii::info("DBG: name={$this->$attribute}");
        
        if (strlen(trim($this->$attribute)) < 2) {
            $this->addError($attribute, 'Name must be at least 2 characters long. Sorry if your name consists of only one character!');
        }
    }
    
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
//            Yii::$app->mailer->compose()
//                ->setTo($email)
//                ->setFrom([$this->email => $this->name])
//                ->setSubject($this->subject)
//                ->setTextBody($this->body)
//                ->send();
//
//            return true;
            
            return Utils::sendMail($this->subject, $this->body, '{admin}', $this->name, $this->email);
            
        }
        return false;
    }
}
