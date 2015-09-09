<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Question Model
class Question extends Model
{

	//Accessor for Question Data 
    public function getDataAttribute()
   	{
   		//Return Question Data
    	return $this->question_data;
   	}


  	//Accessor for Question Type 
    public function getTypeAttribute()
   	{
   		//Return Question Type
    	return $this->question_type;
   	}

   	//Question has many Options
   	public function options()
   	{
   		//Assigning Relationship
   		return $this->hasMany('App\Option');
   	}

}
