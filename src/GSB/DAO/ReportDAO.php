<?php

namespace GSB\DAO;

use GSB\Domain\Report;

class ReportDAO extends DAO {
    protected $practitionerDAO;
    
    public function getPractitionerDAO() {
        return $this->practitionerDAO;
    }

    public function setPractitionerDAO($practitionerDAO) {
        $this->practitionerDAO = $practitionerDAO;
    }

    
        public function findAll() {
        $sql = "select * from visit_report order by report_id";
        $result = $this->getDb()->fetchAll($sql);

        // Converts query result to an array of domain objects
        $drugs = array();
        foreach ($result as $row) {
            $drugId = $row['report_id'];
            $drugs[$drugId] = $this->buildDomainObject($row);
        }
        return $drugs;
    }

    public function find($id) {
        $sql = "select * from visit_report where report_id =?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No report found for id " . $id);
    }

    /**
     * Creates a Drug instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Drug
     */
    protected function buildDomainObject($row) {
        $typeId = $row['practitioner_id'];
        $type = $this->practitionerDAO->find($typeId);
        $report = new Report();
        $report->setReport_id($row['report_id']);
        $report->setPractitioner($type);
        $report->setVisitor($row['visitor_id']);
        $report->setReporting_date($row['reporting_date']);
        $report->setAssessment($row['assessment']);
        $report->setPurpose($row['purpose']);
        
        return $report;
    }

    /**
     * Saves a report into the database.
     *
     * @param \GSB\Domain\Report $report The report to save
     */
    public function save($report) {
        $hiringDateString = $report->getHiringDate()->format('Y-m-d');
        $visitorData = array(
            'report_id' => $report->getReport_id(),
            'practitioner' => $report->getPractitioner(),
            'visitor' => $report->getVisitor(),
            'reporting_date' => $report->getReporting_date(),
            'assessment' => $report->getAssessment(),
            'purpose' => $report->getPurpose(),
        );
        // The visitor has never been saved : insert it
        $this->getDb()->insert('visit_report', $visitorData);
        // Get the id of the newly created visitor and set it on the entity.
        $id = $this->getDb()->lastInsertId();
        $report->setId($id);
    }

}
