<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Task;
use App\Models\Test;
use App\Models\SampelTest;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class NewTask extends Component
{
    public $selectedClass = null;
    public $selectedCategory = null;
    public $class = null;
    public $categories = null;
    public $subCategories =null;

    public $taskName ;
    public $taskDesc ;
    public $selectedSubCategory ;
    public $difficulty ;
    public $inputType ;
    public $outputType ;
    public $sampelInput ;
    public $sampelOutput ;
    public $input1 ;
    public $output1 ;
    public $input2 ;
    public $output2 ;
    public $input3 ;
    public $output3 ;
    public $input4 ;
    public $output4 ;
    public $task_id;

    public function ResetInputFiels(){
        $this->taskName = '';
        $this->taskDesc = '';
        $this->selectedClass = '';
        $this->selectedCategory ='';
        $this->selectedSubCategory = '';
        $this->difficulty = '';
        $this->inputType = '';
        $this->outputType = '';
        $this->sampelInput = '';
        $this->sampelOutput ='';
        $this->input1 = '';
        $this->output1 = '';
        $this->input2 = '';
        $this->output2 = '';
        $this->input3 = '';
        $this->output3 = '';
        $this->input4 = '';
        $this->output4 = '';

    }
    public function store(){
        $validatedData =$this->validate([
            'taskName' => 'required',
            'taskDesc' => 'required',
            'selectedClass' => 'required',
            'selectedCategory' => 'required',
            'selectedSubCategory' => 'required',
            'difficulty' => 'required',
            'inputType' => 'required',
            'sampelInput' => 'required',
            'outputType' => 'required',
            'sampelOutput' => 'required',
            'input1' => 'required',
            'output1' => 'required',
            'input2' => 'required',
            'output2' => 'required',
            'input3' => 'required',
            'output3' => 'required',
            'input4' => 'required',
            'output4' => 'required'
        ]);
     
        $taskIncId =Task::all('id')->last();
        $taskIncId= $taskIncId->id +1;

        $this->task_id = $this->selectedClass.$this->selectedCategory.$this->selectedSubCategory.$taskIncId;
        switch($this->inputType){
            case "int":
                $sampelArr= array('value' => array_map('intval',explode(' ',$this->sampelInput)),
                          'result' => array_map('intval',explode(' ',$this->sampelOutput)));
                $TestArr1= array('value' => array_map('intval',explode(' ',$this->input1)),
                          'result' => array_map('intval',explode(' ',$this->output1)));
                $TestArr2= array('value' => array_map('intval',explode(' ',$this->input2)),
                          'result' => array_map('intval',explode(' ',$this->output2)));
                $TestArr3= array('value' => array_map('intval',explode(' ',$this->input3)),
                          'result' => array_map('intval',explode(' ',$this->output3)));
                $TestArr4= array('value' => array_map('intval',explode(' ',$this->input4)),
                          'result' => array_map('intval',explode(' ',$this->output4)));
                break;
            case "float": 
                $sampelArr= array('value' => array_map('floatval',explode(' ',$this->sampelInput)),
                          'result' => array_map('floatval',explode(' ',$this->sampelOutput)));
                $TestArr1= array('value' => array_map('floatval',explode(' ',$this->input1)),
                          'result' => array_map('floatval',explode(' ',$this->output1)));
                $TestArr2= array('value' => array_map('floatval',explode(' ',$this->input2)),
                          'result' => array_map('floatval',explode(' ',$this->output2)));
                $TestArr3= array('value' => array_map('floatval',explode(' ',$this->input3)),
                          'result' => array_map('floatval',explode(' ',$this->output3)));
                $TestArr4= array('value' => array_map('floatval',explode(' ',$this->input4)),
                          'result' => array_map('floatval',explode(' ',$this->output4)));
                break;
            default : 
                $sampelArr= array('value' => explode(' ',$this->sampelInput),
                          'result' => explode(' ',$this->sampelOutput));
                $TestArr1= array('value' => explode(' ',$this->input1),
                          'result' => explode(' ',$this->output1));
                $TestArr2= array('value' => explode(' ',$this->input2),
                          'result' => explode(' ',$this->output2));
                $TestArr3= array('value' => explode(' ',$this->input3),
                          'result' => explode(' ',$this->output3));
                $TestArr4= array('value' => explode(' ',$this->input4),
                          'result' => explode(' ',$this->output4));
        }
        $sampelJson = json_encode($sampelArr);
        $tetsJson1 = json_encode($TestArr1);
        $tetsJson2 = json_encode($TestArr2);
        $tetsJson3 = json_encode($TestArr3);
        $tetsJson4 = json_encode($TestArr4);
        
        $Task = new Task;
        $Task->task_id =  $this->task_id;
        $Task->task_name = $this->taskName;
        $Task->task_desc = $this->taskDesc;
        $Task->difficulty = $this->difficulty;
        $Task->user_id = session()->get('LoggedUser')->id;
        $Task->save();

        $sampelTest = new SampelTest;
        $sampelTest->task_id=  $this->task_id;
        $sampelTest->test_value = $sampelJson;
        $sampelTest->save();
       
        $test1 = new Test;
        $test1->task_id =  $this->task_id;
        $test1->test_value = $tetsJson1;
        $test1->save();

        $test2 = new Test;
        $test2->task_id =  $this->task_id;
        $test2->test_value = $tetsJson2;
        $test2->save();

        $test3 = new Test;
        $test3->task_id =  $this->task_id;
        $test3->test_value = $tetsJson3;
        $test3->save();

        $test4 = new Test;
        $test4->task_id =  $this->task_id;
        $test4->test_value = $tetsJson4;
        $test4->save();

        $this->ResetInputFiels();
        $this->emit('newTaskAdded');
        return back();
    }
    public function edit($id){

        $task = Task::where('task_id',$id)->first();
        $sampelTest = SampelTest::where('task_id',$id)->first();
        $tests = Test::where('task_id',$id)->get();

        $this->task_id = $task->task_id;
        $this->taskName = $task->task_name;
        $this->taskDesc = $task->task_desc;
        /*$this->selectedClass = substr($task->task_id,0,2);
        $this->selectedCategory =substr($task->task_id,2,2);
        $this->selectedSubCategory = substr($task->task_id,4,2);*/
        $this->difficulty = $task->difficulty;

        $sampelTest->test_value= json_decode( $sampelTest->test_value);
        $this->sampelInput = implode(' ',$sampelTest->test_value->value);
        $this->sampelOutput =implode(' ',$sampelTest->test_value->result);

        for($i=0 ;$i<4;$i++){
            $tests[$i]->test_value=json_decode($tests[$i]->test_value);
        }
        $this->input1 = implode(' ',$tests[0]->test_value->value);
        $this->output1 = implode(' ',$tests[0]->test_value->result);
        $this->input2 = implode(' ',$tests[1]->test_value->value);
        $this->output2 = implode(' ',$tests[1]->test_value->result);
        $this->input3 = implode(' ',$tests[2]->test_value->value);
        $this->output3 = implode(' ',$tests[2]->test_value->result);
        $this->input4 = implode(' ',$tests[3]->test_value->value);
        $this->output4 = implode(' ',$tests[3]->test_value->result);

    }
    public function update(){
        $this->validate([
            'taskName' => 'required',
            'taskDesc' => 'required',
            'selectedClass' => 'required',
            'selectedCategory' => 'required',
            'selectedSubCategory' => 'required',
            'difficulty' => 'required',
            'inputType' => 'required',
            'sampelInput' => 'required',
            'outputType' => 'required',
            'sampelOutput' => 'required',
            'input1' => 'required',
            'output1' => 'required',
            'input2' => 'required',
            'output2' => 'required',
            'input3' => 'required',
            'output3' => 'required',
            'input4' => 'required',
            'output4' => 'required'
        ]);
        if($this->task_id){
            $task = Task::where('task_id',$this->task_id)->first();
            $sampelTest = SampelTest::where('task_id',$this->task_id)->first();
            $tests = Test::where('task_id',$this->task_id)->get();
            switch($this->inputType){
                case "int":
                    $sampelArr= array('value' => array_map('intval',explode(' ',$this->sampelInput)),
                              'result' => array_map('intval',explode(' ',$this->sampelOutput)));
                    $TestArr1= array('value' => array_map('intval',explode(' ',$this->input1)),
                              'result' => array_map('intval',explode(' ',$this->output1)));
                    $TestArr2= array('value' => array_map('intval',explode(' ',$this->input2)),
                              'result' => array_map('intval',explode(' ',$this->output2)));
                    $TestArr3= array('value' => array_map('intval',explode(' ',$this->input3)),
                              'result' => array_map('intval',explode(' ',$this->output3)));
                    $TestArr4= array('value' => array_map('intval',explode(' ',$this->input4)),
                              'result' => array_map('intval',explode(' ',$this->output4)));
                    break;
                case "float": 
                    $sampelArr= array('value' => array_map('floatval',explode(' ',$this->sampelInput)),
                              'result' => array_map('floatval',explode(' ',$this->sampelOutput)));
                    $TestArr1= array('value' => array_map('floatval',explode(' ',$this->input1)),
                              'result' => array_map('floatval',explode(' ',$this->output1)));
                    $TestArr2= array('value' => array_map('floatval',explode(' ',$this->input2)),
                              'result' => array_map('floatval',explode(' ',$this->output2)));
                    $TestArr3= array('value' => array_map('floatval',explode(' ',$this->input3)),
                              'result' => array_map('floatval',explode(' ',$this->output3)));
                    $TestArr4= array('value' => array_map('floatval',explode(' ',$this->input4)),
                              'result' => array_map('floatval',explode(' ',$this->output4)));
                    break;
                default : 
                    $sampelArr= array('value' => explode(' ',$this->sampelInput),
                              'result' => explode(' ',$this->sampelOutput));
                    $TestArr1= array('value' => explode(' ',$this->input1),
                              'result' => explode(' ',$this->output1));
                    $TestArr2= array('value' => explode(' ',$this->input2),
                              'result' => explode(' ',$this->output2));
                    $TestArr3= array('value' => explode(' ',$this->input3),
                              'result' => explode(' ',$this->output3));
                    $TestArr4= array('value' => explode(' ',$this->input4),
                              'result' => explode(' ',$this->output4));
            }
            $sampelJson = json_encode($sampelArr);
            $tetsJson1 = json_encode($TestArr1);
            $tetsJson2 = json_encode($TestArr2);
            $tetsJson3 = json_encode($TestArr3);
            $tetsJson4 = json_encode($TestArr4);

            $taskId = $this->selectedClass.$this->selectedCategory.$this->selectedSubCategory.substr($this->task_id,6);
    
            $task->task_id =  $taskId;
            $task->task_name = $this->taskName;
            $task->task_desc = $this->taskDesc;
            $task->difficulty = $this->difficulty;
            $task->save();

            $sampelTest->task_id =$taskId;
            $sampelTest->test_value =$sampelJson;
            $sampelTest->save();

            $tests[0]->task_id =$taskId;
            $tests[0]->test_value =$tetsJson1;
            $tests[0]->save();

            $tests[1]->task_id =$taskId;
            $tests[1]->test_value =$tetsJson2;
            $tests[1]->save();

            $tests[2]->task_id =$taskId;
            $tests[2]->test_value =$tetsJson3;
            $tests[2]->save();

            $tests[3]->task_id =$taskId;
            $tests[3]->test_value =$tetsJson4;
            $tests[3]->save();

            $this->ResetInputFiels();
            $this->emit('taskUpdated');
        }
    }
    public function render()
    {
        $tasks = DB::table('tasks')->select('*',
        Db::raw('GROUP_CONCAT(tests.test_value SEPARATOR ";") as test_values'))
        ->join('tests','tasks.task_id',"=",'tests.task_id')
        ->join('sampel_tests','tasks.task_id','=','sampel_tests.task_id')
        ->groupBy('tasks.task_id')
        ->where('tasks.user_id',session()->get('LoggedUser')->id)
        ->get();
        $testsJson = array();
        foreach($tasks as $task){
            $tests = explode(";",$task->test_values);
            foreach($tests as $test){
                array_push($testsJson,json_decode($test));
            }
            $task->test_values=$testsJson;
            $task->test_value =json_decode($task->test_value);
            $testsJson = array();
        }
        return view('livewire.new-task',['tasks'=>$tasks]);
    }

    public function updatedSelectedClass($class){
        $this->categories =Category::where('class',$class)->get();
        
    }
    
    public function updatedSelectedCategory($categories){
        $this->subCategories = Sub_category::where('sub_categories_class',$this->selectedClass)->where('sub_categories_category_code',$categories)->get();
        
    }
}
