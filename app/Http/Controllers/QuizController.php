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
}
