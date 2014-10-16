<?php
namespace GSB\Domain;

class Report 
{
private $report_id;
private $practitioner;
private $visitor;
private $reporting_date;
private $assessment;
private $purpose;

public function getReport_id() {
    return $this->report;
}

public function getPractitioner() {
    return $this->practitioner;
}

public function getVisitor() {
    return $this->visitor;
}

public function getReporting_date() {
    return $this->reporting_date;
}

public function getAssessment() {
    return $this->assessment;
}

public function getPurpose() {
    return $this->purpose;
}

public function setReport_id($report_id) {
    $this->report_id = $report_id;
}

public function setPractitioner($practitioner) {
    $this->practitioner = $practitioner;
}

public function setVisitor($visitor) {
    $this->visitor = $visitor;
}

public function setReporting_date($reporting_date) {
    $this->reporting_date = $reporting_date;
}

public function setAssessment($assessment) {
    $this->assessment = $assessment;
}

public function setPurpose($purpose) {
    $this->purpose = $purpose;
}

}