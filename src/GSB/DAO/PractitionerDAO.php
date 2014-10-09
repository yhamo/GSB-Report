<?php

namespace GSB\DAO;

use GSB\Domain\Practitioner;

class PractitionerDAO extends DAO
{
    /**
     * @var \GSB\DAO\FamilyDAO
     */
    private $practitionerTypeDAO;

    public function setPractitionerTypeDAO($practitionerTypeDAO) {
        $this->practitionerTypeDAO = $practitionerTypeDAO;
    }

    /**
     * Returns the list of all drugs, sorted by trade name.
     *
     * @return array The list of all drugs.
     */
    public function findAll() {
        $sql = "select * from practitioner order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $practitioner = array();
        foreach ($result as $row) {
            $practitionerId = $row['practitioner_id'];
            $practitioner[$practitionerId] = $this->buildDomainObject($row);
        }
        return $practitioner;
    }

    /**
     * Returns the list of all drugs for a given family, sorted by trade name.
     *
     * @param integer $familyDd The family id.
     *
     * @return array The list of drugs.
     */
    public function findAllByPractitionerType($practitionerTypeDAO) {
        $sql = "select * from practitioner where practitioner_type_id=? order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql, array($practitionerTypeDAO));
        
        // Convert query result to an array of domain objects
        $practitioner = array();
        foreach ($result as $row) {
            $practitionerId = $row['practitioner_id'];
            $practitioner[$practitionerId] = $this->buildDomainObject($row);
        }
        return $practitioner;
    }

    /**
     * Returns the drug matching a given id.
     *
     * @param integer $id The drug id.
     *
     * @return \GSB\Domain\Drug|throws an exception if no drug is found.
     */
    public function find($id) {
        $sql = "select * from practitioner where practitioner_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No practitioner found for id " . $id);
    }

    /**
     * Creates a Drug instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Drug
     */
    protected function buildDomainObject($row) {
        $practitionerId = $row['practitioner_type_id'];
        $family = $this->practitionerTypeDAO->find($practitionerId);

        $practitioner = new Practitioner();
        $practitioner->setId($row['practitioner_id']);
        $practitioner->setType_id($row['practitioner_type_id']);
        $practitioner->setName($row['practitioner_name']);
        $practitioner->setFirst_name($row['practitioner_first_name']);
        $practitioner->setAddress($row['practitioner_address']);
        $practitioner->setZip_code($row['practitioner_zip_code']);
        $practitioner->setCity($row['practitioner_city']);
        $practitioner->setCoefficient($row['notoriety_coefficient']);
        $practitioner->setType_id($family);
        return $practitioner;
    }
}