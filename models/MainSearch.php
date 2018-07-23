<?php

/**
 * Created by PhpStorm.
 * User: gev
 * Date: 23.07.2018
 * Time: 12:17
 */
namespace app\models;

use yii\base\Model;

class MainSearch extends Model
{
    public $search;
    public $has_more_results;
    public $limit;
    public function rules()
    {
        return [
            ['search', 'string'],
            ['limit','integer'],
            ['has_more_results', 'boolean']
        ];
    }
}