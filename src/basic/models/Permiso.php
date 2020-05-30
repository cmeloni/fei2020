<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permiso".
 *
 * @property int $id
 * @property string|null $descripcion
 * @property int|null $is_staff
 *
 * @property UsuarioPermiso[] $usuarioPermisos
 * @property Usuario[] $usuarios
 */
class Permiso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permiso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['is_staff'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'is_staff' => 'Is Staff',
        ];
    }

    /**
     * Gets query for [[UsuarioPermisos]].
     *
     * @return \yii\db\ActiveQuery|UsuarioPermisoQuery
     */
    public function getUsuarioPermisos()
    {
        return $this->hasMany(UsuarioPermiso::className(), ['permiso_id' => 'id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery|UsuarioQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id' => 'usuario_id'])->viaTable('usuario_permiso', ['permiso_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PermisoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PermisoQuery(get_called_class());
    }
}
