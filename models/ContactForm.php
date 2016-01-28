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
    // Custom (optional)
    public $callme; // bool
    public $phone_no; // int
    public $query_type;
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            
            ['name', 'validateName'],
            
            // http://www.yiiframework.com/doc-2.0/guide-input-validation.html#conditional-validation
            ['phone_no', 'required', 'when' => function ($model) {
                return ($model->callme == true);
                },
                'whenClient' => "function (attribute, value) {
                    return $('#contactform-callme').is(':checked') === true;
                 }"
            ],
            
            ['phone_no', 'integer'],
                        
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            // Careful on ajax-enabled forms, captcha fails because model already validated at ajax check (which regenerates captcha):
            // http://stackoverflow.com/questions/26923230/why-yii2-captcha-cant-through-the-verification-on-the-client-side
            // https://github.com/yiisoft/yii2/issues/6115#issuecomment-63956403
            ['verifyCode', 'captcha'],
        ];
    }
    
    // http://www.yiiframework.com/doc-2.0/guide-input-validation.html#creating-validators
    public function validateName($attribute, $params)
    {   
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
            'callme' => 'Please give me a call',
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
        $subject = Yii::getAlias('@site_name') . ' contact received: ' . $this->subject;
        
        // Append the from name + email to the body:
        $message = $this->body .
                "\r\n \r\n" . 
                "Sent by: {$this->name}<{$this->email}>";                
        
        return Utils::sendMail($subject, $message, '{admin}', $this->name, $this->email);
    }
}
