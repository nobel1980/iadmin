<?php

namespace App\Imports;

use App\Models\student_detail;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentDetailsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = new StudentDetail([
            "detail_date" => $row['detail_date'],
            "std_no" => $row['std_no'],
            "attand" => $row['attand'],
            "home_work" => $row['home_work'],
            "exam_name" => $row['exam_name'],
            "exam_result" => $row['exam_result'],
            "comment" => $row['comment']            
        ]);
        return $student_detail;
    }
}

