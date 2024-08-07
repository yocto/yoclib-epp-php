<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPDataCollectionPolicyElement extends EPPElement{

    public function getAccess(): ?EPPAccessElement;

    /**
     * @return array|EPPStatementElement[]
     */
    public function getStatement(): array;

    public function getExpiry(): ?EPPExpiryElement;

}