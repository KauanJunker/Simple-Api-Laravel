<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class InvoicesFilter extends ApiFilter {

    protected $safeParms = [
      "customer_id" => ["eq"],
      "amount" => ["eq", "lt", "gt", "lte", "gte"],
      "status" => ["eq", "ne"],
      "billedDate" => ["eq", "lt", "gt", "lte", "gte"],
      "paidDate" => ["eq", "lt", "gt", "lte", "gte"],
    ];

    protected $columnMap = [
      "postalCode" => "postal_code",
      "billedDate" => "billed_date",
      "paidDate" => "paid_date"
    ];

    protected $operatorMap = [
      "eq" => "=",
      "lt" => "<",
      "lte" => "<=",
      "gt" => ">",
      "gte" => ">=",
      "ne" => "!=",
    ];

}