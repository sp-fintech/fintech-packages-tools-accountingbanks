<?php

namespace Apps\Fintech\Packages\Accounting\Banks\Model;

use System\Base\BaseModel;

class AppsFintechAccountingBanks extends BaseModel
{
    public $id;

    public $name;

    public $state_id;

    public $description;

    public $turn_around_time;
}