<?php
class ChartStudentInput extends AppModel {
    public $belongsTo = array("Admin.Chart", "StudentInput");
}