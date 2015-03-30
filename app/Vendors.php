<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendors extends Model {

	protected $fillable = array(
        "name",
        "email",
        "url",
        "contact",
        "address",
        "shipping",
        "active",
        "use_email",
        "send_attachment",
        "cancel_email",
        "cc_email",
        "set_cron"
    );

}
