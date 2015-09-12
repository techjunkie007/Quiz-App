<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\Option;

class QuizController extends Controller
{
    //Generate Quiz
    public function generateQuiz()
    {
        //Random Questions 
        $random=array();
        
        //Populate Random Numbers
        for($count=1; $count<=10; $count++)
        {
            $random[]= $count;
        }
        
        //Fetch Questions
        $questions= Question::find($random);
        $passingData= array();

        $questionNo=1;
        //Store all Questions
        foreach ($questions as $question) 
        {
            //Get Options for this Question
            $options= $question->options;
            $passingData[$question->id]= array('question_id'=>$question->id,
                                                'question_no'=> $questionNo,
                                                'question_data'=> $question->data, 
                                                'question_type'=>$question->type);
            $optionNo=1;
            //Store all Options
            foreach ($options as $option) 
            {
                $passingData[$question->id]['options'][$option->id]= array('option_no'=> $optionNo,
                                                                            'option_id'=> $option->id,
                                                                            'option_data'=> $option->data,
                                                                            'correct'=> $option->flag);
                $optionNo++;
            }
            $questionNo++;
        }
        return view('dashboard.dashboard_quiz')->with('quiz', $passingData);
    }

    //Generate Quiz Result
    public function generateQuizResult()
    {
        $result= array('total_questions'=>0,
                        'correct'=>0);
        $input= \Input::all();
        //Unset CSRF Token
        unset($input['_token']);
        $responses= array();
        foreach ($input as $key => $value) 
        {
            $exploded= explode('+', "$key+");
            $questionId= $exploded[0];
            $responses[$questionId]['quest_id']= $questionId;
            $optionId= $exploded[1];
            if($value == "checked")
            {
                $responses[$questionId]['answers'][$optionId]= "checked";
            }
            else
            {
                $responses[$questionId]['answers'][$optionId]= "unchecked";
            }
        }
        foreach ($responses as $response) 
        {
            $marks=$this->calculateMarks($response);
            if ($marks==1) 
            {
                $result['correct']++;
            }
            $result['total_questions']++;
        }
        return view('dashboard.dashboard_result')->with('result', $result);
    }
    public function calculateMarks($response)
    {
        $question= Question::find($response['quest_id']);
        $correctOptions= $question->options->where('correct_flag', 1);
        $marks=0;
        $marked= array();  
        $correct= array();
        foreach ($response['answers'] as $optionId => $status) 
        {
            if ($status=="checked") 
            {
                $marked[]=$optionId;
            }    
        }
        foreach ($correctOptions as $correctOption)
        {
            $correct[]= $correctOption['id'];
        } 
        //If No Choices Checked
        if(empty($marked))
        {
            return $marks=0;
        }
        $diffArray1 = array_diff($marked, $correct);
        $diffArray2 = array_diff($correct, $marked);

        if (empty($diffArray1) && empty($diffArray2)) 
        {
            return $marks=1;
        }


    }
}
