<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $fillable = ['type','no','control_no','doc_date','subject','originator','filename','uploaded_by'];

    public function sentTo() {
        return $this->hasMany('App\SentDocs','id','document_id');
    }

    public function docType() {
        return $this->hasOne('App\DocTypes','id','type');
    }
}
