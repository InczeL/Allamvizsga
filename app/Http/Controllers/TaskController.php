<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\Test;
use App\Models\Result;
use App\Models\SampelTest;
use File;

class TaskController extends Controller
{
    public function index(){
        return view('home');
    }
    public function taskDesc(){
        return view('taskDesc');
    }
    function newTask(){
        return view('newTask');
    }
    function taskResults($id){
        return view('taskResults')->with('id',$id);
    }
    
    public function CodeTesting(){
        
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
    
        $tests =  Test::where('task_id',$id)->get();
        $command= 'g++ -Wall -std=c++14 ' . $fileName .' -o ' .$procName;
        $compiler = proc_open( $command , $descriptorspec, $pipes, null, null);
        proc_close($compiler);
        $correct=true;
        if(filesize($errorFile)==0){
            foreach($tests as $test){
                $exe=proc_open($procName,$descriptorspec,$pipes,null,null);
                $json=json_decode($test->test_value);
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
                    proc_close($exe);
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
        if(request()->has('class'))
        {
            $class = request('class');
        }
        else{
            $class = '__';
        }
        if(request()->has('category'))
        {
            $category = request('category');
        }
        else{
            $category = '__';
        }
        if(request()->has('subCategory'))
        {
            $subCategory = request('subCategory');
        }
        else{
            $subCategory = '__';
        }
        $diff = request('difficulty');
        $id = $class .$category.$subCategory.'__';
        if($diff){
            $tasks = Task::where('task_id','like',$id)
            ->where('difficulty',$diff)
            ->paginate(10)
            ->appends('difficulty',$diff)
            ->appends('class',$class)
            ->appends('category',$category)
            ->appends('subCategory',$subCategory);
        }
        else{
            $tasks = Task::where('task_id','like',$id)
            ->paginate(10)
            ->appends('class',$class)
            ->appends('category',$category)
            ->appends('subCategory',$subCategory);
        }
        return view('taskDesc')->with('tasks',$tasks);
    }

    function getTaskById($id){
        $task = Task::where('task_id',$id)->first();
        $test = SampelTest::where('task_id',$id)->first(); 
        if(session()->has('LoggedUser')){
            $result = Result::where('task_id',$id)->where('user_id',session()->get('LoggedUser')->id)->first();
            return view('TaskDetails')->with('task',$task)->with('test',$test)->with('taskResult',$result);
        }
        else{
            return view('TaskDetails')->with('task',$task)->with('test',$test);
        }
        
    }
}
