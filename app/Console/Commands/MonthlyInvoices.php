<?php

namespace App\Console\Commands;

use App\Models\Contract;
use App\Models\Invoice;
use App\Models\Property;
use App\Models\Tenant;

use Illuminate\Console\Command;

class MonthlyInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:invoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Invoices every Month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $contracts = Contract::all();

        foreach ($contracts as $contract) {
            # code...
            Invoice::create([
                'number' => rand(999,99999),
                'date' => date('Y-m-d'),
                'payment_date' => date('Y-m-d'),
                'rent_type' => 'monthly',
                'amount' => $contract->rent_amount,
                'property_id' => $contract->property->id,
                'tenant_id' => $contract->tenant->id,
                'contract_id' => null,

            ]);

        }
        $this->info('Invoice Generated Successfully');
    }
}
