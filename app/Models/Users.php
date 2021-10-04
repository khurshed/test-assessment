<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ArrayOfIntegers;

class Users extends Model
{
    const LOG_PRE='users model ';
    protected $table = 'tbl_users';

    public $rules = [
        'ids' => 'required|array_of_integers',
        'fmt' => 'boolean'
    ];
    public $messages = [
        'required' => 'The :attribute is required',
        'boolean' => 'The :attribute should be either true or false',
    ];

    /**
     * @author Khurshed
     * @param  $ids array of integer required
     * @param  $fmt optional boolean
     *
     * @return array of users
     */


    public function getByIds(Request $request) {
        try{
           $validator = Validator::make($request->all(), $this->rules, $this->messages);

            if($validator->fails())
            {
                \Log::error(self::LOG_PRE . 'erros:' . json_encode($validator->errors()));
                return ['errors' => $validator->errors()
                    , 'status' => 'failed', 'statusCode' => 401];
            }else{
                $users = Users::select(['id','mobile_no', 'email_id'])->whereIn('id', $request->ids)->get();
                if(!empty($request->fmt)){
                    // generate data for csv file
                    $user_data = 'Id,Mobile No,Email\n';
                    foreach($users as $user){
                        $user_data.=$user->id .',' . $user->mobile_no .',' .$user->email_id .'\n'; 
                    }
                    $users = $user_data;
                    unset($user_data);
                }
                return ['users' => $users, 'status' => 'success', 'statusCode' => 200];
            }

        }catch(\Exception $e){
            \Log::error(self::LOG_PRE . 'exception message:' . $e->getMessage() . ' at line No.'. $e->getLine() . ' of file ' .$e->getFile() ." tarce:". json_encode($e->getTrace()));
            return ['errors' => ['messages' => $e->getMessage()]
                    , 'status' => 'failed', 'statusCode' => 401];
        }
    }

}
