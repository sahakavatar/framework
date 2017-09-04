<?php
namespace Sahakavatar\Framework\Models;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Versions
 * @package Sahakavatar\Framework\Models
 */
class Versions extends Model{
    protected $table = 'versions';

    protected $fillable = ['name', 'type', 'path','content'];

    protected $dates = ['created_at','updated_at'];
}