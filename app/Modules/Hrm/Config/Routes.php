<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('employee', ['namespace' => 'App\Modules\Hrm\Controllers'], function($subroutes){

	 /***  Employee part ***/
	$subroutes->add('add_employee', 'Employee::bdtask_0001_employee_form');
	$subroutes->add('add_employee/(:num)', 'Employee::bdtask_0001_employee_form/$1');
	$subroutes->add('employee_list', 'Employee::index');
	 	$subroutes->add('employee_checkdata', 'Employee::bdtask_CheckemployeeList');
	$subroutes->add('edit_employee/(:any)', 'Employee::bdtask_0001_employee_form/$1');
	$subroutes->add('delete_employee/(:any)', 'Employee::delete_employee/$1');

    $subroutes->add('add_designation', 'Employee::bdtask_0002_designation_form');
    $subroutes->add('add_designation/(:num)', 'Employee::bdtask_0002_designation_form/$1');
    $subroutes->add('edit_designation/(:num)', 'Employee::bdtask_0002_designation_form/$1');
	$subroutes->add('designation_list', 'Employee::designation_list');




});

$routes->group('attendance', ['namespace' => 'App\Modules\Hrm\Controllers'], function($subroutes){

  		 /***  Attendance part ***/
	$subroutes->add('add_attendance', 'Attendance::bdtask_0001_attendance_form');
	$subroutes->add('add_attendance/(:num)', 'Attendance::bdtask_0001_attendance_form/$1');
	$subroutes->add('attendance_list', 'Attendance::index');
	$subroutes->add('attendance_checkdata', 'Attendance::bdtask_CheckattendanceList');
	$subroutes->add('edit_attendance/(:num)', 'Attendance::bdtask_0001_attendance_form/$1');
	$subroutes->add('delete_attendance/(:num)', 'Attendance::delete_attendance/$1');
    $subroutes->add('sign_out', 'Attendance::bdtask_signout');
	$subroutes->add('datewise_attendance_report', 'Attendance::report');
	
});

$routes->group('payroll', ['namespace' => 'App\Modules\Hrm\Controllers'], function($subroutes){

  		 /***  Payroll part ***/
	$subroutes->add('add_benefits', 'Payroll::bdtask_0001_benefits_form');
	$subroutes->add('add_benefits/(:num)', 'Payroll::bdtask_0001_benefits_form/$1');
	$subroutes->add('benefit_list', 'Payroll::index/$1');

	$subroutes->add('edit_benefit/(:num)', 'Payroll::bdtask_0001_benefits_form/$1');
	$subroutes->add('delete_benefit/(:num)', 'Payroll::delete_benefit/$1');
	$subroutes->add('add_salarysetup', 'Payroll::bdtask_0002_salarysetup_form');
    $subroutes->add('employee_basic_info', 'Payroll::employeebasic');
    $subroutes->add('tax_handle', 'Payroll::salarywithtax');
    $subroutes->add('save_salarysetup', 'Payroll::salary_setup_entry');
    $subroutes->add('salary_setup_list', 'Payroll::bdtask_0005_salarysetup_list');
    $subroutes->add('salary_setupdata', 'Payroll::bdtask_salarysetup_listdata');
    $subroutes->add('edit_salary_setup/(:num)', 'Payroll::salsetup_upform/$1');
    $subroutes->add('salary_setup_update', 'Payroll::salary_setup_update');
    $subroutes->add('delete_salsetup/(:num)', 'Payroll::delete_salsetup/$1');
    $subroutes->add('salary_generate', 'Payroll::bdtask_006_salary_generate');
    $subroutes->add('create_salary_sheet', 'Payroll::create_salary_generate');
    $subroutes->add('salary_sheet', 'Payroll::bdtask_0008_salar_sheet');
    $subroutes->add('get_salary_sheet', 'Payroll::bdtask_getSalarygenerate_list');
    $subroutes->add('delete_salaryshett/(:num)', 'Payroll::delete_salgenerate/$1');
    $subroutes->add('salary_payment', 'Payroll::bdtask_0009_salary_payment');
    $subroutes->add('get_salary_paymentlist', 'Payroll::bdtask_getSalarypayment_list');
    $subroutes->add('employee_paydata', 'Payroll::employee_paydata');
    $subroutes->add('pay_confirm', 'Payroll::payconfirm');
    $subroutes->add('payslip/(:num)', 'Payroll::payslip/$1');

});


$routes->group('expense', ['namespace' => 'App\Modules\Hrm\Controllers'], function($subroutes){

  		 /***  Expense part ***/
	$subroutes->add('add_expense_item', 'Expense::bdtask_0001_expenseitem_form');
	$subroutes->add('add_expense_item/(:num)', 'Expense::bdtask_0001_expenseitem_form/$1');
	$subroutes->add('edit_expense_item/(:num)', 'Expense::bdtask_0001_expenseitem_form/$1');
	$subroutes->add('expense_item_list', 'Expense::index');
	$subroutes->add('delete_expense_item/(:num)', 'Expense::delete_expense_item/$1');
	$subroutes->add('add_expense', 'Expense::bdtask_add_expense');
    $subroutes->add('save_expense', 'Expense::bdtask_create_expense');
	$subroutes->add('check_expensedata', 'Expense::bdtask_CheckexpenseList');
    $subroutes->add('expense_list', 'Expense::expense_list');
    $subroutes->add('delete_expense/(:num)', 'Expense::delete_expense/$1');
    $subroutes->add('expense_statement', 'Expense::bdtask_expense_statement');
    
});


$routes->group('loan', ['namespace' => 'App\Modules\Hrm\Controllers'], function($subroutes){

  		 /***   Loan part ***/
	$subroutes->add('add_person', 'Personal_loan::bdtask_0001_person_form');
	$subroutes->add('add_person/(:num)', 'Personal_loan::bdtask_0001_person_form/$1');
	$subroutes->add('personal_loan_checkperson', 'Personal_loan::bdtask_CheckpersonList');
	$subroutes->add('person_list', 'Personal_loan::index');
    $subroutes->add('edit_person/(:num)', 'Personal_loan::bdtask_0001_person_form/$1');
	$subroutes->add('delete_person/(:num)', 'Personal_loan::delete_person/$1');
	$subroutes->add('add_loan', 'Personal_loan::bdtask_0002_add_loan');
    $subroutes->add('save_loan', 'Personal_loan::bdtask_m_005_loanpayment');
    $subroutes->add('loan_list', 'Personal_loan::bdtask_m_006_paymentlist');
    $subroutes->add('check_loanpaymentList', 'Personal_loan::bdtask_CheckpaymentList');
    $subroutes->add('delete_loan/(:num)', 'Personal_loan::delete_loan/$1');
    $subroutes->add('person_ledger', 'Personal_loan::person_ledger');
    $subroutes->add('checkperson_ledger', 'Personal_loan::bdtask_CheckpersonLedger');
    $subroutes->add('add_payment', 'Personal_loan::bdtask_m_006_payment');
    
});
