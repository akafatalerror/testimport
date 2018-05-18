<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{

    /**
     * table name
     *
     * @var string
     * @access protected
     */
    protected $table = 'summary';

    /**
     * primaryKey
     *
     * @var integer
     * @access protected
     */
    protected $primaryKey = null;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_on', 'country_iso', 'shows', 'clicks'
    ];

    public $timestamps = false;


}
