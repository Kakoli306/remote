<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Developer;
use App\ProgrammingLanguage;
use App\Language;
class ApiController extends Controller
{
    public function DeveloperDetails(Request $request){

        if(Developers::where(['id'=>$request->developerID])->count()==0){
            $data['error'] = true;
            $data['error_code'] = 404;
            $data['msg'] = "No Developer Found With This ID";
            return response()->json($data);
        }
        try {
            $developerID = $request->developerID;
            if ($developer=Developers::where('id', $developerID)->get()) {
                $DeveloperCollection = new Collection();
                foreach($developer as $item){
                    $item->Email = $item->email;
                    $item->Programming_Language = ProgrammingLanguage::where('id',$this->programming_language_id)->first()->name;
                    $item->Language = Language::where('id',$this->language_id)->first()->code;
                    $DeveloperCollection->push($item);
                }
                $DeveloperCollection = $DeveloperCollection->map(function ($s) {
                    return collect($s->toArray())
                        ->only(['Email' , 'Programming_Language' , 'Language'])
                        ->all();
                });
                $data['developer_detail'] = $DeveloperCollection;
                $data['error'] = false;
                $data['msg'] = "success";
                return response()->json($data);
            } else {
                $data['error'] = true;
                $data['msg'] = "No developer found with this id";
                return response()->json($data);
            }
        }catch(\Error $e){
            $data['error'] = true;
            $data['error_code'] = 500;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
        catch(\Exception $e){
            $data['error'] = true;
            $data['error_code'] = 500;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDeveloperDetails(){
        try {
            if ($developer=Developers::all()) {
                $DeveloperCollection = new Collection();
                foreach($developer as $item){
                    $item->Email = $item->email;
                    $item->Programming_Language = ProgrammingLanguage::where('id',$this->programming_language_id)->first()->name;
                    $item->Language = Language::where('id',$this->language_id)->first()->code;
                    $DeveloperCollection->push($item);
                }
                $DeveloperCollection = $DeveloperCollection->map(function ($s) {
                    return collect($s->toArray())
                        ->only(['Email' , 'Programming_Language' , 'Language'])
                        ->all();
                });
                $data['developer_details'] = $DeveloperCollection;
                $data['error'] = false;
                $data['msg'] = "success";
                return response()->json($data);
            } else {
                $data['error'] = true;
                $data['msg'] = "No developer found";
                return response()->json($data);
            }
        }catch(\Error $e){
            $data['error'] = true;
            $data['error_code'] = 500;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
        catch(\Exception $e){
            $data['error'] = true;
            $data['error_code'] = 500;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
    }

}
