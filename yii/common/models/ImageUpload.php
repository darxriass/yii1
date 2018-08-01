<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 30.07.2018
 * Time: 20:56
 */

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate() && $this->image) {
            $this->image->saveAs("../htdocs/upload/image/{$this->image->baseName}.{$this->image->extension}");
          //  var_dump($this->image);
        } else {
            return false;
        }
    }
}



