<?php
namespace Smarti\Metakocka\Enum;

class PaymentType extends Enum
{
    const TRR = 'Transakcijski račun';
    const KARTICA_BA = 'Kartica BA';
    const PRENOS_PREPLACILA = 'Prenos preplačila';
    const GOTOVINA = 'Gotovica';
}