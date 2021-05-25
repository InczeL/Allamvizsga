<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\Test;
use App\Models\Result;
use App\Models\SampelTest;
use File;

class MainController extends Controller
{
    public function index(){
        return view('home');
    }
    public function taskDo(){
        return view('taskDo');
    }
    public function taskDesc(){
        return view('taskDesc');
    }
    
    public function saveFile(){
        
        $code= request('code');
        $result;
        $score = 0;
        $fileName= session()->get('LoggedUser')->user_name .'.cpp';
        $procName =session()->get('LoggedUser')->user_name ;
        $file=fopen($fileName,"w+") or die ("file not open");
        
        fputs($file,$code) or die ("Data not write");
        fclose($file);
        $id= request('id');
        $errorFile = session()->get('LoggedUser')->user_name .'error.txt';
        $descriptorspec = array(
            0=>array('pipe', 'r'), //stdin
            1=>array('pipe', 'w'), //stdout
            2 => array("file", $errorFile,"w+") //stderr
         );
        
        $query =  Test::where('task_id',$id)->get();
        $command= 'g++ -Wall -std=c++14 ' . $fileName .' -o ' .$procName;
        $compiler = proc_open( $command , $descriptorspec, $pipes, null, null);
        proc_close($compiler);
        $correct=true;
        if(filesize($errorFile)==0){
            foreach($query as $q){
                $exe=proc_open($procName,$descriptorspec,$pipes,null,null);
                $json=json_decode($q->test_value);
                $variabls= $json->value;
                $result= $json->result;
                foreach($variabls as $value){
                    fwrite($pipes[0],"$value\n");
                }
                fclose($pipes[0]);
                $result_get=stream_get_contents($pipes[1]);
                $result_gets=explode(" ",$result_get);  
                for($i=0; $i< count($result_gets);$i++){
                    if($result_gets[$i]!=$result[$i]){
                        $correct =false;
                        fclose($pipes[1]);
                        break;
                    }
                    else{
                        $score = $score + 25;
                    }   
                }
                if($correct){
                    fclose($pipes[1]);
                }
                else{
                    break;
                }
                proc_close($exe);
            }
        }
        else{
            $response= file_get_contents($errorFile,true);
            return back()->withInput(['tab'=>'kodolas'])->with('response',$response)->with('code',$code);
        }
        if($score >=50){
            $response="Helyes";
            $taskResult = new Result;
            $taskResult->task_id = $id;
            $taskResult->user_id = session()->get('LoggedUser')->id;
            $taskResult->result = $code;
            $taskResult->score = $score;
            $taskResult->save();
        }
        else{
            $response = "Várt eredmény:$result[$i], kapott eredmény $result_get";
        }
        $procName = $procName .'.exe';
        File::delete($errorFile,$fileName,$procName);
        return back()->withInput(['tab'=>'kodolas'])->with('response',$response)->with('code',$code);
    }

    function getTasks(){
        $tasks = Task::paginate(10);
        return view('taskDesc')->with('tasks',$tasks);
    }

    function getTaskById($id){
        $task = Task::where('task_id',$id)->first();
        $test = SampelTest::where('task_id',$id)->first(); 
        if(session()->has('LoggedUser')){
            $result = Result::where('task_id',$id)->where('user_id',session()->get('LoggedUser')->id)->first();
        }
        else{
            $result = Result::where('task_id',$id)->first();
        }
        return view('TaskDetails')->with('task',$task)->with('test',$test)->with('taskResult',$result);
    }

    function getFilteredTask(){

        $class = request('class');
        $category = request('category');
        $subCategory = request('subcategory');
        $diff = request('difficulty');
        $id = $class .$category.$subCategory.'__';
        $tasks = Task::where('task_id','like',$id)->paginate(10);
        if($diff){
            $tasks = Task::where('task_id','like',$id)->where('difficulty',$diff)->paginate(10);
        }
        else{
            $tasks = Task::where('task_id','like',$id)->paginate(10);
        }
        return view('taskDesc')->with('tasks',$tasks);
    }
    function putTask(Request $req){
        $taskName = $req->task_name;
        $taskDesc = $req->task_desc;
        $class = $req->class;
        $category = $req->category;
        $subCategory = $req->subcategory;
        $diff =  intval($req->difficulty);
        $taskIncId = intval(substr(Task::all()->last()->task_id,6))+1;
        $task_id = $class.$category.$subCategory.$taskIncId;
        $inputType = $req->iType;
        $outputType = $req->oType;
        $sampelInput = $req->SempInutData;
        $sampelOutput = $req->SempOutpitData;
        $input1 = $req->InputData1;
        $output1 = $req->OutputData1;
        $input2 = $req->InputData2;
        $output2 = $req->OutputData2;
        $input3 = $req->InputData3;
        $output3 = $req->OutputData3;
        $input4 = $req->InputData4;
        $output4 = $req->OutputData4;
        
        switch($inputType){
            case "int":
                $sampelArr= array('value' => array_map('intval',explode(' ',$sampelInput)),
                          'result' => array_map('intval',explode(' ',$sampelOutput)));
                $TestArr1= array('value' => array_map('intval',explode(' ',$input1)),
                          'result' => array_map('intval',explode(' ',$output1)));
                $TestArr2= array('value' => array_map('intval',explode(' ',$input2)),
                          'result' => array_map('intval',explode(' ',$output2)));
                $TestArr3= array('value' => array_map('intval',explode(' ',$input3)),
                          'result' => array_map('intval',explode(' ',$output3)));
                $TestArr4= array('value' => array_map('intval',explode(' ',$input4)),
                          'result' => array_map('intval',explode(' ',$output4)));
                break;
            case "float": 
                $sampelArr= array('value' => array_map('floatval',explode(' ',$sampelInput)),
                          'result' => array_map('floatval',explode(' ',$sampelOutput)));
                $TestArr1= array('value' => array_map('floatval',explode(' ',$input1)),
                          'result' => array_map('floatval',explode(' ',$output1)));
                $TestArr2= array('value' => array_map('floatval',explode(' ',$input2)),
                          'result' => array_map('floatval',explode(' ',$output2)));
                $TestArr3= array('value' => array_map('floatval',explode(' ',$input3)),
                          'result' => array_map('floatval',explode(' ',$output3)));
                $TestArr4= array('value' => array_map('floatval',explode(' ',$input4)),
                          'result' => array_map('floatval',explode(' ',$output4)));
                break;
            default : 
                $sampelArr= array('value' => explode(' ',$sampelInput),
                          'result' => explode(' ',$sampelOutput));
                $TestArr1= array('value' => explode(' ',$input1),
                          'result' => explode(' ',$output1));
                $TestArr2= array('value' => explode(' ',$input2),
                          'result' => explode(' ',$output2));
                $TestArr3= array('value' => explode(' ',$input3),
                          'result' => explode(' ',$output3));
                $TestArr4= array('value' => explode(' ',$input4),
                          'result' => explode(' ',$output4));
        }
        
        $sampelJson = json_encode($sampelArr);
        $tetsJson1 = json_encode($TestArr1);
        $tetsJson2 = json_encode($TestArr2);
        $tetsJson3 = json_encode($TestArr3);
        $tetsJson4 = json_encode($TestArr4);
        
        $Task = new Task;
        $Task->task_id = $task_id;
        $Task->task_name = $taskName;
        $Task->task_desc = $taskDesc;
        $Task->difficulty = $diff;
        $Task->user_id = session()->get('LoggedUser')->id;
        $Task->save();

        $sampelTest = new SampelTest;
        $sampelTest->task_id= $task_id;
        $sampelTest->test_value = $sampelJson;
        $sampelTest->save();
       
        $test1 = new Test;
        $test1->task_id = $task_id;
        $test1->test_value = $tetsJson1;
        $test1->save();

        $test2 = new Test;
        $test2->task_id = $task_id;
        $test2->test_value = $tetsJson2;
        $test2->save();

        $test3 = new Test;
        $test3->task_id = $task_id;
        $test3->test_value = $tetsJson3;
        $test3->save();

        $test4 = new Test;
        $test4->task_id = $task_id;
        $test4->test_value = $tetsJson4;
        $test4->save();

        return back();
    }
}
