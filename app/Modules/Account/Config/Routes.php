<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('account', ['namespace' => 'App\Modules\Account\Controllers'], function($subroutes){

	/*** Route for account ***/
	$subroutes->add('coa', 'Account::index');
    $subroutes->add('load_treeform/(:num)', 'Account::selectedform/$1');
    $subroutes->add('new_form/(:num)', 'Account::newform/$1');
	$subroutes->add('add_coa', 'Account::insert_coa');
	$subroutes->add('opening_balance', 'Account::bdtask_004opening_balance_form');
	$subroutes->add('save_opening_balance', 'Account::bdtask_add_opening_balance');
	$subroutes->add('manufaturer_payment', 'Account::bdtask_manufacturer005_payment');
	$subroutes->add('manufacturer_code/(:num)', 'Account::manufacturer_headcode/$1');
	$subroutes->add('save_manufacturer_payment', 'Account::save_manufacturer_payment');
    $subroutes->add('customer_receive', 'Account::customer_receive');
    $subroutes->add('customer_code/(:num)', 'Account::customer_headcode/$1');
	$subroutes->add('save_customer_receive', 'Account::save_customer_receive');
	$subroutes->add('cash_adjustment', 'Account::bdtask_cash_adjustment');
	$subroutes->add('save_cash_adjustment', 'Account::save_cash_adjustment');
	$subroutes->add('debit_voucher', 'Account::bdtask_debit_voucher');
	$subroutes->add('debitvoucher_code/(:num)', 'Account::debtvouchercode/$1');
	$subroutes->add('save_debit_voucher', 'Account::save_debit_voucher');
	$subroutes->add('credit_voucher', 'Account::bdtask_credit_voucher');
    $subroutes->add('save_credit_voucher', 'Account::save_credit_voucher');
    $subroutes->add('contra_voucher', 'Account::bdtask_contra_voucher');
	$subroutes->add('save_contra_voucher', 'Account::bdtask_create_contra_voucher');
	$subroutes->add('journal_voucher', 'Account::bdtask_journal_voucher');
    $subroutes->add('save_journal_voucher', 'Account::bdtask_create_journal_voucher');
    $subroutes->add('voucher_list', 'Account::bdtask_voucher_list');
    $subroutes->add('check_voucherlist', 'Account::check_Voucherlist');
    $subroutes->add('is_approve/(:any)/(:any)', 'Account::isapprove/$1/$1');
    $subroutes->add('edit_voucher/(:any)', 'Account::voucher_update/$1');
    $subroutes->add('update_debit_voucher', 'Account::update_debit_voucher');
    $subroutes->add('update_journal_voucher', 'Account::bdtask_update_journal_voucher');
    $subroutes->add('update_credit_voucher', 'Account::update_credit_voucher');
    $subroutes->add('update_contra_voucher', 'Account::bdtask_update_contra_voucher');
    $subroutes->add('delete_voucher/(:any)', 'Account::voucher_delete/$1');
    $subroutes->add('cash_book', 'Account::bdtask_cash_book');
    $subroutes->add('bank_book', 'Account::bdtask_bank_book');
    $subroutes->add('general_ledger', 'Account::bdtask_general_ledger');
    $subroutes->add('ledger_head', 'Account::general_led');
    $subroutes->add('general_ledger_result', 'Account::accounts_report_search');
    $subroutes->add('inventory_ledger', 'Account::bdtask_inventory_ledger');
    $subroutes->add('trial_balance_form', 'Account::bdtask_trial_balance_form');
    $subroutes->add('trial_balance_result', 'Account::bdtask_trial_balance_report');
    $subroutes->add('profit_loss', 'Account::bdtask_profit_loss_report_form');
    $subroutes->add('profit_loss_result', 'Account::bdtask_profit_loss_report_search');
    $subroutes->add('cash_flow', 'Account::bdtask_cash_flow_form');
    $subroutes->add('cash_flow_result', 'Account::cash_flow_report_search');
    $subroutes->add('coa_print', 'Account::bdtask_coa_print');
    $subroutes->add('balance_sheet', 'Account::bdtask_balance_sheet');
  
});

