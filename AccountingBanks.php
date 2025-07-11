<?php

namespace Apps\Fintech\Packages\Accounting\Banks;

use Apps\Fintech\Packages\Accounting\Banks\Model\AppsFintechAccountingBanks;
use System\Base\BasePackage;

class AccountingBanks extends BasePackage
{
    protected $modelToUse = AppsFintechAccountingBanks::class;

    protected $packageName = 'accountingbanks';

    public $accountingbanks;

    public function getAccountingBanksById($id)
    {
        $bank = $this->getById($id);

        if ($bank) {
            $this->addResponse('Success', 0, ['bank' => $bank]);

            return;
        }

        $this->addResponse('Error', 1);
    }

    public function addAccountingBanks($data)
    {
        if ($this->add($data)) {
            $this->addResponse('Bank added successfully');

            return true;
        }

        $this->addResponse('Error adding bank', 1);

        return false;
    }

    public function updateAccountingBanks($data)
    {
        $bank = $this->getById($data['id']);

        if (!$bank) {
            $this->addResponse('Bank not found', 1);

            return false;
        }

        $bank = array_replace($bank, $data);

        if ($this->update($bank)) {
            $this->addResponse('Bank added successfully');

            return true;
        }

        $this->addResponse('Error adding bank', 1);

        return false;
    }

    public function removeAccountingBanks($id)
    {
        $bank = $this->getById($id);

        if (!$bank) {
            $this->addResponse('Bank not found', 1);

            return false;
        }

        if ($this->remove($bank['id'])) {
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error removing Bank', 1);
    }
}