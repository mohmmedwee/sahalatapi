<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditTrack extends Model
{
    public $timestamps = true;
    protected $fillable = [
        "id",
        "users_id",
        "action",
        "users_name",
        "users_role",
        "description",
        "created_at",
        "updated_at"
    ];
    protected $table = 'audit_track';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\Models\Users');
    }


    public function track($data)
    {

        $user = current_user()->getUser();

        $roleGroup='';
        foreach($user->roles as $role){
            $roleGroup.=$role->name.' . ';

        }

        self::create([
            "users_id" => $user->id,
            "action" => $data['action'],
            "users_name" => $user->first_name . ' ' . $user->last_name,
            "users_role" => $roleGroup,
            "description" => $data['description']
        ]);
    }


}
