<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //Accessor for getting Option Data
	public function getDataAttribute()
	{
		//Return Option Data
		return $this->option_data;
	}

	//Accessor for getting Option's Question ID
	public function getIdofquestionAttribute()
	{
		//Return Option Data
		return $this->question_id;
	}

	//Accessor for getting Correct Flag
	public function getFlagAttribute()
	{
		//Return Option Data
		return $this->correct_flag;
	}

	//Option Belongs to a Question
	public function question()
	{
		//Assign Relationship
		return $this->belongsTo('App\Question');
	}

}
