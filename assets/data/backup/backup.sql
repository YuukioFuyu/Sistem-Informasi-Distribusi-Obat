#
# TABLE STRUCTURE FOR: acc_coa
#

DROP TABLE IF EXISTS `acc_coa`;

CREATE TABLE `acc_coa` (
  `HeadCode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PHeadName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadLevel` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsTransaction` tinyint(1) NOT NULL,
  `IsGL` tinyint(1) NOT NULL,
  `HeadType` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `IsBudget` tinyint(1) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `IsDepreciation` tinyint(1) NOT NULL,
  `DepreciationRate` decimal(18,2) NOT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`HeadName`),
  KEY `customer_id` (`customer_id`),
  KEY `manufacturer_id` (`manufacturer_id`),
  KEY `HeadCode` (`HeadCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040001', '1-Moon Mondol', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-09 01:26:55', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000001', '1-Walking Customer', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-07 04:33:34', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502000007', '10-Aristropharma ', 'Account Payable', 3, 1, 1, 0, 'L', 0, NULL, 10, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-09 03:29:37', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502000008', '11-ES+F', 'Account Payable', 3, 1, 1, 0, 'L', 0, NULL, 11, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-09 03:34:34', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502000009', '13-Healthcare ', 'Account Payable', 3, 1, 1, 0, 'L', 0, NULL, 13, NULL, NULL, NULL, 0, '0.00', '16', '2021-01-10 04:08:39', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502000010', '14-test', 'Account Payable', 3, 1, 1, 0, 'L', 0, NULL, 14, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-25 02:03:47', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000002', '2-Herry ', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 2, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-08 23:18:23', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040002', '2-JamalHossen', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-09 01:30:06', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502000001', '3-Beximco', 'Account Payable', 3, 1, 1, 0, 'L', 0, NULL, 3, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-08 23:28:26', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040003', '3-KamalPasha', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-09 01:31:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000003', '3-Mahi Islam', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 3, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-08 23:19:18', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000004', '4-Sabbir Hossain', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 4, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-09 02:44:53', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000005', '5-korai ', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 5, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-09 03:25:58', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502000002', '5-Square ', 'Account Payable', 3, 1, 1, 0, 'L', 0, NULL, 5, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-08 23:30:49', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000006', '6-Ahmed', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 6, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-09 03:26:51', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502000003', '6-opsonin', 'Account Payable', 3, 1, 1, 0, 'L', 0, NULL, 6, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-08 23:31:20', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502000004', '7-Reneta', 'Account Payable', 3, 1, 1, 0, 'L', 0, NULL, 7, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-09 00:05:49', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000007', '7-Sunny ', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 7, NULL, NULL, NULL, NULL, 0, '0.00', '16', '2021-01-10 04:05:22', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502000005', '8-Mostaq Ahamed', 'Account Payable', 3, 1, 1, 0, 'L', 0, NULL, 8, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-09 00:33:02', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502000006', '9-Incepta ', 'Account Payable', 3, 1, 1, 0, 'L', 0, NULL, 9, NULL, NULL, NULL, 0, '0.00', '1', '2021-01-09 03:28:33', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50202', 'Account Payable', 'Current Liabilities', 2, 1, 0, 1, 'L', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', 'admin', '2015-10-15 19:50:43', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10203', 'Account Receivable', 'Current Asset', 2, 1, 0, 0, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '', '2019-08-10 11:01:12', 'admin', '2013-09-18 15:29:35');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1', 'Asset', 'COA', 0, 1, 1, 1, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2020-12-01 00:37:22', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010200003', 'Bangla bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, NULL, NULL, 3, NULL, NULL, 0, '0.00', '1', '2021-01-10 00:41:40', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('101080004', 'Blood Pressure measurement-1', 'Service Receive', 3, 1, 1, 0, 'A', 1, NULL, NULL, NULL, NULL, 1, 1, '1.00', '1', '2021-01-03 04:41:00', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('101080002', 'Blood Test-3', 'Service Receive', 3, 1, 1, 0, 'A', 1, NULL, NULL, NULL, NULL, 3, 1, '1.00', '1', '2020-12-19 03:29:49', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10201', 'Cash & Cash Equivalent', 'Current Asset', 2, 1, 0, 1, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-06-12 11:47:24', 'admin', '2015-10-15 15:57:55');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020102', 'Cash At Bank', 'Cash & Cash Equivalent', 3, 1, 0, 1, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-03-18 06:08:18', 'admin', '2015-10-15 15:32:42');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020101', 'Cash In Hand', 'Cash & Cash Equivalent', 3, 1, 1, 0, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-01-26 07:38:48', 'admin', '2016-05-23 12:05:43');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102', 'Current Asset', 'Asset', 1, 1, 1, 1, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2020-12-15 00:14:54', 'admin', '2018-07-07 11:23:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502', 'Current Liabilities', 'Liabilities', 1, 1, 0, 0, 'L', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', 'anwarul', '2014-08-30 13:18:20', 'admin', '2015-10-15 19:49:21');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020301', 'Customer Receivable', 'Account Receivable', 3, 1, 0, 1, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-01-24 12:10:05', 'admin', '2018-07-07 12:31:42');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('101080003', 'D test-5', 'Service Receive', 3, 1, 1, 0, 'A', 1, NULL, NULL, NULL, NULL, 5, 1, '1.00', '1', '2020-12-20 23:16:09', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010200002', 'Dhaka Bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, NULL, NULL, 2, NULL, NULL, 0, '0.00', '1', '2021-01-09 03:13:15', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50204', 'Employee Ledger', 'Current Liabilities', 2, 1, 0, 1, 'L', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-04-08 10:36:32', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('404', 'Employee Salary', 'Expence', 1, 1, 1, 0, 'E', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-05-23 05:46:14', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('2', 'Equity', 'COA', 0, 1, 0, 0, 'L', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '', '2019-08-10 11:01:12', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4', 'Expence', 'COA', 0, 1, 1, 0, 'E', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-06-18 11:40:41', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('405', 'Fixed Assets Cost', 'Expence', 1, 1, 1, 0, 'E', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-05-29 05:32:01', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4000002', 'Gas Bill', 'Expence', 1, 1, 1, 0, 'E', 1, NULL, NULL, NULL, NULL, NULL, 1, '1.00', '1', '2021-01-09 03:03:05', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('101080005', 'Home Delivery-1', 'Service Receive', 3, 1, 1, 0, 'A', 1, NULL, NULL, NULL, NULL, 1, 1, '1.00', '1', '2021-01-09 03:17:35', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('3', 'Income', 'COA', 0, 1, 0, 0, 'I', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-05-20 05:32:59', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10107', 'Inventory', 'Non Current Assets', 1, 1, 0, 0, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '2', '2018-07-07 15:21:58', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5', 'Liabilities', 'COA', 0, 1, 0, 0, 'L', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', 'admin', '2013-07-04 12:32:07', 'admin', '2015-10-15 19:46:54');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020302', 'Loan Receivable', 'Account Receivable', 3, 1, 0, 1, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-01-26 07:37:20', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030200001', 'Minu-1', 'Loan Receivable', 4, 1, 1, 0, 'A', 0, NULL, NULL, NULL, 1, NULL, 0, '0.00', '1', '2021-01-09 02:50:48', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4000001', 'Mobile bill', 'Expence', 1, 1, 1, 0, 'E', 1, NULL, NULL, NULL, NULL, NULL, 1, '1.00', '1', '2021-01-09 02:44:53', NULL, NULL);
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('101', 'Non Current Assets', 'Asset', 1, 1, 0, 0, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '', '2019-08-10 11:01:12', 'admin', '2015-10-15 15:29:11');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('501', 'Non Current Liabilities', 'Liabilities', 1, 1, 0, 0, 'L', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', 'anwarul', '2014-08-30 13:18:20', 'admin', '2015-10-15 19:49:21');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('101080001', 'Pressure Mesurement-2', 'Service Receive', 3, 1, 1, 0, 'A', 1, NULL, NULL, NULL, NULL, 2, 1, '1.00', '1', '2020-12-19 02:35:59', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('402', 'Product Purchase', 'Expence', 1, 1, 1, 0, 'E', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-05-20 07:46:59', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('304', 'Product Sale', 'Income', 1, 1, 1, 0, 'I', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-06-16 12:15:40', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('305', 'Service Income', 'Income', 1, 1, 1, 0, 'I', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-05-22 13:36:02', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020303', 'Service Receive', 'Account Receivable', 3, 1, 1, 1, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2020-12-19 03:31:45', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('301', 'Store Income', 'Income', 1, 1, 0, 0, 'I', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '2', '2018-07-07 13:40:37', 'admin', '2015-09-17 17:00:02');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50205', 'Supplier Ledger', 'Current Liabilities', 2, 1, 0, 1, 'L', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2019-10-06 06:18:49', '', '2019-08-10 11:01:12');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('103', 'Tassets', 'Asset', 1, 1, 1, 1, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', '2020-12-01 00:37:43', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50206', 'Tax', 'Current Liabilities', 2, 1, 1, 1, 'L', 0, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '10', '2020-12-20 02:41:04', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `customer_id`, `manufacturer_id`, `bank_id`, `person_id`, `service_id`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010200001', 'UCB', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, NULL, NULL, 1, NULL, NULL, 0, '0.00', '1', '2021-01-09 01:38:58', '', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: acc_transaction
#

DROP TABLE IF EXISTS `acc_transaction`;

CREATE TABLE `acc_transaction` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `VNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vtype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VDate` date DEFAULT NULL,
  `COAID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Narration` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Debit` decimal(18,2) DEFAULT NULL,
  `Credit` decimal(18,2) DEFAULT NULL,
  `IsPosted` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `IsAppove` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_opening` int(11) NOT NULL DEFAULT 0,
  UNIQUE KEY `ID` (`ID`),
  KEY `COAID` (`COAID`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (1, '20210108111918', 'PR Balance', '2021-01-08', '102030000003', 'Customer debit For Mahi Islam', '100.00', '0.00', '1', '1', '2021-01-08 23:19:18', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (2, '20210108111918', 'PR Balance', '2021-01-08', '10107', 'Inventory credit For Old sale ForMahi Islam', '0.00', '100.00', '1', '1', '2021-01-08 23:19:18', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (3, '373042057346', 'Purchase', '2021-01-09', '10107', 'Inventory Debit For Manufacturer Beximco', '4000.00', '0.00', '1', '1', '2021-01-09 02:19:46', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (4, '373042057346', 'Purchase', '2021-01-09', '502000001', 'Manufacturer .Beximco', '0.00', '4000.00', '1', '1', '2021-01-09 02:19:46', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (5, '373042057346', 'Purchase', '2021-01-09', '502000001', 'Manufacturer .Beximco', '4000.00', '0.00', '1', '1', '2021-01-09 02:19:46', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (6, '373042057346', 'Purchase', '2021-01-09', '1020101', 'Cash in Hand For Manufacturer Beximco', '0.00', '4000.00', '1', '1', '2021-01-09 02:19:46', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (7, '179292746033', 'Purchase', '2021-01-09', '10107', 'Inventory Debit For Manufacturer opsonin', '8000.00', '0.00', '1', '1', '2021-01-09 02:20:33', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (8, '179292746033', 'Purchase', '2021-01-09', '502000003', 'Manufacturer .opsonin', '0.00', '8000.00', '1', '1', '2021-01-09 02:20:33', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (9, '179292746033', 'Purchase', '2021-01-09', '502000003', 'Manufacturer .opsonin', '5000.00', '0.00', '1', '1', '2021-01-09 02:20:33', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (10, '179292746033', 'Purchase', '2021-01-09', '1020101', 'Cash in Hand For Manufacturer opsonin', '0.00', '5000.00', '1', '1', '2021-01-09 02:20:33', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (11, '20210109024603', 'Expense', '2021-01-09', '4000001', 'Mobile bill Expense 20210109024603', '500.00', '0.00', '1', '1', '2021-01-09 02:46:03', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (12, '20210109024603', 'Expense', '2021-01-09', '1020101', 'Mobile bill Expense20210109024603', '0.00', '500.00', '1', '1', '2021-01-09 02:46:03', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (13, '20210109030141', 'Loan Payment', '2021-01-09', '102030200001', '', '0.00', '50000.00', '1', '1', '2021-01-09 03:01:41', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (14, '20210109030141', 'Loan Payment', '2021-01-09', '1020101', '', '50000.00', '0.00', '1', '1', '2021-01-09 03:01:41', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (15, '20210109030324', 'Expense', '2021-01-09', '4000002', 'Gas Bill Expense 20210109030324', '1000.00', '0.00', '1', '1', '2021-01-09 03:03:24', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (16, '20210109030324', 'Expense', '2021-01-09', '1020101', 'Gas Bill Expense20210109030324', '0.00', '1000.00', '1', '1', '2021-01-09 03:03:24', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (17, '507126107355', 'Purchase', '2021-01-09', '10107', 'Inventory Debit For Manufacturer Beximco', '20000.00', '0.00', '1', '1', '2021-01-09 03:30:55', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (18, '507126107355', 'Purchase', '2021-01-09', '502000001', 'Manufacturer .Beximco', '0.00', '20000.00', '1', '1', '2021-01-09 03:30:55', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (19, '507126107355', 'Purchase', '2021-01-09', '502000001', 'Manufacturer .Beximco', '20000.00', '0.00', '1', '1', '2021-01-09 03:30:55', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (20, '507126107355', 'Purchase', '2021-01-09', '1020101', 'Cash in Hand For Manufacturer Beximco', '0.00', '20000.00', '1', '1', '2021-01-09 03:30:55', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (21, '20210109033434', 'PR Balance', '2021-01-09', '502000008', 'manufacturer debit For ES+F', '0.00', '500.00', '1', '1', '2021-01-09 03:34:34', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (22, '20210109033434', 'PR Balance', '2021-01-09', '10107', 'Inventory Debit For Old sale ForES+F', '500.00', '0.00', '1', '1', '2021-01-09 03:34:34', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (23, '939680430550', 'Purchase', '2021-01-09', '10107', 'Inventory Debit For Manufacturer opsonin', '400.00', '0.00', '1', '1', '2021-01-09 03:40:50', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (24, '939680430550', 'Purchase', '2021-01-09', '502000003', 'Manufacturer .opsonin', '0.00', '400.00', '1', '1', '2021-01-09 03:40:50', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (25, '939680430550', 'Purchase', '2021-01-09', '502000003', 'Manufacturer .opsonin', '400.00', '0.00', '1', '1', '2021-01-09 03:40:50', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (26, '939680430550', 'Purchase', '2021-01-09', '1020101', 'Cash in Hand For Manufacturer opsonin', '0.00', '400.00', '1', '1', '2021-01-09 03:40:50', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (27, '77021299048', 'Purchase', '2021-01-09', '10107', 'Inventory Debit For Manufacturer Incepta ', '489.00', '0.00', '1', '1', '2021-01-09 04:01:48', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (28, '77021299048', 'Purchase', '2021-01-09', '502000006', 'Manufacturer .Incepta ', '0.00', '489.00', '1', '1', '2021-01-09 04:01:48', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (29, '77021299048', 'Purchase', '2021-01-09', '502000006', 'Manufacturer .Incepta ', '489.00', '0.00', '1', '1', '2021-01-09 04:01:48', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (30, '77021299048', 'Purchase', '2021-01-09', '1020101', 'Cash in Hand For Manufacturer Incepta ', '0.00', '489.00', '1', '1', '2021-01-09 04:01:48', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (31, '496127908628', 'Invoice', '2021-01-09', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '3200.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (32, '496127908628', 'Invoice', '2021-01-09', '102030000001', 'Customer debit for  .Walking Customer', '158.40', '0.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (33, '496127908628', 'INVOICE', '2021-01-09', '304', 'Customer debit For Invoice No496127908628', '0.00', '158.40', '1', '1', '2021-01-09 04:06:28', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (34, '653833150139', 'Purchase', '2021-01-09', '10107', 'Inventory Debit For Manufacturer Incepta ', '40000.00', '0.00', '1', '1', '2021-01-09 04:09:39', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (35, '653833150139', 'Purchase', '2021-01-09', '502000006', 'Manufacturer .Incepta ', '0.00', '40000.00', '1', '1', '2021-01-09 04:09:39', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (36, '653833150139', 'Purchase', '2021-01-09', '502000006', 'Manufacturer .Incepta ', '40000.00', '0.00', '1', '1', '2021-01-09 04:09:39', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (37, '653833150139', 'Purchase', '2021-01-09', '1020101', 'Cash in Hand For Manufacturer Incepta ', '0.00', '40000.00', '1', '1', '2021-01-09 04:09:39', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (38, '289075090432', 'Purchase', '2021-01-09', '10107', 'Inventory Debit For Manufacturer Incepta ', '40000.00', '0.00', '1', '1', '2021-01-09 04:12:32', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (39, '289075090432', 'Purchase', '2021-01-09', '502000006', 'Manufacturer .Incepta ', '0.00', '40000.00', '1', '1', '2021-01-09 04:12:32', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (40, '289075090432', 'Purchase', '2021-01-09', '502000006', 'Manufacturer .Incepta ', '40000.00', '0.00', '1', '1', '2021-01-09 04:12:32', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (41, '289075090432', 'Purchase', '2021-01-09', '1020101', 'Cash in Hand For Manufacturer Incepta ', '0.00', '40000.00', '1', '1', '2021-01-09 04:12:32', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (42, '623644934653', 'Purchase', '2021-01-09', '10107', 'Inventory Debit For Manufacturer Beximco', '48000.00', '0.00', '1', '1', '2021-01-09 04:16:53', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (43, '623644934653', 'Purchase', '2021-01-09', '502000001', 'Manufacturer .Beximco', '0.00', '48000.00', '1', '1', '2021-01-09 04:16:53', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (44, '623644934653', 'Purchase', '2021-01-09', '502000001', 'Manufacturer .Beximco', '48000.00', '0.00', '1', '1', '2021-01-09 04:16:53', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (45, '623644934653', 'Purchase', '2021-01-09', '1020101', 'Cash in Hand For Manufacturer Beximco', '0.00', '48000.00', '1', '1', '2021-01-09 04:16:53', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (46, '32637812204', 'Purchase', '2021-01-09', '10107', 'Inventory Debit For Manufacturer Beximco', '48000.00', '0.00', '1', '1', '2021-01-09 04:18:04', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (47, '32637812204', 'Purchase', '2021-01-09', '502000001', 'Manufacturer .Beximco', '0.00', '48000.00', '1', '1', '2021-01-09 04:18:04', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (48, '32637812204', 'Purchase', '2021-01-09', '502000001', 'Manufacturer .Beximco', '40000.00', '0.00', '1', '1', '2021-01-09 04:18:04', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (49, '32637812204', 'Purchase', '2021-01-09', '1020101', 'Cash in Hand For Manufacturer Beximco', '0.00', '40000.00', '1', '1', '2021-01-09 04:18:04', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (50, '360003712428', 'Purchase', '2021-01-09', '10107', 'Inventory Debit For Manufacturer Incepta ', '60000.00', '0.00', '1', '1', '2021-01-09 04:29:28', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (51, '360003712428', 'Purchase', '2021-01-09', '502000006', 'Manufacturer .Incepta ', '0.00', '60000.00', '1', '1', '2021-01-09 04:29:28', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (52, '360003712428', 'Purchase', '2021-01-09', '502000006', 'Manufacturer .Incepta ', '60000.00', '0.00', '1', '1', '2021-01-09 04:29:28', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (53, '360003712428', 'Purchase', '2021-01-09', '1020101', 'Cash in Hand For Manufacturer Incepta ', '0.00', '60000.00', '1', '1', '2021-01-09 04:29:28', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (54, '206711685026', 'Purchase', '2021-01-09', '10107', 'Inventory Debit For Manufacturer opsonin', '90000.00', '0.00', '1', '1', '2021-01-09 04:41:26', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (55, '206711685026', 'Purchase', '2021-01-09', '502000003', 'Manufacturer .opsonin', '0.00', '90000.00', '1', '1', '2021-01-09 04:41:26', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (56, '206711685026', 'Purchase', '2021-01-09', '502000003', 'Manufacturer .opsonin', '90000.00', '0.00', '1', '1', '2021-01-09 04:41:26', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (57, '206711685026', 'Purchase', '2021-01-09', '1020101', 'Cash in Hand For Manufacturer opsonin', '0.00', '90000.00', '1', '1', '2021-01-09 04:41:26', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (58, '20210109045358', 'SERVICE', '2021-01-09', '102030000002', 'sdfas', '60.00', '0.00', '1', '1', '2021-01-09 04:53:58', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (59, '20210109045358', 'SERVICE', '2021-01-09', '305', 'sdfas', '0.00', '60.00', '1', '1', '2021-01-09 04:53:58', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (60, '20210109045358', 'SERVICE', '2021-01-09', '102030000002', 'sdfas', '0.00', '60.00', '1', '1', '2021-01-09 04:53:58', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (61, '20210109045358', 'SERVICE', '2021-01-09', '1020101', 'sdfas', '60.00', '0.00', '1', '1', '2021-01-09 04:53:58', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (62, '493177650322', 'Invoice', '2021-01-09', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '1200.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (63, '493177650322', 'Invoice', '2021-01-09', '102030000001', 'Customer debit for  .Walking Customer', '100.67', '0.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (64, '493177650322', 'INVOICE', '2021-01-09', '304', 'Customer debit For Invoice No493177650322', '0.00', '100.67', '1', '1', '2021-01-09 04:55:22', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (65, '493177650322', 'Invoice', '2021-01-09', '102030000001', 'Customer .Walking Customer', '0.00', '100.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (66, '493177650322', 'Invoice', '2021-01-09', '1020101', 'Cash in Hand For Sale to Walking Customer', '100.00', '0.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (67, '20210109045625', 'SERVICE', '2021-01-09', '102030000006', '', '60.00', '0.00', '1', '1', '2021-01-09 04:56:25', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (68, '20210109045625', 'SERVICE', '2021-01-09', '305', '', '0.00', '60.00', '1', '1', '2021-01-09 04:56:25', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (69, '20210109045625', 'SERVICE', '2021-01-09', '102030000006', '', '0.00', '60.00', '1', '1', '2021-01-09 04:56:25', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (70, '20210109045625', 'SERVICE', '2021-01-09', '1020101', '', '60.00', '0.00', '1', '1', '2021-01-09 04:56:25', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (71, '20210109045756', 'SERVICE', '2021-01-09', '102030000003', 'sdfasd', '60.00', '0.00', '1', '1', '2021-01-09 04:57:56', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (72, '20210109045756', 'SERVICE', '2021-01-09', '305', 'sdfasd', '0.00', '60.00', '1', '1', '2021-01-09 04:57:56', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (73, '20210109045756', 'SERVICE', '2021-01-09', '102030000003', 'sdfasd', '0.00', '160.00', '1', '1', '2021-01-09 04:57:56', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (74, '20210109045756', 'SERVICE', '2021-01-09', '1020101', 'sdfasd', '160.00', '0.00', '1', '1', '2021-01-09 04:57:56', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (75, '20210109045756', 'service', '2021-01-09', '101080004', 'sdfasd', '60.00', '0.00', '1', '1', '2021-01-09 04:57:56', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (76, '20210109050023', 'SERVICE', '2021-01-09', '102030000003', '', '120.00', '0.00', '1', '1', '2021-01-09 05:00:23', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (77, '20210109050023', 'SERVICE', '2021-01-09', '305', '', '0.00', '120.00', '1', '1', '2021-01-09 05:00:23', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (78, '20210109050023', 'SERVICE', '2021-01-09', '102030000003', '', '0.00', '120.00', '1', '1', '2021-01-09 05:00:23', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (79, '20210109050023', 'SERVICE', '2021-01-09', '1020101', '', '120.00', '0.00', '1', '1', '2021-01-09 05:00:23', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (80, '20210109050023', 'service', '2021-01-09', '101080004', 'Service Invoice', '120.00', '0.00', '1', '1', '2021-01-09 05:00:23', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (81, '321239064259', 'Invoice', '2021-01-09', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '5600.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (82, '321239064259', 'Invoice', '2021-01-09', '102030000001', 'Customer debit for  .Walking Customer', '423.12', '0.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (83, '321239064259', 'INVOICE', '2021-01-09', '304', 'Customer debit For Invoice No321239064259', '0.00', '423.12', '1', '1', '2021-01-09 05:13:59', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (84, '321239064259', 'Invoice', '2021-01-09', '102030000001', 'Customer .Walking Customer', '0.00', '423.12', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (85, '321239064259', 'Invoice', '2021-01-09', '1020101', 'Cash in Hand For Sale to Walking Customer', '423.12', '0.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (86, '172803154725', 'Purchase', '2021-01-10', '10107', 'Inventory Debit For Manufacturer Aristropharma ', '999.00', '0.00', '1', '1', '2021-01-09 23:25:25', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (87, '172803154725', 'Purchase', '2021-01-10', '502000007', 'Manufacturer .Aristropharma ', '0.00', '999.00', '1', '1', '2021-01-09 23:25:25', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (88, '172803154725', 'Purchase', '2021-01-10', '502000007', 'Manufacturer .Aristropharma ', '999.00', '0.00', '1', '1', '2021-01-09 23:25:25', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (89, '172803154725', 'Purchase', '2021-01-10', '1020101', 'Cash in Hand For Manufacturer Aristropharma ', '0.00', '999.00', '1', '1', '2021-01-09 23:25:25', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (90, '457049095928', 'Invoice', '2021-01-09', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '4000.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (91, '457049095928', 'Invoice', '2021-01-09', '102030000001', 'Customer debit for  .Walking Customer', '190.08', '0.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (92, '457049095928', 'INVOICE', '2021-01-09', '304', 'Customer debit For Invoice No457049095928', '0.00', '190.08', '1', '1', '2021-01-09 23:26:28', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (93, '457049095928', 'Invoice', '2021-01-09', '102030000001', 'Customer .Walking Customer', '0.00', '190.08', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (94, '457049095928', 'Invoice', '2021-01-09', '1020101', 'Cash in Hand For Sale to Walking Customer', '190.08', '0.00', '1', '1', '2021-01-09 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (95, '474000067805', 'Invoice', '2021-01-10', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '1500.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (96, '474000067805', 'Invoice', '2021-01-10', '102030000001', 'Customer debit for  .Walking Customer', '70.28', '0.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (97, '474000067805', 'INVOICE', '2021-01-10', '304', 'Customer debit For Invoice No474000067805', '0.00', '70.28', '1', '1', '2021-01-09 23:42:05', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (98, '474000067805', 'Invoice', '2021-01-10', '102030000001', 'Customer .Walking Customer', '0.00', '70.28', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (99, '474000067805', 'Invoice', '2021-01-10', '1020101', 'Cash in Hand For Sale to Walking Customer', '70.28', '0.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (100, '474000067805', 'Return', '2021-01-10', '102030000001', 'Customer debit For Return Walking Customer', '0.00', '23.76', '1', '1', '2021-01-10 00:18:25', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (105, '590618400528', 'Purchase', '2021-01-10', '10107', 'Inventory Debit For Manufacturer Beximco', '4500.00', '0.00', '1', '1', '2021-01-10 00:43:28', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (106, '590618400528', 'Purchase', '2021-01-10', '502000001', 'Manufacturer .Beximco', '0.00', '4500.00', '1', '1', '2021-01-10 00:43:28', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (107, '590618400528', 'Purchase', '2021-01-10', '502000001', 'Manufacturer .Beximco', '4500.00', '0.00', '1', '1', '2021-01-10 00:43:28', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (108, '590618400528', 'Purchase', '2021-01-10', '1020101', 'Cash in Hand For Manufacturer Beximco', '0.00', '4500.00', '1', '1', '2021-01-10 00:43:28', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (109, '818591096550', 'Purchase', '2021-01-10', '10107', 'Inventory Debit For Manufacturer Aristropharma ', '25000.00', '0.00', '1', '1', '2021-01-10 00:53:50', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (110, '818591096550', 'Purchase', '2021-01-10', '502000007', 'Manufacturer .Aristropharma ', '0.00', '25000.00', '1', '1', '2021-01-10 00:53:50', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (111, '818591096550', 'Purchase', '2021-01-10', '502000007', 'Manufacturer .Aristropharma ', '25000.00', '0.00', '1', '1', '2021-01-10 00:53:50', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (112, '818591096550', 'Purchase', '2021-01-10', '102010200003', 'Paid amount for Manufacturer  Aristropharma ', '0.00', '25000.00', '1', '1', '2021-01-10 00:53:50', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (113, '190517884835', 'Purchase', '2021-01-10', '10107', 'Inventory Debit For Manufacturer Incepta ', '19999.00', '0.00', '1', '1', '2021-01-10 00:54:35', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (114, '190517884835', 'Purchase', '2021-01-10', '502000006', 'Manufacturer .Incepta ', '0.00', '19999.00', '1', '1', '2021-01-10 00:54:35', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (115, '190517884835', 'Purchase', '2021-01-10', '502000006', 'Manufacturer .Incepta ', '19999.00', '0.00', '1', '1', '2021-01-10 00:54:35', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (116, '190517884835', 'Purchase', '2021-01-10', '1020101', 'Cash in Hand For Manufacturer Incepta ', '0.00', '19999.00', '1', '1', '2021-01-10 00:54:35', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (117, '919310864423', 'Purchase', '2021-01-10', '10107', 'Inventory Debit For Manufacturer Aristropharma ', '25000.00', '0.00', '1', '1', '2021-01-10 00:55:23', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (118, '919310864423', 'Purchase', '2021-01-10', '502000007', 'Manufacturer .Aristropharma ', '0.00', '25000.00', '1', '1', '2021-01-10 00:55:23', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (119, '919310864423', 'Purchase', '2021-01-10', '502000007', 'Manufacturer .Aristropharma ', '25000.00', '0.00', '1', '1', '2021-01-10 00:55:23', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (120, '919310864423', 'Purchase', '2021-01-10', '102010200003', 'Paid amount for Manufacturer  Aristropharma ', '0.00', '25000.00', '1', '1', '2021-01-10 00:55:23', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (121, '724272464800', 'Purchase', '2021-01-10', '10107', 'Inventory Debit For Manufacturer Incepta ', '11999.00', '0.00', '1', '1', '2021-01-10 00:55:38', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (122, '724272464800', 'Purchase', '2021-01-10', '502000006', 'Manufacturer .Incepta ', '0.00', '11999.00', '1', '1', '2021-01-10 00:55:38', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (123, '724272464800', 'Purchase', '2021-01-10', '502000006', 'Manufacturer .Incepta ', '11999.00', '0.00', '1', '1', '2021-01-10 00:55:38', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (124, '724272464800', 'Purchase', '2021-01-10', '1020101', 'Cash in Hand For Manufacturer Incepta ', '0.00', '11999.00', '1', '1', '2021-01-10 00:55:38', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (125, '523973497508', 'Invoice', '2021-01-10', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '4000.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (126, '523973497508', 'Invoice', '2021-01-10', '102030000001', 'Customer debit for  .Walking Customer', '49.50', '0.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (127, '523973497508', 'INVOICE', '2021-01-10', '304', 'Customer debit For Invoice No523973497508', '0.00', '49.50', '1', '1', '2021-01-10 00:57:08', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (128, '523973497508', 'Invoice', '2021-01-10', '102030000001', 'Customer .Walking Customer', '0.00', '49.50', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (129, '523973497508', 'Invoice', '2021-01-10', '1020101', 'Cash in Hand For Sale to Walking Customer', '49.50', '0.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (130, '590618400528', 'Return', '2021-01-10', '502000001', 'manufacturer Return to .3-Beximco', '0.00', '10000.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (131, '523973497508', 'Return', '2021-01-10', '102030000001', 'Customer debit For Return Walking Customer', '0.00', '5.00', '1', '1', '2021-01-10 01:05:47', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (132, '523973497508', 'Return', '2021-01-10', '102030000001', 'Customer debit For Return Walking Customer', '0.00', '5.00', '1', '1', '2021-01-10 01:22:48', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (133, '682013247404', 'Invoice', '2021-01-10', '10107', 'Inventory Credit For Sale to Herry ', '0.00', '1500.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (134, '682013247404', 'Invoice', '2021-01-10', '102030000002', 'Customer debit for  .Herry ', '1.00', '0.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (135, '682013247404', 'INVOICE', '2021-01-10', '304', 'Customer debit For Invoice No682013247404', '0.00', '1.00', '1', '1', '2021-01-10 02:00:04', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (136, '682013247404', 'Invoice', '2021-01-10', '102030000002', 'Customer .Herry ', '0.00', '1.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (137, '682013247404', 'Invoice', '2021-01-10', '1020101', 'Cash in Hand For Sale to Herry ', '1.00', '0.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (138, '190517884835', 'Return', '2021-01-10', '502000006', 'manufacturer Return to .9-Incepta ', '0.00', '400.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (139, '671986913851', 'Purchase', '2021-01-10', '10107', 'Inventory Debit For Manufacturer Beximco', '500.00', '0.00', '1', '1', '2021-01-10 02:17:51', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (140, '671986913851', 'Purchase', '2021-01-10', '502000001', 'Manufacturer .Beximco', '0.00', '500.00', '1', '1', '2021-01-10 02:17:51', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (141, '671986913851', 'Purchase', '2021-01-10', '502000001', 'Manufacturer .Beximco', '500.00', '0.00', '1', '1', '2021-01-10 02:17:51', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (142, '671986913851', 'Purchase', '2021-01-10', '1020101', 'Cash in Hand For Manufacturer Beximco', '0.00', '500.00', '1', '1', '2021-01-10 02:17:51', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (143, '593770764522', 'Invoice', '2021-01-10', '10107', 'Inventory Credit For Sale to Ahmed', '0.00', '60000.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (144, '593770764522', 'Invoice', '2021-01-10', '102030000006', 'Customer debit for  .Ahmed', '5226.67', '0.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (145, '593770764522', 'INVOICE', '2021-01-10', '304', 'Customer debit For Invoice No593770764522', '0.00', '5226.67', '1', '1', '2021-01-10 04:12:22', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (146, '593770764522', 'Invoice', '2021-01-10', '102030000006', 'Customer .Ahmed', '0.00', '5226.67', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (147, '593770764522', 'Invoice', '2021-01-10', '1020101', 'Cash in Hand For Sale to Ahmed', '5226.67', '0.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (148, '210421055029', 'Purchase', '2021-01-10', '10107', 'Inventory Debit For Manufacturer Healthcare ', '49000.00', '0.00', '1', '16', '2021-01-10 04:15:29', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (149, '210421055029', 'Purchase', '2021-01-10', '502000009', 'Manufacturer .Healthcare ', '0.00', '49000.00', '1', '16', '2021-01-10 04:15:29', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (150, '210421055029', 'Purchase', '2021-01-10', '502000009', 'Manufacturer .Healthcare ', '49000.00', '0.00', '1', '16', '2021-01-10 04:15:29', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (151, '210421055029', 'Purchase', '2021-01-10', '1020101', 'Cash in Hand For Manufacturer Healthcare ', '0.00', '49000.00', '1', '16', '2021-01-10 04:15:29', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (152, '354380267418', 'Invoice', '2021-01-10', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '7000.00', '1', '16', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (153, '354380267418', 'Invoice', '2021-01-10', '102030000001', 'Customer debit for  .Walking Customer', '528.00', '0.00', '1', '16', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (154, '354380267418', 'INVOICE', '2021-01-10', '304', 'Customer debit For Invoice No354380267418', '0.00', '528.00', '1', '16', '2021-01-10 04:20:18', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (155, '354380267418', 'Invoice', '2021-01-10', '102030000001', 'Customer .Walking Customer', '0.00', '528.00', '1', '16', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (156, '354380267418', 'Invoice', '2021-01-10', '1020101', 'Cash in Hand For Sale to Walking Customer', '528.00', '0.00', '1', '16', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (157, '864165236501', 'Invoice', '2021-01-10', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '1800.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (158, '864165236501', 'Invoice', '2021-01-10', '102030000001', 'Customer debit for  .Walking Customer', '52.50', '0.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (159, '864165236501', 'INVOICE', '2021-01-10', '304', 'Customer debit For Invoice No864165236501', '0.00', '52.50', '1', '1', '2021-01-10 04:21:01', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (160, '864165236501', 'Invoice', '2021-01-10', '102030000001', 'Customer .Walking Customer', '0.00', '52.50', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (161, '864165236501', 'Invoice', '2021-01-10', '1020101', 'Cash in Hand For Sale to Walking Customer', '52.50', '0.00', '1', '1', '2021-01-10 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (162, 'PM-1', 'PM', '2021-01-10', '502000006', '', '2000.00', '0.00', '1', '1', '2021-01-10 06:15:39', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (163, 'PM-1', 'PM', '2021-01-10', '1020101', 'Paid to Incepta ', '0.00', '2000.00', '1', '1', '2021-01-10 06:15:39', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (164, 'PM-2', 'PM', '2021-01-10', '502000006', '', '500.00', '0.00', '1', '1', '2021-01-10 06:25:52', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (165, 'PM-2', 'PM', '2021-01-10', '1020101', 'Paid to Incepta ', '0.00', '500.00', '1', '1', '2021-01-10 06:25:52', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (166, 'PM-3', 'PM', '2021-01-10', '502000006', '', '500.00', '0.00', '1', '1', '2021-01-10 06:28:04', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (167, 'PM-3', 'PM', '2021-01-10', '1020101', 'Paid to Incepta ', '0.00', '500.00', '1', '1', '2021-01-10 06:28:04', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (168, 'CR-1', 'CR', '2021-01-10', '102030000007', '', '0.00', '500.00', '1', '1', '2021-01-10 06:31:20', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (169, 'CR-1', 'CR', '2021-01-10', '1020101', 'Receive Sunny ', '500.00', '0.00', '1', '1', '2021-01-10 06:31:20', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (170, 'CR-1', 'CR', '2021-01-10', '102030000007', '', '0.00', '500.00', '1', '1', '2021-01-10 06:32:31', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (171, 'CR-1', 'CR', '2021-01-10', '1020101', 'Receive Sunny ', '500.00', '0.00', '1', '1', '2021-01-10 06:32:31', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (172, 'PM-4', 'PM', '2021-01-10', '502000006', 'sdfsadf', '200.00', '0.00', '1', '1', '2021-01-10 23:07:57', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (173, 'PM-4', 'PM', '2021-01-10', '1020101', 'Paid to Incepta ', '0.00', '200.00', '1', '1', '2021-01-10 23:07:57', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (174, '179899703156', 'Invoice', '2021-01-11', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '2000.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (175, '179899703156', 'Invoice', '2021-01-11', '102030000001', 'Customer debit for  .Walking Customer', '96.00', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (176, '179899703156', 'INVOICE', '2021-01-11', '304', 'Customer debit For Invoice No179899703156', '0.00', '96.00', '1', '1', '2021-01-10 23:20:56', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (177, '179899703156', 'Invoice', '2021-01-11', '102030000001', 'Customer .Walking Customer', '0.00', '96.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (178, '179899703156', 'Invoice', '2021-01-11', '1020101', 'Cash in Hand For Sale to Walking Customer', '96.00', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (179, '628200235447', 'Invoice', '2021-01-11', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '800.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (180, '628200235447', 'Invoice', '2021-01-11', '102030000001', 'Customer debit for  .Walking Customer', '1.60', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (181, '628200235447', 'INVOICE', '2021-01-11', '304', 'Customer debit For Invoice No628200235447', '0.00', '1.60', '1', '1', '2021-01-10 23:22:48', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (182, '628200235447', 'Invoice', '2021-01-11', '102030000001', 'Customer .Walking Customer', '0.00', '1.60', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (183, '628200235447', 'Invoice', '2021-01-11', '1020101', 'Cash in Hand For Sale to Walking Customer', '1.60', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (184, '224723364808', 'Invoice', '2021-01-11', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '1200.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (185, '224723364808', 'Invoice', '2021-01-11', '102030000001', 'Customer debit for  .Walking Customer', '72.00', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (186, '224723364808', 'INVOICE', '2021-01-11', '304', 'Customer debit For Invoice No224723364808', '0.00', '72.00', '1', '1', '2021-01-10 23:24:08', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (187, '224723364808', 'Invoice', '2021-01-11', '102030000001', 'Customer .Walking Customer', '0.00', '72.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (188, '224723364808', 'Invoice', '2021-01-11', '1020101', 'Cash in Hand For Sale to Walking Customer', '72.00', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (189, '963217932040', 'Invoice', '2021-01-11', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '1000.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (190, '963217932040', 'Invoice', '2021-01-11', '102030000001', 'Customer debit for  .Walking Customer', '4.00', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (191, '963217932040', 'INVOICE', '2021-01-11', '304', 'Customer debit For Invoice No963217932040', '0.00', '4.00', '1', '1', '2021-01-10 23:25:40', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (192, '963217932040', 'Invoice', '2021-01-11', '102030000001', 'Customer .Walking Customer', '0.00', '4.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (193, '963217932040', 'Invoice', '2021-01-11', '1020101', 'Cash in Hand For Sale to Walking Customer', '4.00', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (194, '104553172923', 'Invoice', '2021-01-11', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '2000.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (195, '104553172923', 'Invoice', '2021-01-11', '102030000001', 'Customer debit for  .Walking Customer', '25.00', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (196, '104553172923', 'INVOICE', '2021-01-11', '304', 'Customer debit For Invoice No104553172923', '0.00', '25.00', '1', '1', '2021-01-10 23:26:23', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (197, '104553172923', 'Invoice', '2021-01-11', '102030000001', 'Customer .Walking Customer', '0.00', '25.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (198, '104553172923', 'Invoice', '2021-01-11', '1020101', 'Cash in Hand For Sale to Walking Customer', '25.00', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (199, '328054370942', 'Invoice', '2021-01-11', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '1600.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (200, '328054370942', 'Invoice', '2021-01-11', '102030000001', 'Customer debit for  .Walking Customer', '3.20', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (201, '328054370942', 'INVOICE', '2021-01-11', '304', 'Customer debit For Invoice No328054370942', '0.00', '3.20', '1', '1', '2021-01-10 23:28:42', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (202, '328054370942', 'Invoice', '2021-01-11', '102030000001', 'Customer .Walking Customer', '0.00', '3.20', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (203, '328054370942', 'Invoice', '2021-01-11', '1020101', 'Cash in Hand For Sale to Walking Customer', '3.20', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (204, '90917910055', 'Invoice', '2021-01-11', '10107', 'Inventory Credit For Sale to Herry ', '0.00', '20000.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (205, '90917910055', 'Invoice', '2021-01-11', '102030000002', 'Customer debit for  .Herry ', '40.00', '0.00', '1', '1', '2021-01-11 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (206, '90917910055', 'INVOICE', '2021-01-11', '304', 'Customer debit For Invoice No90917910055', '0.00', '40.00', '1', '1', '2021-01-11 03:06:55', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (207, 'CR-2', 'CR', '2021-01-11', '102030000002', 'sdfsdf', '0.00', '20.00', '1', '1', '2021-01-11 03:08:03', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (208, 'CR-2', 'CR', '2021-01-11', '1020101', 'Receive Herry ', '20.00', '0.00', '1', '1', '2021-01-11 03:08:03', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (209, '952398795855', 'Invoice', '2021-01-18', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '800.00', '1', '1', '2021-01-18 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (210, '952398795855', 'Invoice', '2021-01-18', '102030000001', 'Customer debit for  .Walking Customer', '0.00', '0.00', '1', '1', '2021-01-18 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (211, '952398795855', 'INVOICE', '2021-01-18', '304', 'Customer debit For Invoice No952398795855', '0.00', '0.00', '1', '1', '2021-01-18 02:59:56', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (212, '928334122105', 'Invoice', '2021-01-18', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '800.00', '1', '1', '2021-01-18 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (213, '928334122105', 'Invoice', '2021-01-18', '102030000001', 'Customer debit for  .Walking Customer', '0.00', '0.00', '1', '1', '2021-01-18 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (214, '928334122105', 'INVOICE', '2021-01-18', '304', 'Customer debit For Invoice No928334122105', '0.00', '0.00', '1', '1', '2021-01-18 03:00:05', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (215, '310798590120', 'Invoice', '2021-01-18', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '800.00', '1', '1', '2021-01-18 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (216, '310798590120', 'Invoice', '2021-01-18', '102030000001', 'Customer debit for  .Walking Customer', '0.00', '0.00', '1', '1', '2021-01-18 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (217, '310798590120', 'INVOICE', '2021-01-18', '304', 'Customer debit For Invoice No310798590120', '0.00', '0.00', '1', '1', '2021-01-18 03:00:20', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (218, '844888162953', 'Invoice', '2021-01-18', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '0.00', '1', '1', '2021-01-18 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (219, '844888162953', 'Invoice', '2021-01-18', '102030000001', 'Customer debit for  .Walking Customer', '0.00', '0.00', '1', '1', '2021-01-18 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (220, '844888162953', 'INVOICE', '2021-01-18', '304', 'Customer debit For Invoice No844888162953', '0.00', '0.00', '1', '1', '2021-01-18 03:16:53', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (221, '239557117006', 'Invoice', '2021-01-18', '10107', 'Inventory Credit For Sale to Walking Customer', '0.00', '0.00', '1', '1', '2021-01-18 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (222, '239557117006', 'Invoice', '2021-01-18', '102030000001', 'Customer debit for  .Walking Customer', '0.00', '0.00', '1', '1', '2021-01-18 00:00:00', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (223, '239557117006', 'INVOICE', '2021-01-18', '304', 'Customer debit For Invoice No239557117006', '0.00', '0.00', '1', '1', '2021-01-18 03:17:06', NULL, NULL, '1', 0);
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`, `is_opening`) VALUES (224, 'February 2021', 'Salary', '2021-01-25', '502040001', 'Employee Salary Generate Month of February 2021', '0.00', '10200.00', '1', '1', '2021-01-25 14:48:03', NULL, NULL, '1', 0);


#
# TABLE STRUCTURE FOR: attendance
#

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `sign_in` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sign_out` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `staytime` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: bank_information
#

DROP TABLE IF EXISTS `bank_information`;

CREATE TABLE `bank_information` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ac_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ac_number` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signature_pic` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `bank_information` (`bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (1, 'UCB', 'Arraya', '467890', 'Motijhil', '/', 1);
INSERT INTO `bank_information` (`bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (2, 'Dhaka Bank', 'Business Account', '1234567', 'Gulshan', '/assets/dist/img/bank/1610183595_e7ee91fd06f166cc5776.jpg', 1);
INSERT INTO `bank_information` (`bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (3, 'Bangla bank', 'Namisha', '763435797543667', 'Khilkhet', '', 1);


#
# TABLE STRUCTURE FOR: currency_tbl
#

DROP TABLE IF EXISTS `currency_tbl`;

CREATE TABLE `currency_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `icon` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `currency_tbl` (`id`, `currency_name`, `icon`) VALUES (1, 'Taka', '৳');
INSERT INTO `currency_tbl` (`id`, `currency_name`, `icon`) VALUES (2, 'Dollar', '$');


#
# TABLE STRUCTURE FOR: customer_information
#

DROP TABLE IF EXISTS `customer_information`;

CREATE TABLE `customer_information` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_mobile` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL COMMENT '1=paid,2=credit',
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_by` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `status`, `create_date`, `create_by`) VALUES ('1', 'Walking Customer', '', '', '324234234', '', '', '', '', '', '', '', '', '', 1, '2021-01-07 04:33:34', '1');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `status`, `create_date`, `create_by`) VALUES ('2', 'Herry ', '', '', '67687976', 'herry@em.com', '', '', '', '', '', '', '', '', 1, '2021-01-08 23:18:23', '1');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `status`, `create_date`, `create_by`) VALUES ('3', 'Mahi Islam', '', '', '357967', '', '', '', '', '', '', '', '', '', 1, '2021-01-08 23:19:18', '1');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `status`, `create_date`, `create_by`) VALUES ('4', 'Sabbir Hossain', '', '', '324342', '', '', '', '', '', '', '', '', '', 1, '2021-01-09 02:44:53', '1');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `status`, `create_date`, `create_by`) VALUES ('5', 'korai ', '', '', '354655677', '', '', '', '', '', '', '', '', '', 1, '2021-01-09 03:25:58', '1');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `status`, `create_date`, `create_by`) VALUES ('6', 'Ahmed', '', '', '678686576', '', '', '', '', '', '', '', '', '', 1, '2021-01-09 03:26:51', '1');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `status`, `create_date`, `create_by`) VALUES ('7', 'Sunny ', '', '', '4578854', '', '', '', '', '', '', '', '', '', 1, '2021-01-10 04:05:22', '1');


#
# TABLE STRUCTURE FOR: daily_closing
#

DROP TABLE IF EXISTS `daily_closing`;

CREATE TABLE `daily_closing` (
  `closing_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_day_closing` float NOT NULL,
  `cash_in` float NOT NULL,
  `cash_out` float NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL,
  `adjustment` float DEFAULT NULL,
  `status` int(2) NOT NULL,
  `closed_by` int(11) NOT NULL,
  PRIMARY KEY (`closing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: designation
#

DROP TABLE IF EXISTS `designation`;

CREATE TABLE `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `designation` (`id`, `designation`, `details`) VALUES (1, 'Sales person', 'Sale');
INSERT INTO `designation` (`id`, `designation`, `details`) VALUES (2, 'Manager', 'Manage');
INSERT INTO `designation` (`id`, `designation`, `details`) VALUES (3, 'Cleaner', 'Cleans');


#
# TABLE STRUCTURE FOR: employee_information
#

DROP TABLE IF EXISTS `employee_information`;

CREATE TABLE `employee_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `designation` int(11) DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rate_type` int(11) NOT NULL,
  `hrate` float NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_1` text COLLATE utf8_unicode_ci NOT NULL,
  `address_line_2` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `employee_information` (`id`, `first_name`, `last_name`, `designation`, `phone`, `rate_type`, `hrate`, `email`, `blood_group`, `address_line_1`, `address_line_2`, `image`, `country`, `city`, `zip`, `status`) VALUES (1, 'Moon ', 'Mondol', 3, '7456575656', 2, '10000', 'moon', '', '', '', '/', '', '', '', 1);
INSERT INTO `employee_information` (`id`, `first_name`, `last_name`, `designation`, `phone`, `rate_type`, `hrate`, `email`, `blood_group`, `address_line_1`, `address_line_2`, `image`, `country`, `city`, `zip`, `status`) VALUES (2, 'Jamal', 'Hossen', 2, '76345678708967', 2, '25000', 'jam', '', '', '', '/assets/dist/img/employee/1610177406_6c8822c78eb47da12051.jpg', '', '', '', 1);
INSERT INTO `employee_information` (`id`, `first_name`, `last_name`, `designation`, `phone`, `rate_type`, `hrate`, `email`, `blood_group`, `address_line_1`, `address_line_2`, `image`, `country`, `city`, `zip`, `status`) VALUES (3, 'Kamal', 'Pasha', 1, '35894465989', 2, '15000', 'kam', '', '', '', '/', 'Uganda', '', '', 1);


#
# TABLE STRUCTURE FOR: employee_salary_payment
#

DROP TABLE IF EXISTS `employee_salary_payment`;

CREATE TABLE `employee_salary_payment` (
  `emp_sal_pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `generate_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `total_salary` decimal(18,2) NOT NULL DEFAULT 0.00,
  `total_working_minutes` varchar(50) CHARACTER SET latin1 NOT NULL,
  `working_period` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_due` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `paid_by` int(11) NOT NULL,
  `salary_month` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`emp_sal_pay_id`),
  KEY `employee_id` (`employee_id`),
  KEY `generate_id` (`generate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `employee_salary_payment` (`emp_sal_pay_id`, `generate_id`, `employee_id`, `total_salary`, `total_working_minutes`, `working_period`, `payment_due`, `payment_date`, `paid_by`, `salary_month`) VALUES (1, 2, 1, '10200.00', '0', '0', '', '', 0, 'February 2021');


#
# TABLE STRUCTURE FOR: employee_salary_setup
#

DROP TABLE IF EXISTS `employee_salary_setup`;

CREATE TABLE `employee_salary_setup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `sal_type` int(11) NOT NULL,
  `salary_type_id` int(11) NOT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `create_date` date DEFAULT NULL,
  `update_date` datetime(6) DEFAULT NULL,
  `update_id` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `gross_salary` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `employee_salary_setup` (`id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES (1, 1, 2, 1, '2.00', '2021-01-09', NULL, NULL, '10200');
INSERT INTO `employee_salary_setup` (`id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES (2, 1, 2, 2, '0.00', '2021-01-09', NULL, NULL, '10200');


#
# TABLE STRUCTURE FOR: expense_item
#

DROP TABLE IF EXISTS `expense_item`;

CREATE TABLE `expense_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_item_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `expense_item` (`id`, `expense_item_name`) VALUES (1, 'Mobile bill');
INSERT INTO `expense_item` (`id`, `expense_item_name`) VALUES (2, 'Gas Bill');


#
# TABLE STRUCTURE FOR: invoice
#

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint(20) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `invoice` bigint(20) DEFAULT NULL,
  `total_discount` decimal(10,2) DEFAULT 0.00 COMMENT 'total invoice discount',
  `invoice_discount` decimal(12,2) DEFAULT NULL,
  `total_tax` decimal(10,2) DEFAULT 0.00,
  `prevous_due` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sales_by` int(30) DEFAULT NULL,
  `invoice_details` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL,
  `payment_type` int(11) NOT NULL DEFAULT 1,
  `bank_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `invoice` (`invoice`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (1, '496127908628', '1', '2021-01-09', '158.40', '0.00', '158.40', '1000', '1.60', '0.00', '0.00', '0.00', 1, 'Thank you', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (2, '493177650322', '1', '2021-01-09', '100.67', '100.00', '0.67', '1001', '6.00', '6.00', '0.00', '0.00', 1, 'Thank you', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (3, '321239064259', '1', '2021-01-09', '423.12', '423.12', '0.00', '1002', '5.20', '1.00', '8.32', '0.00', 1, 'Thank you', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (4, '457049095928', '1', '2021-01-09', '190.08', '190.08', '0.00', '1003', '1.92', '0.00', '0.00', '0.00', 1, 'Thank you', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (5, '474000067805', '1', '2021-01-10', '70.28', '70.28', '0.00', '1004', '1.72', '1.00', '0.00', '0.00', 1, 'lorem ', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (6, '523973497508', '1', '2021-01-10', '49.50', '49.50', '0.00', '1005', '0.50', '0.00', '0.00', '0.00', 1, 'Thank you', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (7, '682013247404', '2', '2021-01-10', '1.00', '1.00', '0.00', '1006', '5.00', '5.00', '0.00', '0.00', 1, 'Thank you', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (8, '593770764522', '6', '2021-01-10', '5226.67', '5226.67', '0.00', '1007', '106.67', '0.00', '0.00', '0.00', 1, '', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (9, '354380267418', '1', '2021-01-10', '528.00', '528.00', '0.00', '1008', '5.33', '0.00', '0.00', '0.00', 16, 'Thank you', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (10, '864165236501', '1', '2021-01-10', '52.50', '58.00', '0.00', '1009', '5.50', '5.50', '0.00', '0.00', 1, 'Thank you', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (11, '179899703156', '1', '2021-01-11', '96.00', '96.00', '0.00', '1010', '0.00', '0.00', '0.00', '0.00', 1, '', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (12, '628200235447', '1', '2021-01-11', '1.60', '1.60', '0.00', '1011', '0.00', '0.00', '0.00', '0.00', 1, '', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (13, '224723364808', '1', '2021-01-11', '72.00', '72.00', '0.00', '1012', '0.00', '0.00', '0.00', '0.00', 1, '', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (14, '963217932040', '1', '2021-01-11', '4.00', '4.00', '0.00', '1013', '0.00', '0.00', '0.00', '0.00', 1, '', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (15, '104553172923', '1', '2021-01-11', '25.00', '25.00', '0.00', '1014', '0.00', '0.00', '0.00', '0.00', 1, '', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (16, '328054370942', '1', '2021-01-11', '3.20', '3.20', '0.00', '1015', '0.00', '0.00', '0.00', '0.00', 1, '', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (17, '90917910055', '2', '2021-01-11', '40.00', '0.00', '40.00', '1016', '0.00', '0.00', '0.00', '0.00', 1, '', 1, 1, 0);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (18, '952398795855', '1', '2021-01-18', '0.00', '0.00', '0.00', '1017', '0.00', '0.00', '0.00', '0.00', 1, 'Thank you', 1, 2, 1);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (19, '928334122105', '1', '2021-01-18', '0.00', '0.00', '0.00', '1018', '0.00', '0.00', '0.00', '0.00', 1, 'Thank you', 1, 2, 2);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (20, '310798590120', '1', '2021-01-18', '0.00', '0.00', '0.00', '1019', '0.00', '0.00', '0.00', '0.00', 1, 'Thank you', 1, 2, 1);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (21, '844888162953', '1', '2021-01-18', '0.00', '0.00', '0.00', '1020', '0.00', '0.00', '0.00', '0.00', 1, 'Thank you', 1, 2, 1);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `date`, `total_amount`, `paid_amount`, `due_amount`, `invoice`, `total_discount`, `invoice_discount`, `total_tax`, `prevous_due`, `sales_by`, `invoice_details`, `status`, `payment_type`, `bank_id`) VALUES (22, '239557117006', '1', '2021-01-18', '0.00', '0.00', '0.00', '1021', '0.00', '0.00', '0.00', '0.00', 1, 'Thank you', 1, 2, 1);


#
# TABLE STRUCTURE FOR: invoice_details
#

DROP TABLE IF EXISTS `invoice_details`;

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint(20) NOT NULL,
  `product_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `batch_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` float NOT NULL,
  `rate` float DEFAULT NULL,
  `manufacturer_rate` float DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `product_id` (`product_id`),
  KEY `batch_id` (`batch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (1, '496127908628', '92297345', '23423', '8', '20', '16', '158.4', '1', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (2, '493177650322', '35881603', '97865', '2', '53.33', '40', '106.67', '0', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (3, '321239064259', '78076532', '23434', '7', '60', '53.33', '415.8', '1', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (4, '457049095928', '90913303', '6578', '8', '24', '20', '190.08', '1', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (5, '474000067805', '90913303', '6578', '3', '24', '20', '71.28', '1', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (6, '474000067805', '90913303', '6578', '-1', '24', NULL, '-23.76', '-1', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (7, '523973497508', '66002351', '986', '10', '5', '4', '49.5', '1', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (14, '354380267418', '66225576', '5678', '10', '53.3333', '46.67', '528', '1', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (13, '593770764522', '35881603', '97865', '100', '53.3333', '40', '5226.67', '2', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (12, '682013247404', '74387569', '267', '3', '2', '10', '6', '0', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (15, '864165236501', '58350564', '1245', '2', '5', '4', '10', '0', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (16, '864165236501', '302866832757', '785', '2', '24', '20', '48', '0', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (17, '179899703156', '62272486', '12343', '4', '24', '20', '96', '0', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (18, '628200235447', '92297345', '23423', '2', '0.8', '26.67', '1.6', '0', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (19, '224723364808', '58311915', '753', '3', '24', '16', '72', '0', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (20, '963217932040', '74387569', '267', '2', '2', '10', '4', '0', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (21, '104553172923', '58350564', '1245', '5', '5', '4', '25', '0', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (22, '328054370942', '92297345', '23423', '4', '0.8', '26.67', '3.2', '0', 1);
INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `batch_id`, `quantity`, `rate`, `manufacturer_rate`, `total_price`, `discount`, `status`) VALUES (23, '90917910055', '92297345', '23423', '50', '0.8', '26.67', '40', '0', 1);


#
# TABLE STRUCTURE FOR: language
#

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `phrase` text COLLATE utf8_unicode_ci NOT NULL,
  `english` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `arabic` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `hindi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=403 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (1, 'email', 'Email', 'البريد الإلكتروني', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (2, 'preview', 'Preview', 'معاينة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (3, 'about', 'About', 'حول', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (4, 'password', 'Password', 'كلمه السر', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (5, 'image', 'Image', 'صورة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (6, 'successfully_deleted', 'Successfully Deleted', 'تم الحذف بنجاح', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (7, 'please_try_again', 'Please Try Again', 'حاول مرة اخرى', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (8, 'are_you_sure', 'Are You Sure ??', 'هل أنت واثق؟', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (9, 'save', 'Save', 'حفظ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (10, 'reset', 'Reset', 'إعادة تعيين', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (11, 'company_title', 'Company Title', 'عنوان التطبيق', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (12, 'address', 'Address', 'عنوان', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (13, 'phone', 'Phone', 'هاتف', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (14, 'favicon', 'Favicon', 'فافيكون', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (15, 'logo', 'Logo', 'شعار', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (16, 'footer_text', 'Footer Text', 'نص التذييل', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (17, 'language', 'Language', 'لغة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (18, 'firstname', 'First Name', 'الاسم الاول', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (19, 'lastname', 'Last Name', 'الكنية', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (20, 'add_module', 'Add Module', 'إضافة وحدة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (21, 'module_name', 'Module Name', 'اسم وحدة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (22, 'successfully_inserted', 'Successfully Saved', 'تم الإدراج بنجاح', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (23, 'menu_name', 'Menu Name', 'اسم القائمة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (24, 'role_name', 'Role Name', 'اسم الدور', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (25, 'create', 'Create', 'خلق', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (26, 'read', 'Read', 'اقرأ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (27, 'update', 'Update', 'محدث', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (28, 'delete', 'Delete', 'حذف', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (29, 'sl_no', 'Sl', 'مسلسل', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (30, 'application_setting', 'Application Setting', 'اعدادات التطبيق', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (31, 'user', 'User', 'المستعمل', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (32, 'add_menu', 'Add Menu', 'إضافة قائمة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (33, 'action', 'Action', 'عمل', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (34, 'successfully_updated', 'Successfully Updated', 'تم التحديث بنجاح', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (35, 'no_role_selected', 'No Role assigned Yet', 'لم يتم تحديد دور', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (36, 'test_phrase', '', '', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (37, 'dashboard', 'Dashboard', 'لوحة القيادة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (38, 'add_user', 'Add User', 'إضافة مستخدم', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (39, 'user_list', 'User List', 'قائمة المستخدم', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (40, 'setting', 'Setting', 'ضبط', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (41, 'add_role', 'Add Role', 'أضف دورًا', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (42, 'role_list', 'Role List', 'قائمة الأدوار', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (43, 'assign_role', 'Assign Role', 'تعيين الدور', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (44, 'welcome_back', 'Welcome Back', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (45, 'add_customer', 'Add Customer', 'إضافة الزبون', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (46, 'customer_name', 'Customer Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (47, 'mobile_no', 'Mobile No', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (48, 'email_address', 'Email Address', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (49, 'contact', 'Contact', 'اتصل', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (50, 'address1', 'Address 1', 'العنوان 1', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (51, 'address2', 'Address 2', 'العنوان 2', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (52, 'fax', 'Fax', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (53, 'city', 'City', 'مدينة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (54, 'state', 'State', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (55, 'zip', 'Zip', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (56, 'country', 'Country', 'بلد', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (57, 'previous_balance', 'Previous Balance', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (58, 'save_successfully', 'Successfully Saved', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (59, 'update_successfully', 'Successfully Updated', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (60, 'customer_list', 'Customer List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (61, 'balance', 'Balance', 'توازن', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (62, 'customer', 'Customer', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (63, 'total', 'Total', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (64, 'credit_customer', 'Credit Customer', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (65, 'paid_customer', 'Paid Customer', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (66, 'manufacturer', 'Manufacturer', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (67, 'add_manufacturer', 'Add Manufacturer', 'إضافة الشركة المصنعة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (68, 'manufacturer_list', 'Manufacturer List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (69, 'manufacturerlist', '', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (70, 'manufacturer_name', 'Manufacturer Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (71, 'username', 'User Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (72, 'last_login', 'Last Login', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (73, 'last_logout', 'Last Logout', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (74, 'ip_address', 'Ip Address', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (75, 'currency', 'Currency', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (76, 'medicine', 'Medicine', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (77, 'add_category', 'Add Category', 'إضافة فئة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (78, 'category_list', 'Category List', 'قائمة الفئات', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (79, 'category_name', 'Category Name', 'اسم التصنيف', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (80, 'status', 'Status', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (81, 'unit', 'Unit', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (82, 'add_unit', 'Add Unit', 'أضف وحدة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (83, 'unit_name', 'Unit Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (84, 'unit_list', 'Unit List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (85, 'add_type', 'Add Type', 'أضف نوع', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (86, 'type_list', 'Type List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (87, 'type_name', 'Type Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (88, 'add_medicine', 'Add Medicine', 'أضف الدواء', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (89, 'medicine_list', 'Medicine List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (90, 'medicine_name', 'Medicine Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (91, 'strength', 'Strength', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (92, 'generic_name', 'Generic Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (93, 'box_size', 'Box Size', 'حجم مربع', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (94, 'product_location', 'Shelf', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (95, 'price', 'Price', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (96, 'medicine_type', 'Medicine Type', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (97, 'manufacturer_price', 'Manufacturer Price', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (98, 'product_details', 'Medicine Details', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (99, 'category', 'Category', 'الفئة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (100, 'bar_qrcode', 'Bar Code/QR Code', 'الرمز الشريطي', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (101, 'purchase', 'Purchase', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (102, 'add_purchase', 'Add Purchase', 'إضافة شراء', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (103, 'purchase_list', 'Purchase List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (104, 'date', 'Date', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (105, 'invoice_no', 'Invoice No', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (106, 'details', 'Details', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (107, 'payment_type', 'Payment Type', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (108, 'bank', 'Bank', 'مصرف', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (109, 'medicine_information', 'Medicine Information', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (110, 'batch_id', 'Batch Id', 'دفعة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (111, 'expeire_date', 'Expiry Date', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (112, 'stock_qty', 'Stock Qty', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (113, 'box_qty', 'Box Qty', 'مربع الكمية', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (114, 'quantity', 'Quantity', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (115, 'manufacturer_rate', 'Manufacturer Price', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (116, 'grand_total', 'Grand Total', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (117, 'cash_payment', 'Cash Payment', 'دفع نقدا', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (118, 'bank_payment', 'Bank Payment', 'الدفع المصرفية', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (119, 'discount', 'Discount', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (120, 'paid_amount', 'Paid Amount', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (121, 'due_amount', 'Due Amount', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (122, 'start_date', 'Start Date', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (123, 'end_date', 'End Date', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (124, 'find', 'Find', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (125, 'purchase_id', 'Purchase Id', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (126, 'total_amount', 'Total Amount', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (127, 'invoice', 'Invoice', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (128, 'add_invoice', 'Add Invoice', 'أضف الفاتورة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (129, 'invoice_list', 'Invoice List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (130, 'available_qnty', 'Avail Qty', 'الكمية المتوفرة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (131, 'serial', 'Serial', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (132, 'invoice_discount', 'Invoice Discount', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (133, 'total_discount', 'Total Discount', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (134, 'total_tax', 'Total Tax', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (135, 'shipping_cost', 'Shipping Cost', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (136, 'previous', 'Previous', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (137, 'net_total', 'Net Total', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (138, 'add_bank', 'Add Bank', 'إضافة بنك', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (139, 'bank_list', 'Bank List', 'قائمة البنك', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (140, 'bank_name', 'Bank Name', 'اسم البنك', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (141, 'ac_name', 'Account Name', 'أسم الحساب', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (142, 'ac_number', 'Account Number', 'رقم حساب', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (143, 'branch', 'Branch', 'فرع شجرة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (144, 'signature_pic', 'Signature Picture', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (145, 'hrm', 'Human Resource', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (146, 'add_employee', 'Add Employee', 'إضافة موظف', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (147, 'employee_list', 'Employee List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (148, 'employee', 'Employee', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (149, 'add_designation', 'Add Designation', 'أضف تسمية', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (150, 'designation_list', 'Designation List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (151, 'designation_name', 'Designation Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (152, 'designation', 'Designation', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (153, 'rate_type', 'Rate Type', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (154, 'hour_rate', 'Hour Rate/Salary', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (155, 'blood_group', 'Blood Group', 'فصيلة الدم', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (156, 'address_line_1', 'Address Line 1', 'العنوان السطر 1', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (157, 'address_line_2', 'Address Line 2', 'سطر العنوان 2', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (158, 'hourly', 'Hourly', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (159, 'salary', 'Salary', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (160, 'select_batch', 'Select Batch', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (161, 'pos_invoice', 'POS Invoice', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (162, 'batch', 'Batch', 'دفعة', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (163, 'stock', 'Stock', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (164, 'barcode', 'Bar-Code', 'الرمز الشريطي', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (165, 'qrcode', 'QR-Code', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (166, 'discount_type', 'Discount Type', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (167, 'select_discount_type', 'Select Discount Type', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (168, 'discount_percentage', 'Discount Percentage', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (169, 'fixed_dis', 'Fixed Discount', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (170, 'rtlltr', 'RTL/LTR', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (171, 'rtl', 'RTL', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (172, 'ltr', 'LTR', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (173, 'vat', 'Vat', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (174, 'invoice_id', 'Invoice Id', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (175, 'full_paid', 'Full Paid', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (176, 'expiry_date', 'Expiry Date', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (177, 'total_vat', 'Total VAT', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (179, 'stock_report', 'Stock Report', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (180, 'stock_report_batchwise', 'Stock Report(Batch Wise)', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (181, 'sale_price', 'Sale Price', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (182, 'purchase_price', 'Purchase Price', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (183, 'in_qty', 'In Qty', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (184, 'out_qty', 'Out Qty', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (185, 'stock_sale_price', 'Stock Sale Price', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (186, 'stock_purchase_price', 'Stock Purchase Price', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (187, 'accounts', 'Accounts', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (188, 'coa', 'Chart Of Accounts', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (189, 'opening_balance', 'Opening Balance', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (190, 'voucher_no', 'Voucher No', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (191, 'account_head', 'Account Head', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (192, 'amount', 'Amount', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (193, 'remark', 'Remarks', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (194, 'manufaturer_payment', 'Manufacturer Payment', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (195, 'customer_receive', 'Customer Receive', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (196, 'cash_adjustment', 'Cash Adjustment', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (197, 'adjustment_type', 'Adjustment Type', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (198, 'debit', 'Debit', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (199, 'credit', 'Credit', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (200, 'debit_voucher', 'Debit Voucher', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (201, 'cash_in_hand', 'Cash In Hand', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (202, 'account_name', 'Account Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (203, 'code', 'Code', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (204, 'credit_head', 'Credit Head', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (205, 'debit_head', 'Debit Head', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (206, 'credit_voucher', 'Credit Voucher', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (207, 'contra_voucher', 'Contra Voucher', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (208, 'journal_voucher', 'Journal Voucher', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (209, 'voucher_list', 'Voucher List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (210, 'approve', 'Approve', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (211, 'update_debit_voucher', 'Update Debit Voucher', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (212, 'update_journal_voucher', 'Update Journal Voucher', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (213, 'report', 'Report', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (214, 'cash_book', 'Cash Book', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (215, 'from_date', 'From Date', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (216, 'to_date', 'To Date', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (217, 'bank_book', 'Bank Book', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (218, 'account_code', 'Account Code', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (219, 'search', 'Search', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (220, 'bank_book_report_of', 'Bank Book Report Of', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (221, 'to', 'To', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (222, 'type', 'Type', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (223, 'general_ledger', 'General Ledger', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (224, 'general_head', 'General Head', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (225, 'transaction_head', 'Transaction Head', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (226, 'with_details', 'With Details', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (227, 'pre_balance', 'Pre Balance', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (228, 'current_balance', 'Current Balance', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (229, 'particulars', 'Particulars', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (230, 'general_ledger_of', 'General Ledger Of', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (231, 'no_record_found', 'No Record Found', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (232, 'inventory_ledger', 'Inventory Ledger', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (233, 'trial_balance', 'Trial Balance', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (234, 'prepared_by', 'Prepared By', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (235, 'chairman', 'Chairman', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (236, 'profit_loss', 'Profit Loss', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (237, 'statement_of_comprehensive_income', 'Statement Of Comprehensive Income', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (238, 'total_income', 'Total Income', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (239, 'cash_flow', 'Cash Flow', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (240, 'cash_flow_statement', 'Cash Flow Statement', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (241, 'opening_cash_and_equivalent', 'Opening Cash and Equipment', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (242, 'coa_print', 'COA Print', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (243, 'balance_sheet', 'Balance Sheet', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (244, 'attendance', 'Attendance', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (245, 'add_attendance', 'Add Attendance', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (246, 'attendance_list', 'Attendance List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (247, 'sign_in', 'Sign In', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (248, 'sign_out', 'Sign Out', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (249, 'staytime', 'Staytime', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (250, 'datewise_attendance_report', 'Date Wise Attendance Report', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (251, 'attendance_report', 'Attendance Report', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (252, 'payroll', 'Payroll', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (253, 'add_benefits', 'Add Benefits', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (254, 'benefit_name', 'Benefit Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (255, 'benefit_type', 'Benefit Type', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (256, 'benefit_list', 'Benefit List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (257, 'add', 'Add', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (258, 'deduct', 'Deduct', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (259, 'active', 'Active', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (260, 'inactive', 'Inactive', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (261, 'add_salarysetup', 'Add Salary Setup', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (262, 'basic', 'Basic', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (263, 'tax', 'Tax', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (264, 'salary_type', 'Salary Type', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (265, 'gross_salary', 'Gross Salary', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (266, 'addition', 'Addition', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (267, 'deduction', 'Deduction', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (268, 'already_exist', 'Already Exist', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (269, 'salary_setup_list', 'Salary Setup List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (270, 'edit_salary_setup', 'Edit Salary Setup', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (271, 'salary_generate', 'Salary Generate', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (272, 'generate_list', 'Generate List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (273, 'salary_month', 'Salary Month', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (274, 'the_salary_of', 'The Salary Of', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (275, 'already_generated', 'Already Generated', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (276, 'successfully_generated', 'Successfully Generated', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (277, 'salary_sheet', 'Salary Sheet', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (278, 'month_of_salary', 'Month Of Salary', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (279, 'generated_by', 'Generated By', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (280, 'salary_payment', 'Salary Payment', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (281, 'total_working_hours', 'Total Hours', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (282, 'total_working_day', 'Total Working Days', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (283, 'paid_by', 'Paid By', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (284, 'total_salary', 'Total Salary', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (285, 'pay_now', 'Pay Now', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (286, 'successfully_paid', 'Successfully Paid', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (287, 'payslip', 'Payslip', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (288, 'employee_name', 'Employee Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (289, 'salary_date', 'Salary Date', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (290, 'earnings', 'Earnings', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (291, 'basic_salary', 'Basic Salary', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (292, 'total_addition', 'Total Addition', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (293, 'total_deduction', 'Total Deduction', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (294, 'net_salary', 'Net Salary', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (295, 'ref_number', 'Reference Number', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (296, 'employee_signature', 'Employee Signature', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (297, 'in_word', 'In Word', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (298, 'expense', 'Expense', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (299, 'add_expense_item', 'Add Expense Item', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (300, 'expense_item_name', 'Expense Item Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (301, 'expense_item_list', 'Expense Item List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (302, 'add_expense', 'Add Expense', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (303, 'expense_type', 'Expense Type', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (304, 'expense_list', 'Expense List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (305, 'expense_item', 'Expense Item', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (306, 'expense_statement', 'Expense Statement', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (307, 'add_person', 'Add Person', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (308, 'personal_loan', 'Personal Loan', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (309, 'name', 'Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (310, 'person_list', 'Person List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (311, 'person_name', 'Person Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (312, 'add_loan', 'Add Loan', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (313, 'loan_list', 'Loan List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (314, 'loan', 'Loan', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (315, 'total_balance', 'Total Balance', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (316, 'person_ledger', 'Person Ledger', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (317, 'add_payment', 'Add Payment', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (318, 'service', 'Service', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (319, 'service_list', 'Service List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (320, 'add_service', 'Add Service', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (321, 'service_name', 'Service Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (322, 'charge', 'Charge', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (323, 'description', 'Description', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (324, 'hanging_over', 'Hanging Over', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (325, 'change', 'Change', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (326, 'tax_settings', 'Tax Settings', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (327, 'number_of_tax', 'Number Of Tax', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (328, 'income_tax', 'Income Tax', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (329, 'add_income_tax', 'Add Income Tax', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (330, 'start_amount', 'Start Amount', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (331, 'end_amount', 'End Amount', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (332, 'tax_rate', 'Tax Rate', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (333, 'add_more', 'Add More', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (334, 'setup', 'Setup', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (335, 'income_tax_list', 'Income Tax List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (336, 'update_income_tax', 'Update Income Tax', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (337, 'add_closing', 'Add Closing', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (338, 'last_day_closing', 'Last Day Closing', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (339, 'receive', 'Received', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (340, 'payment', 'Payment', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (341, 'close', 'Close', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (342, 'note_name', 'Note Name', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (343, 'pcs', 'PCS', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (344, 'closing_list', 'Closing List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (345, 'closed_by', 'Closed By', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (346, 'sales_report', 'Sales Report', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (347, 'userwise_sales_report', 'User Wise Sales Report', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (348, 'sold_by', 'Sold By', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (349, 'productwise_sales_report', 'Product Wise Sales Report', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (350, 'categorywise_sales_report', 'Category Wise Sales Report', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (351, 'purchase_report', 'Purchase Report', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (352, 'purchase_by', 'Purchase By', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (353, 'purchase_report_categorywise', 'Purchase Report Category Wise', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (354, 'return', 'Return', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (355, 'add_return', 'Add Return', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (356, 'return_from_customer', 'Return From Customer', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (357, 'return_to_manufacturer', 'Return To Manufacturer', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (358, 'sold_qty', 'Sold Qty', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (359, 'ret_quantity', 'Ret Qty', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (360, 'check_return', 'Check Return', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (361, 'adjs_with_stck', 'Adjust With Stock', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (362, 'nt_return', 'Net Return', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (363, 'wastage', 'Wastage', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (364, 'return_invoice', 'Return Invoice', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (365, 'todays_report', 'Today&#39;s Report', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (366, 'total_purchase', 'Total Purchase', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (367, 'total_sales', 'Total Sales', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (368, 'cash_received', 'Cash Received', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (369, 'bank_received', 'Bank Receive', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (370, 'total_service', 'Total Service', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (371, 'invoice_return_list', 'Invoice Return List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (372, 'purchase_qty', 'Purchase QTY', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (373, 'manufacturer_return_list', 'Manufacturer Return List', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (374, 'income_expense_statement', 'Income Expense Statement', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (375, 'best_sale_of_the_month', 'Best Sales Of The Month', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (376, 'monthly_progress_report', 'Monthly Progress Report', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (377, 'medicine_search', 'Medicine Search', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (378, 'enter_what_you_search', 'Enter What You Search', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (379, 'invoice_search', 'Invoice Search', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (380, 'purchase_search', 'Purchase Search', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (381, 'upload_csv', 'Upload Csv', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (382, 'import_csv', 'Import Csv', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (383, 'leaf_setting', 'Leaf Setting', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (384, 'leaf_type', 'Leaf Type', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (385, 'total_number', 'Total Number', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (386, 'note', 'Note', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (387, 'customer_ledger', 'Customer Ledger', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (388, 'manufacturer_ledger', 'Manufacturer Ledger', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (389, 'menu_title', 'Menu Title', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (390, 'panel_setting', 'Panel Setting', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (391, 'backup_download', 'Download Backup', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (392, 'restore_database', 'Restore Database', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (393, 'restore', 'Restore', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (394, 'db_import', 'Databse Import', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (395, 'import', 'Import', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (396, 'autoupdate', 'Autoupdate', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (397, 'latestv', 'Latest Verstion', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (398, 'current_ver', 'Current Version', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (399, 'purchase_key', 'Purchase Key', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (400, 'select_option', NULL, NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (401, 'noupdates', 'No Update Available', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`, `hindi`) VALUES (402, 'notesupdate', 'Note: If you want to update software,you Must have immediate previous version', NULL, NULL);


#
# TABLE STRUCTURE FOR: manufacturer_information
#

DROP TABLE IF EXISTS `manufacturer_information`;

CREATE TABLE `manufacturer_information` (
  `manufacturer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `manufacturer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailnumber` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`manufacturer_id`),
  KEY `manufacturer_id` (`manufacturer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `manufacturer_information` (`manufacturer_id`, `manufacturer_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('10', 'Aristropharma ', '', '', '9876766', '', '', '', '56878', '', '', '', '', '', NULL, 1);
INSERT INTO `manufacturer_information` (`manufacturer_id`, `manufacturer_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('3', 'Beximco', '', '', '9887676', '', '', '', '', '', '', '', '', '', NULL, 1);
INSERT INTO `manufacturer_information` (`manufacturer_id`, `manufacturer_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('9', 'Incepta ', '', '', '5676865', '', '', '', '', '', '', '', '', '', NULL, 1);
INSERT INTO `manufacturer_information` (`manufacturer_id`, `manufacturer_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('5', 'Square ', '', '', '8547684', '', '', '', '', '', '', '', '', '', NULL, 1);
INSERT INTO `manufacturer_information` (`manufacturer_id`, `manufacturer_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('6', 'opsonin', '', '', '8535657', '', '', '', '', '', '', '', '', '', NULL, 1);
INSERT INTO `manufacturer_information` (`manufacturer_id`, `manufacturer_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('7', 'Reneta', '', '', '8543768709', 'reneta@mail.com', '', '', '', '', '', '', '', 'USA', NULL, 1);
INSERT INTO `manufacturer_information` (`manufacturer_id`, `manufacturer_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('8', 'Mostaq Ahamed', '', '', '234234342', '', '', '', '', '', '', '', '', '', NULL, 1);
INSERT INTO `manufacturer_information` (`manufacturer_id`, `manufacturer_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('11', 'ES+F', '', '', '9643358666', '', '', '', '', '', '', '', '', '', NULL, 1);
INSERT INTO `manufacturer_information` (`manufacturer_id`, `manufacturer_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('13', 'Healthcare ', '', '', '3455776', '', '', '', '', '', '', '', '', '', NULL, 1);
INSERT INTO `manufacturer_information` (`manufacturer_id`, `manufacturer_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('14', 'test', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1);


#
# TABLE STRUCTURE FOR: medicine_leaf_setting
#

DROP TABLE IF EXISTS `medicine_leaf_setting`;

CREATE TABLE `medicine_leaf_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leaf_type` text COLLATE utf8_unicode_ci NOT NULL,
  `total_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `medicine_leaf_setting` (`id`, `leaf_type`, `total_number`) VALUES (1, '1✕25', 25);
INSERT INTO `medicine_leaf_setting` (`id`, `leaf_type`, `total_number`) VALUES (2, '1✕15', 15);
INSERT INTO `medicine_leaf_setting` (`id`, `leaf_type`, `total_number`) VALUES (3, '2✕10', 20);
INSERT INTO `medicine_leaf_setting` (`id`, `leaf_type`, `total_number`) VALUES (4, '1X10', 100);
INSERT INTO `medicine_leaf_setting` (`id`, `leaf_type`, `total_number`) VALUES (6, '1X10', 50);


#
# TABLE STRUCTURE FOR: module
#

DROP TABLE IF EXISTS `module`;

CREATE TABLE `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `directory` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (3, 'dashboard', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (4, 'customer', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (5, 'manufacturer', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (6, 'medicine', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (7, 'purchase', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (8, 'invoice', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (9, 'return', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (10, 'stock', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (11, 'bank', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (12, 'accounts', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (13, 'hrm', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (14, 'service', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (15, 'report', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (16, 'tax', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (17, 'search', NULL, NULL, 'search', 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (18, 'application_setting', NULL, NULL, 'application_setting', 1);


#
# TABLE STRUCTURE FOR: payroll_tax_setup
#

DROP TABLE IF EXISTS `payroll_tax_setup`;

CREATE TABLE `payroll_tax_setup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `start_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `end_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `rate` decimal(12,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: person_information
#

DROP TABLE IF EXISTS `person_information`;

CREATE TABLE `person_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `person_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `person_address` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `person_information` (`id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES (1, 'Minu', '86534', 'Demo', 1);


#
# TABLE STRUCTURE FOR: product_category
#

DROP TABLE IF EXISTS `product_category`;

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES (1, 'Tablet', 1);
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES (2, 'Capsule', 1);
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES (3, 'Syrup', 1);
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES (4, 'injection', 1);
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES (5, 'Saline', 1);
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES (6, 'Gel ', 1);
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES (7, 'test-ccc', 1);
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES (8, 'Haissokor', 1);


#
# TABLE STRUCTURE FOR: product_information
#

DROP TABLE IF EXISTS `product_information`;

CREATE TABLE `product_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `generic_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `strength` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `box_size` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `product_location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `b_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `m_b_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `product_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manufacturer_id` bigint(20) NOT NULL,
  `manufacturer_price` decimal(10,2) DEFAULT NULL,
  `unit` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_details` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `tax0` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `manufacturer_id` (`manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (1, '68459845', 1, 'Tofen', 'hydrop', '50', '50', '1', '6', '300.00', '200.00', '', '3', '4.00', '2', '', '/assets/dist/img/products/1610170968_c9a87d8a8974891e39de.jpg', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (2, '92297345', 1, 'Montifast', 'Montilukast', '10', '15', '3', '0.8', '12.00', '400.00', '', '3', '26.67', '2', '', '/assets/dist/img/products/1610171497_1ca118bc5f20b7ce8c4a.jpg', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (3, '58311915', 2, 'Sergel', 'Omeprazol', '20', '25', '3', '24', '600.00', '400.00', '4', '9', '16.00', '2', '', '/assets/dist/img/products/1610171898_31b59da8c5ccb7b5891b.jpg', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (4, '78076532', 3, 'Miracof', 'hydropistic', '', '15', '2', '60', '900.00', '800.00', '1', '6', '53.33', '1', '', '/assets/dist/img/products/1610171808_2a337bda127113906f7c.jpg', 1, '0.01', '0.01');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (5, '9149320', 3, 'Napa', 'Paracitamol', '', '100', '2', '12', '1200.00', '800.00', '2', '5', '8.00', '2', '', '/assets/dist/img/products/1610174099_0b93074fa07114399625.jpg', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (6, '62272486', 2, 'Cefaclor ', 'cefactilist', '150', '25', '12', '24', '600.00', '500.00', '4', '3', '20.00', '2', '', '/assets/dist/img/products/1610184277_f624ed27d329e60164f7.jpg', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (7, '503818233721', 1, 'Coffix', 'Paracitamol', '500ml', '10', '', '25', '250.00', '200.00', '', '14', '20.00', '', '', '', 1, NULL, NULL);
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (8, '538621858209', 3, 'ddd', 'sdfsdf', '400', '4545', '', '0.0099009900990099', '45.00', '40042.00', '', '12', '8.81', '', '', '', 1, NULL, NULL);
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (9, '302866832757', 1, 'omidon', 'Omaprazol', '600', '25', '7', '24', '600.00', '500.00', '5', '9', '20.00', '2', '', '', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (10, '504464149185', 1, 'flexo ', 'flexorithm ', '200', '25', '', '20', '500.00', '400.00', '', '6', '16.00', '', '', '', 1, NULL, NULL);
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (11, '35881603', 1, 'Alatrol', 'hexacinin', '15', '15', '5', '53.333333333333', '800.00', '600.00', '2', '6', '40.00', '2', '', '', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (13, '90913303', 3, 'Zinc ', '', '500', '25', '7', '24', '600.00', '500.00', '4', '10', '20.00', '2', '', '/assets/dist/img/products/1610254810_70936b6ec6440bb1f9a8.jpg', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (14, '60611517', 2, 'Ativan', '', '100', '50', '', '15', '750.00', '570.00', '', '3', '11.40', '3', 'Osteoarisrheumatoid arthritis and ankylosing spondylitis', '/assets/dist/img/products/1610257845_800c2e5fd66e9e6521e3.jpg', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (15, '58350564', 2, 'Biotin', '', '200', '100', '', '5', '500.00', '400.00', '', '9', '4.00', '3', '', '', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (16, '74387569', 3, 'Flacol', 'amoxdnic', '', '50', '5', '2', '100.00', '500.00', '3', '10', '10.00', '2', '', '', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (17, '66002351', 2, 'Cipro', '', '500', '100', '', '5', '500.00', '400.00', '', '9', '4.00', '4', '', '', 1, '0', '0');
INSERT INTO `product_information` (`id`, `product_id`, `category_id`, `product_name`, `generic_name`, `strength`, `box_size`, `product_location`, `price`, `b_price`, `m_b_price`, `product_type`, `manufacturer_id`, `manufacturer_price`, `unit`, `product_details`, `image`, `status`, `tax0`, `tax1`) VALUES (18, '66225576', 2, 'Captopril', '', '500', '15', '20', '53.333333333333', '800.00', '700.00', '', '13', '46.67', '5', '', '/assets/dist/img/products/1610273517_ae4ffe55cc3deb59b578.jpg', 1, '0', '0');


#
# TABLE STRUCTURE FOR: product_purchase
#

DROP TABLE IF EXISTS `product_purchase`;

CREATE TABLE `product_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chalan_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `grand_total_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_discount` decimal(10,2) DEFAULT 0.00,
  `purchase_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_details` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `purchase_id` bigint(20) NOT NULL,
  `bank_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` int(11) NOT NULL,
  `purchase_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `manufacturer_id` (`manufacturer_id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `bank_id` (`bank_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (1, '2342', '3', '4000.00', '4000.00', '0.00', '0.00', '2021-01-09', '', 1, '373042057346', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (2, '234234', '6', '8000.00', '5000.00', '3000.00', '0.00', '2021-01-09', '', 1, '179292746033', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (3, '0456', '3', '20000.00', '20000.00', '0.00', '0.00', '2021-01-09', '', 1, '507126107355', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (4, '767577', '6', '400.00', '400.00', '0.00', '0.00', '2021-01-09', '', 1, '939680430550', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (5, '6784465677', '9', '489.00', '489.00', '0.00', '11.00', '2021-01-09', 'lorem ', 1, '77021299048', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (6, '0987766', '9', '40000.00', '40000.00', '0.00', '0.00', '2021-01-09', '', 1, '653833150139', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (7, '0987765', '9', '40000.00', '40000.00', '0.00', '0.00', '2021-01-09', '', 1, '289075090432', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (8, '5754445', '3', '48000.00', '48000.00', '0.00', '0.00', '2021-01-09', '', 1, '623644934653', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (9, '54333', '3', '48000.00', '40000.00', '8000.00', '0.00', '2021-01-09', '', 1, '32637812204', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (10, '875436', '9', '60000.00', '60000.00', '0.00', '0.00', '2021-01-09', '', 1, '360003712428', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (11, '8767', '6', '90000.00', '90000.00', '0.00', '0.00', '2021-01-09', '', 1, '206711685026', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (12, '456467', '10', '999.00', '999.00', '0.00', '1.00', '2021-01-10', '', 1, '172803154725', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (13, '6865876', '9', '11999.00', '11999.00', '0.00', '1.00', '2021-01-10', 'lorem ', 1, '724272464800', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (14, '253435', '3', '4500.00', '4500.00', '0.00', '500.00', '2021-01-10', '', 1, '590618400528', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (15, '345', '10', '25000.00', '25000.00', '0.00', '0.00', '2021-01-10', '', 1, '818591096550', '3', 2, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (16, '65776', '9', '19999.00', '19999.00', '0.00', '1.00', '2021-01-10', 'test', 1, '190517884835', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (17, '3388', '10', '25000.00', '25000.00', '0.00', '0.00', '2021-01-10', '', 1, '919310864423', '3', 2, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (18, '2342234', '3', '500.00', '500.00', '0.00', '0.00', '2021-01-10', '', 1, '671986913851', '', 1, 1);
INSERT INTO `product_purchase` (`id`, `chalan_no`, `manufacturer_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `purchase_id`, `bank_id`, `payment_type`, `purchase_by`) VALUES (19, '4567645', '13', '49000.00', '49000.00', '0.00', '0.00', '2021-01-10', ' Demo test', 1, '210421055029', '', 1, 16);


#
# TABLE STRUCTURE FOR: product_purchase_details
#

DROP TABLE IF EXISTS `product_purchase_details`;

CREATE TABLE `product_purchase_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` bigint(20) NOT NULL,
  `product_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` float DEFAULT NULL,
  `box_qty` float DEFAULT NULL,
  `unit_rate` decimal(10,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `mrp` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(12,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `batch_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `expeire_date` date DEFAULT NULL,
  `status` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `product_id` (`product_id`),
  KEY `batch_id` (`batch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (1, '373042057346', '92297345', '250', '10', '16.00', '400.00', '500.00', '4000.00', '0.00', '23423', '2021-09-25', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (2, '179292746033', '78076532', '150', '10', '53.33', '800.00', '900.00', '8000.00', '0.00', '23434', '2021-04-30', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (3, '939680430550', '504464149185', '25', '1', '16.00', '400.00', '500.00', '400.00', '0.00', '776', '2022-04-30', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (4, '77021299048', '302866832757', '25', '1', '20.00', '500.00', '600.00', '500.00', '0.00', '785', '2022-03-31', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (5, '32637812204', '92297345', '1800', '120', '26.67', '400.00', '12.00', '48000.00', '0.00', '355', '2021-09-30', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (6, '360003712428', '58311915', '3750', '150', '16.00', '400.00', '600.00', '60000.00', '0.00', '753', '2021-08-31', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (7, '206711685026', '35881603', '2250', '150', '40.00', '600.00', '800.00', '90000.00', '0.00', '97865', '2022-11-30', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (8, '172803154725', '90913303', '50', '2', '20.00', '500.00', '600.00', '1000.00', '0.00', '6578', '2022-11-30', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (13, '724272464800', '58350564', '3000', '30', '4.00', '400.00', '500.00', '12000.00', '0.00', '1245', '2021-01-29', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (10, '590618400528', '62272486', '500', '10', '10.00', '500.00', '600.00', '5000.00', '0.00', '12343', '2021-01-31', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (11, '190517884835', '66002351', '5000', '50', '4.00', '400.00', '500.00', '20000.00', '0.00', '986', '2022-07-31', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (12, '919310864423', '74387569', '2500', '50', '10.00', '500.00', '100.00', '25000.00', '0.00', '267', '2021-08-31', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (14, '590618400528', '62272486', '-20', NULL, NULL, '500.00', NULL, '-10000.00', '0.00', '12343', '2021-01-31', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (15, '190517884835', '66002351', '-1', NULL, NULL, '400.00', NULL, '-400.00', '0.00', '986', '2022-07-31', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (16, '671986913851', '62272486', '25', '1', '20.00', '500.00', '600.00', '500.00', '0.00', '12343', '2021-01-11', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `box_qty`, `unit_rate`, `rate`, `mrp`, `total_amount`, `discount`, `batch_id`, `expeire_date`, `status`) VALUES (17, '210421055029', '66225576', '1050', '70', '46.67', '700.00', '800.00', '49000.00', '0.00', '5678', '2023-01-31', 1);


#
# TABLE STRUCTURE FOR: product_return
#

DROP TABLE IF EXISTS `product_return`;

CREATE TABLE `product_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `return_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_purchase` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_return` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `byy_qty` decimal(12,2) DEFAULT NULL,
  `ret_qty` decimal(10,2) DEFAULT NULL,
  `customer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manufacturer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_rate` decimal(12,2) DEFAULT NULL,
  `deduction` decimal(10,2) DEFAULT NULL,
  `total_deduct` decimal(12,2) DEFAULT NULL,
  `total_tax` decimal(12,2) DEFAULT NULL,
  `total_ret_amount` decimal(10,2) DEFAULT NULL,
  `net_total_amount` decimal(10,2) DEFAULT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `usablity` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `product_return` (`id`, `return_id`, `product_id`, `invoice_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `customer_id`, `manufacturer_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES (1, '20210110121825', '90913303', '474000067805', NULL, '2021-01-10', '2021-01-10', '3.00', '1.00', '1', '', '24.00', '1.00', '0.24', '0.00', '23.76', '23.76', '', 1);
INSERT INTO `product_return` (`id`, `return_id`, `product_id`, `invoice_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `customer_id`, `manufacturer_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES (2, '20210110010135', '62272486', '', '590618400528', '2021-01-10', '2021-01-10', '500.00', '20.00', '', '3', '500.00', '0.00', '0.00', NULL, '10000.00', '10000.00', 'sdfsdf', 2);
INSERT INTO `product_return` (`id`, `return_id`, `product_id`, `invoice_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `customer_id`, `manufacturer_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES (5, '20210110021412', '66002351', '', '190517884835', '2021-01-10', '2021-01-10', '5000.00', '1.00', NULL, '9', '400.00', '0.00', '0.00', NULL, '400.00', '400.00', '', 2);


#
# TABLE STRUCTURE FOR: product_service
#

DROP TABLE IF EXISTS `product_service`;

CREATE TABLE `product_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL,
  `tax0` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `product_service` (`id`, `service_name`, `description`, `charge`, `status`, `tax0`, `tax1`) VALUES (1, 'Home Delivery', '', '60.00', 1, '0', '0');


#
# TABLE STRUCTURE FOR: product_type
#

DROP TABLE IF EXISTS `product_type`;

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `product_type` (`id`, `type_name`, `status`) VALUES (1, 'Liquid', 1);
INSERT INTO `product_type` (`id`, `type_name`, `status`) VALUES (2, 'Suspension', 1);
INSERT INTO `product_type` (`id`, `type_name`, `status`) VALUES (3, 'Baby Food', 1);
INSERT INTO `product_type` (`id`, `type_name`, `status`) VALUES (4, 'Gastronomical', 1);
INSERT INTO `product_type` (`id`, `type_name`, `status`) VALUES (5, 'Heart Disease', 1);
INSERT INTO `product_type` (`id`, `type_name`, `status`) VALUES (6, 'Eye', 1);
INSERT INTO `product_type` (`id`, `type_name`, `status`) VALUES (7, 'Nose, Ear, Neck', 1);
INSERT INTO `product_type` (`id`, `type_name`, `status`) VALUES (8, 'Type-1 ', 0);


#
# TABLE STRUCTURE FOR: role_permission
#

DROP TABLE IF EXISTS `role_permission`;

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_module_id` (`fk_module_id`),
  KEY `fk_user_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=316 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (211, 1, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (212, 2, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (213, 3, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (214, 4, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (215, 5, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (216, 6, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (217, 7, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (218, 8, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (219, 9, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (220, 10, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (221, 11, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (222, 12, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (223, 13, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (224, 14, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (225, 15, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (226, 16, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (227, 17, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (228, 18, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (229, 19, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (230, 20, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (231, 21, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (232, 22, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (233, 23, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (234, 24, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (235, 25, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (236, 26, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (237, 27, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (238, 28, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (239, 29, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (240, 30, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (241, 31, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (242, 32, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (243, 33, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (244, 34, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (245, 35, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (246, 36, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (247, 37, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (248, 38, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (249, 39, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (250, 40, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (251, 41, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (252, 42, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (253, 43, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (254, 44, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (255, 45, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (256, 46, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (257, 47, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (258, 48, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (259, 49, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (260, 50, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (261, 59, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (262, 60, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (263, 61, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (264, 62, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (265, 63, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (266, 64, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (267, 65, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (268, 66, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (269, 67, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (270, 68, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (271, 69, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (272, 70, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (273, 71, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (274, 72, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (275, 73, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (276, 74, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (277, 75, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (278, 76, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (279, 77, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (280, 78, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (281, 79, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (282, 80, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (283, 81, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (284, 82, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (285, 83, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (286, 84, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (287, 85, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (288, 86, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (289, 87, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (290, 88, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (291, 92, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (292, 93, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (293, 94, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (294, 95, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (295, 51, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (296, 52, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (297, 53, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (298, 54, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (299, 55, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (300, 56, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (301, 57, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (302, 58, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (303, 89, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (304, 90, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (305, 91, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (306, 96, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (307, 97, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (308, 98, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (309, 99, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (310, 100, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (311, 101, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (312, 102, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (313, 103, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (314, 104, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (315, 105, 1, 1, 1, 1, 1);


#
# TABLE STRUCTURE FOR: salary_benefit
#

DROP TABLE IF EXISTS `salary_benefit`;

CREATE TABLE `salary_benefit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `benefit_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `benefit_type` int(2) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `salary_benefit` (`id`, `benefit_name`, `benefit_type`, `status`) VALUES (1, 'Eid Bonus', 1, 1);


#
# TABLE STRUCTURE FOR: salary_sheet_generate
#

DROP TABLE IF EXISTS `salary_sheet_generate`;

CREATE TABLE `salary_sheet_generate` (
  `ssg_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `gdate` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `generate_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ssg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `salary_sheet_generate` (`ssg_id`, `date`, `gdate`, `start_date`, `end_date`, `generate_by`) VALUES (1, '2021-01-09', 'January 2021', '2021-01-01', '2021-01-31', 1);
INSERT INTO `salary_sheet_generate` (`ssg_id`, `date`, `gdate`, `start_date`, `end_date`, `generate_by`) VALUES (2, '2021-01-25', 'February 2021', '2021-02-01', '2021-02-28', 1);


#
# TABLE STRUCTURE FOR: sec_role
#

DROP TABLE IF EXISTS `sec_role`;

CREATE TABLE `sec_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sec_role` (`id`, `type`) VALUES (1, 'Manager ');


#
# TABLE STRUCTURE FOR: sec_userrole
#

DROP TABLE IF EXISTS `sec_userrole`;

CREATE TABLE `sec_userrole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `roleid` int(11) NOT NULL,
  `createby` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  UNIQUE KEY `ID` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (1, '16', 1, '1', '2021-01-10 03:00:49');


#
# TABLE STRUCTURE FOR: service_invoice
#

DROP TABLE IF EXISTS `service_invoice`;

CREATE TABLE `service_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `employee_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` decimal(20,2) DEFAULT NULL,
  `total_discount` decimal(20,2) DEFAULT NULL,
  `invoice_discount` decimal(10,2) DEFAULT NULL,
  `total_tax` decimal(10,2) DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `due_amount` decimal(10,2) DEFAULT NULL,
  `shipping_cost` decimal(10,2) DEFAULT NULL,
  `previous` decimal(10,2) DEFAULT NULL,
  `details` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `bank_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `details`, `payment_type`, `bank_id`) VALUES (1, '20210109045756', '2021-01-09', '1', 3, '60.00', '0.00', NULL, '0.00', '160.00', '0.00', '0.00', '100.00', 'sdfasd', 1, '');
INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `details`, `payment_type`, `bank_id`) VALUES (2, '20210109050023', '2021-01-09', '3', 3, '120.00', '5.00', '5.00', '0.00', '120.00', '0.00', '0.00', '0.00', 'Service Invoice', 1, '');


#
# TABLE STRUCTURE FOR: service_invoice_details
#

DROP TABLE IF EXISTS `service_invoice_details`;

CREATE TABLE `service_invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `service_inv_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qty` decimal(10,2) DEFAULT NULL,
  `charge` decimal(10,2) DEFAULT NULL,
  `discount` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (1, 1, '20210109045756', '1.00', '60.00', '', '0', '60');
INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (2, 1, '20210109050023', '2.00', '60.00', '', '0', '120');


#
# TABLE STRUCTURE FOR: setting
#

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `favicon` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rtl` int(11) NOT NULL DEFAULT 0,
  `discount_type` int(11) NOT NULL,
  `timezone` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `setting` (`id`, `title`, `menu_title`, `address`, `email`, `phone`, `logo`, `favicon`, `language`, `currency`, `rtl`, `discount_type`, `timezone`, `footer_text`) VALUES (1, 'Bdtask Ltd', 'pharmacare', 'Demo Address', 'bdtask@gmail.com', '00123456734', '/assets/dist/img/logo/1610774737_a80f4e581f1e063f13a7.png', '/assets/dist/img/favicon/1610964007_bf55fe787354a00b095a.png', 'english', '৳', 0, 1, 'Asia/Dhaka', 'Copyright@bdtaskkk');


#
# TABLE STRUCTURE FOR: sub_module
#

DROP TABLE IF EXISTS `sub_module`;

CREATE TABLE `sub_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `directory` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (1, 3, 'income_expense_statement', NULL, NULL, 'income_expense_statement', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (2, 3, 'best_sale_of_the_month', NULL, NULL, 'best_sale_of_the_month', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (3, 3, 'monthly_progress_report', NULL, NULL, 'monthly_progress_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (4, 3, 'todays_report', NULL, NULL, 'todays_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (5, 4, 'add_customer', NULL, NULL, 'add_customer', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (6, 4, 'customer_list', NULL, NULL, 'customer_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (7, 4, 'credit_customer', NULL, NULL, 'credit_customer', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (8, 4, 'paid_customer', NULL, NULL, 'paid_customer', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (9, 5, 'add_manufacturer', NULL, NULL, 'add_manufacturer', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (10, 5, 'manufacturer_list', NULL, NULL, 'manufacturer_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (11, 6, 'add_category', NULL, NULL, 'add_category', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (12, 6, 'category_list', NULL, NULL, 'category_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (13, 6, 'add_unit', NULL, NULL, 'add_unit', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (14, 6, 'unit_list', NULL, NULL, 'unit_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (15, 6, 'add_type', NULL, NULL, 'add_type', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (16, 6, 'type_list', NULL, NULL, 'type_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (17, 6, 'add_medicine', NULL, NULL, 'add_medicine', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (18, 6, 'medicine_list', NULL, NULL, 'medicine_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (19, 7, 'add_purchase', NULL, NULL, 'add_purchase', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (20, 7, 'purchase_list', NULL, NULL, 'purchase_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (21, 8, 'add_invoice', NULL, NULL, 'add_invoice', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (22, 8, 'pos_invoice', NULL, NULL, 'pos_invoice', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (23, 8, 'invoice_list', NULL, NULL, 'invoice_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (24, 9, 'add_return', NULL, NULL, 'add_return', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (25, 9, 'invoice_return_list', NULL, NULL, 'invoice_return_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (26, 9, 'manufacturer_return_list', NULL, NULL, 'manufacturer_return_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (27, 10, 'stock_report', NULL, NULL, 'stock_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (28, 10, 'stock_report_batchwise', NULL, NULL, 'stock_report_batchwise', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (29, 11, 'add_bank', NULL, NULL, 'add_bank', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (30, 11, 'bank_list', NULL, NULL, 'bank_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (31, 12, 'coa', NULL, NULL, 'coa', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (32, 12, 'opening_balance', NULL, NULL, 'opening_balance', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (33, 12, 'manufaturer_payment', NULL, NULL, 'manufaturer_payment', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (34, 12, 'customer_receive', NULL, NULL, 'customer_receive', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (35, 12, 'cash_adjustment', NULL, NULL, 'cash_adjustment', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (36, 12, 'debit_voucher', NULL, NULL, 'debit_voucher', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (37, 12, 'credit_voucher', NULL, NULL, 'credit_voucher', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (38, 12, 'contra_voucher', NULL, NULL, 'contra_voucher', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (39, 12, 'journal_voucher', NULL, NULL, 'journal_voucher', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (40, 12, 'voucher_list', NULL, NULL, 'voucher_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (41, 12, 'report', NULL, NULL, 'report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (42, 12, 'cash_book', NULL, NULL, 'cash_book', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (43, 12, 'bank_book', NULL, NULL, 'bank_book', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (44, 12, 'general_ledger', NULL, NULL, 'general_ledger', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (45, 12, 'inventory_ledger', NULL, NULL, 'inventory_ledger', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (46, 12, 'trial_balance', NULL, NULL, 'trial_balance', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (47, 12, 'profit_loss', NULL, NULL, 'profit_loss', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (48, 12, 'cash_flow', NULL, NULL, 'cash_flow', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (49, 12, 'coa_print', NULL, NULL, 'coa_print', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (50, 12, 'balance_sheet', NULL, NULL, 'balance_sheet', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (51, 15, 'add_closing', NULL, NULL, 'add_closing', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (52, 15, 'closing_list', NULL, NULL, 'closing_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (53, 15, 'sales_report', NULL, NULL, 'sales_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (54, 15, 'userwise_sales_report', NULL, NULL, 'userwise_sales_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (55, 15, 'productwise_sales_report', NULL, NULL, 'productwise_sales_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (56, 15, 'categorywise_sales_report', NULL, NULL, 'categorywise_sales_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (57, 15, 'purchase_report', NULL, NULL, 'purchase_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (58, 15, 'purchase_report_categorywise', NULL, NULL, 'purchase_report_categorywise', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (59, 13, 'employee', NULL, NULL, 'employee', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (60, 13, 'add_designation', NULL, NULL, 'add_designation', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (61, 13, 'designation_list', NULL, NULL, 'designation_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (62, 13, 'add_employee', NULL, NULL, 'add_employee', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (63, 13, 'employee_list', NULL, NULL, 'employee_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (64, 13, 'attendance', NULL, NULL, 'attendance', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (65, 13, 'add_attendance', NULL, NULL, 'add_attendance', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (66, 13, 'attendance_list', NULL, NULL, 'attendance_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (67, 13, 'datewise_attendance_report', NULL, NULL, 'datewise_attendance_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (68, 13, 'payroll', NULL, NULL, 'payroll', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (69, 13, 'add_benefits', NULL, NULL, 'add_benefits', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (70, 13, 'benefit_list', NULL, NULL, 'benefit_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (71, 13, 'add_salarysetup', NULL, NULL, 'add_salarysetup', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (72, 13, 'salary_setup_list', NULL, NULL, 'salary_setup_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (73, 13, 'salary_generate', NULL, NULL, 'salary_generate', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (74, 13, 'salary_sheet', NULL, NULL, 'salary_sheet', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (75, 13, 'salary_payment', NULL, NULL, 'salary_payment', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (76, 13, 'expense', NULL, NULL, 'expense', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (77, 13, 'add_expense_item', NULL, NULL, 'add_expense_item', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (78, 13, 'expense_item_list', NULL, NULL, 'expense_item_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (79, 13, 'add_expense', NULL, NULL, 'add_expense', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (80, 13, 'expense_list', NULL, NULL, 'expense_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (81, 13, 'expense_statement', NULL, NULL, 'expense_statement', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (82, 13, 'loan', NULL, NULL, 'loan', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (83, 13, 'add_person', NULL, NULL, 'add_person', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (84, 13, 'person_list', NULL, NULL, 'person_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (85, 13, 'add_loan', NULL, NULL, 'add_loan', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (86, 13, 'add_payment', NULL, NULL, 'add_payment', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (87, 13, 'loan_list', NULL, NULL, 'loan_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (88, 13, 'person_ledger', NULL, NULL, 'person_ledger', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (89, 16, 'tax_settings', NULL, NULL, 'tax_settings', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (90, 16, 'add_income_tax', NULL, NULL, 'add_income_tax', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (91, 16, 'income_tax_list', NULL, NULL, 'income_tax_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (92, 14, 'add_service', NULL, NULL, 'add_service', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (93, 14, 'service_list', NULL, NULL, 'service_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (94, 14, 'add_invoice', NULL, NULL, 'service_invoice_form', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (95, 14, 'invoice_list', NULL, NULL, 'service_invoice_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (96, 17, 'medicine_search', NULL, NULL, 'medicine_search', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (97, 17, 'invoice_search', NULL, NULL, 'invoice_search', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (98, 17, 'purchase_search', NULL, NULL, 'purchase_search', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (99, 18, 'add_user', NULL, NULL, 'add_user', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (100, 18, 'user_list', NULL, NULL, 'user_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (101, 18, 'setting', NULL, NULL, 'setting', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (102, 18, 'add_role', NULL, NULL, 'add_role', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (103, 18, 'role_list', NULL, NULL, 'role_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (104, 18, 'assign_role', NULL, NULL, 'assign_role', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (105, 18, 'language', NULL, NULL, 'language', 1);


#
# TABLE STRUCTURE FOR: tax_collection
#

DROP TABLE IF EXISTS `tax_collection`;

CREATE TABLE `tax_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `relation_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax0` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (1, '2021-01-09', '1', '493177650322', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (2, '2021-01-09', '3', '20210109045756', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (3, '2021-01-09', '3', '20210109050023', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (4, '2021-01-09', '1', '321239064259', '4.16', '4.16');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (5, '2021-01-09', '1', '457049095928', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (6, '2021-01-10', '1', '474000067805', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (7, '2021-01-10', '1', '523973497508', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (8, '2021-01-10', '2', '682013247404', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (9, '2021-01-10', '6', '593770764522', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (10, '2021-01-10', '1', '354380267418', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (11, '2021-01-10', '1', '864165236501', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (12, '2021-01-11', '1', '179899703156', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (13, '2021-01-11', '1', '628200235447', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (14, '2021-01-11', '1', '224723364808', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (15, '2021-01-11', '1', '963217932040', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (16, '2021-01-11', '1', '104553172923', '0.00', '0.00');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`, `tax0`, `tax1`) VALUES (17, '2021-01-11', '1', '328054370942', '0.00', '0.00');


#
# TABLE STRUCTURE FOR: tax_settings
#

DROP TABLE IF EXISTS `tax_settings`;

CREATE TABLE `tax_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `default_value` float NOT NULL,
  `tax_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nt` int(11) NOT NULL,
  `reg_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_show` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tax_settings` (`id`, `default_value`, `tax_name`, `nt`, `reg_no`, `is_show`) VALUES (1, '0', 'Vat', 2, '4545', 1);
INSERT INTO `tax_settings` (`id`, `default_value`, `tax_name`, `nt`, `reg_no`, `is_show`) VALUES (2, '0', 'Tax', 2, '465457485', 1);


#
# TABLE STRUCTURE FOR: theme_color_setup
#

DROP TABLE IF EXISTS `theme_color_setup`;

CREATE TABLE `theme_color_setup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_code` varchar(25) NOT NULL,
  `content_text_color` varchar(20) DEFAULT NULL,
  `font_one` varchar(200) NOT NULL,
  `font_two` varchar(200) NOT NULL,
  `body_font_size` varchar(11) NOT NULL,
  `logo_text_color` varchar(20) DEFAULT NULL,
  `menu_font_color` varchar(10) DEFAULT NULL,
  `menu_hover_color` varchar(10) DEFAULT NULL,
  `menubg_color` varchar(10) DEFAULT NULL,
  `active_menu_color` varchar(30) DEFAULT NULL,
  `active_menu_bgcolor` varchar(30) DEFAULT NULL,
  `body_line_hight` varchar(11) NOT NULL,
  `menu_font_size` varchar(11) DEFAULT NULL,
  `menu_line_hight` varchar(20) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `theme_color_setup` (`id`, `color_code`, `content_text_color`, `font_one`, `font_two`, `body_font_size`, `logo_text_color`, `menu_font_color`, `menu_hover_color`, `menubg_color`, `active_menu_color`, `active_menu_bgcolor`, `body_line_hight`, `menu_font_size`, `menu_line_hight`, `active_status`) VALUES (5, '#d2dcd0', '#c52083', 'Poppins', 'Poppins', '14', '#ce4646', '#cdc332', '#ffa83f', '#eff1f5', '#f5f5f5', '#dea43f', '', '13', NULL, 0);


#
# TABLE STRUCTURE FOR: unit
#

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `unit` (`id`, `unit_name`, `status`) VALUES (1, 'ml', 1);
INSERT INTO `unit` (`id`, `unit_name`, `status`) VALUES (2, 'mg', 1);
INSERT INTO `unit` (`id`, `unit_name`, `status`) VALUES (3, 'piece', 1);
INSERT INTO `unit` (`id`, `unit_name`, `status`) VALUES (4, 'packet', 1);
INSERT INTO `unit` (`id`, `unit_name`, `status`) VALUES (5, 'file', 1);
INSERT INTO `unit` (`id`, `unit_name`, `status`) VALUES (6, 'mmg', 0);


#
# TABLE STRUCTURE FOR: user
#

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `ip_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `token_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`, `token_id`) VALUES (1, 'Admin ', 'User', '', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '/assets/dist/img/user/1610013835_02bd092e4cb106d94293.jpg', '2021-01-25 22:35:26', '2021-01-25 03:13:40', '::1', 1, 1, NULL);
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`, `token_id`) VALUES (15, 'Rania', 'Mohan', '', 'rania@mail.com', '25d55ad283aa400af464c76d713c07ad', NULL, '/assets/dist/img/user/1610185405_cc8860de8eff9c06a98d.jpg', NULL, NULL, NULL, 1, 1, NULL);
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`, `token_id`) VALUES (16, 'Maliha ', 'Rahman ', '', 'maliha@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, '/assets/dist/img/user/1610268920_5f79d90dbf7c9c26f9ba.jpg', '2021-01-10 22:39:29', '2021-01-10 04:21:05', '162.158.165.219', 1, 0, NULL);


