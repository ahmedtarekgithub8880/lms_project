<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class GroupTime extends Model
{
    protected $fillable = ['group_id', 'group_day', 'group_time'];


    public function getDay()
    {
        switch ($this->group_day) {
            case(0);
                $day = 'Saturday';
                break;
            case(1);
                $day = 'Sunday';
                break;
            case(2);
                $day = 'Monday';
                break;

            case(3);
                $day = 'Tuesday';
                break;
            case(4);
                $day = 'Wednesday';
                break;
            case(5);
                $day = 'Thursday';
                break;
            case(6);
                $day = 'Friday';
                break;
            default :
                $day = 'Not Defined';

        }
        return $day;

    }

}
