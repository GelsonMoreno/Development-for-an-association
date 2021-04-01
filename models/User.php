<?php


namespace app\models;


use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
  /**
   * {@inheritdoc}
   */
  public static function findIdentity($id)
  {
    return User::findOne(['id'=> $id]);
  }

  /**
   * {@inheritdoc}
   */
  public static function findIdentityByAccessToken($token, $type = null)
  {
    return \yii\base\NotSupportedException::class;
  }

  /**
   * {@inheritdoc}
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * {@inheritdoc}
   */
  public function getAuthKey()
  {
    return \yii\base\NotSupportedException::class;
  }

  /**
   * {@inheritdoc}
   */
  public function validateAuthKey($authKey): bool
  {
    return \yii\base\NotSupportedException::class;
  }


  public function validatePassword($password): bool
  {
    return $this->password === $password;
  }

  /**

   * @return string

   */

  public static function tableName(): string
  {

    return '{{%users}}';

  }

  public function isAdmin(): bool
  {
    return $this->User_types_id == User_types::admin_group()->id;
  }
  public function isAssociated(): bool
  {
        return $this->User_types_id == User_types::associated_group()->id;
  }
  public function isEmployee(): bool
  {
        return $this->User_types_id == User_types::employee_group()->id;
  }
  public function isBoard(): bool
  {
        return $this->User_types_id == User_types::board_group()->id;
  }
}