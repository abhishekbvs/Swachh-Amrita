<?php
namespace app\models;

use yii\base\Model;
use app\models\User;
use yii\rbac\DbManager;
use Yii;
/**
 * Signup form
 */
class UserForm extends Model
{
    public $id;
    public $username;
    public $name;
    public $email_id;
    public $password;
    public $roll_no;
    public $phone_no;
    
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          
            ['name','required'],

            ['roll_no','required'],

            ['phone_no','required'],
            ['phone_no','integer'],
            ['phone_no','string','max'=>10,'min'=>10,'tooShort'=>'Should be 10 digit long' , 'tooLong' => 'Should be 10 digit long'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email_id', 'trim'],
            ['email_id', 'required'],
            ['email_id', 'email'],
            ['email_id', 'string', 'max' => 255],
            ['email_id', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

         ];
    }
    public function attributeLabels()
    {
        return [
            'username'=>'Username',
            'email_id'=>'Email ID',
            'password'=>'Password',
            'name'=>'Name',
            'roll_no' => 'Roll No.',
            'phone_no' => 'Phone No.',

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function createUser()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->name = $this->name;
        $user->email_id = $this->email_id;
        $user->roll_no = $this->roll_no;
        $user->phone_no = $this->phone_no;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user = $user->save() ? $user : null;
       
        return $user;

    }

    public function updateUser($user)
    {
        $this->id = $user->id;
        $this->username = $user->username;
        $this->name = $user->name;
        $this->email_id = $user->email_id;
        $this->roll_no = $user->roll_no;
        $this->phone_no = $user->phone_no;
    }
        
    public function updateChange($user)
    {
        $user->username = $this->username;
        $user->name = $this->name;
        $user->email_id = $this->email_id;
        $user->roll_no = $this->roll_no;
        $user->phone_no = $this->phone_no;
        $user->setPassword($this->password);
        return $user->save() ? $user : null;
    }
}
