-- phpMyAdmin SQL Dump
-- version 3.1.2deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2009 at 11:32 PM
-- Server version: 5.0.75
-- PHP Version: 5.2.6-3ubuntu4.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sirc`
--

-- --------------------------------------------------------

--
-- Table structure for table `si_biller`
--

CREATE TABLE IF NOT EXISTS `si_biller` (
  `id` int(10) NOT NULL auto_increment,
  `domain_id` int(11) NOT NULL default '1',
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `street_address` varchar(255) collate utf8_unicode_ci default NULL,
  `street_address2` varchar(255) collate utf8_unicode_ci default NULL,
  `city` varchar(255) collate utf8_unicode_ci default NULL,
  `state` varchar(255) collate utf8_unicode_ci default NULL,
  `zip_code` varchar(255) collate utf8_unicode_ci default NULL,
  `country` varchar(255) collate utf8_unicode_ci default NULL,
  `phone` varchar(255) collate utf8_unicode_ci default NULL,
  `mobile_phone` varchar(255) collate utf8_unicode_ci default NULL,
  `fax` varchar(255) collate utf8_unicode_ci default NULL,
  `email` varchar(255) collate utf8_unicode_ci default NULL,
  `logo` varchar(255) collate utf8_unicode_ci default NULL,
  `footer` text collate utf8_unicode_ci,
  `notes` text collate utf8_unicode_ci,
  `custom_field1` varchar(255) collate utf8_unicode_ci default NULL,
  `custom_field2` varchar(255) collate utf8_unicode_ci default NULL,
  `custom_field3` varchar(255) collate utf8_unicode_ci default NULL,
  `custom_field4` varchar(255) collate utf8_unicode_ci default NULL,
  `enabled` varchar(1) collate utf8_unicode_ci NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `si_biller`
--

INSERT INTO `si_biller` (`id`, `domain_id`, `name`, `street_address`, `street_address2`, `city`, `state`, `zip_code`, `country`, `phone`, `mobile_phone`, `fax`, `email`, `logo`, `footer`, `notes`, `custom_field1`, `custom_field2`, `custom_field3`, `custom_field4`, `enabled`) VALUES
(1, 1, 'Mr Plough', '43 Evergreen Terace', '', 'Springfield', 'NY', '90245', '', '04 5689 0456', '0456 4568 8966', '04 5689 8956', 'homer@mrplough.com', 'ubuntulogo.png', '', '', '', '', '7898-87987-87', '', '1'),
(2, 1, 'Homer Simpson', '43 Evergreen Terace', NULL, 'Springfield', 'NY', '90245', NULL, '04 5689 0456', '0456 4568 8966', '04 5689 8956', 'homer@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(3, 1, 'The Beer Baron', '43 Evergreen Terace', NULL, 'Springfield', 'NY', '90245', NULL, '04 5689 0456', '0456 4568 8966', '04 5689 8956', 'beerbaron@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(4, 1, 'Fawlty Towers', '13 Seaside Drive', NULL, 'Torquay', 'Brixton on Avon', '65894', 'United Kingdom', '089 6985 4569', '0425 5477 8789', '089 6985 4568', 'penny@fawltytowers.co.uk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `si_customers`
--

CREATE TABLE IF NOT EXISTS `si_customers` (
  `id` int(10) NOT NULL auto_increment,
  `domain_id` int(11) NOT NULL default '1',
  `attention` varchar(255) collate utf8_unicode_ci default NULL,
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `street_address` varchar(255) collate utf8_unicode_ci default NULL,
  `street_address2` varchar(255) collate utf8_unicode_ci default NULL,
  `city` varchar(255) collate utf8_unicode_ci default NULL,
  `state` varchar(255) collate utf8_unicode_ci default NULL,
  `zip_code` varchar(255) collate utf8_unicode_ci default NULL,
  `country` varchar(255) collate utf8_unicode_ci default NULL,
  `phone` varchar(255) collate utf8_unicode_ci default NULL,
  `mobile_phone` varchar(255) collate utf8_unicode_ci default NULL,
  `fax` varchar(255) collate utf8_unicode_ci default NULL,
  `email` varchar(255) collate utf8_unicode_ci default NULL,
  `notes` text collate utf8_unicode_ci,
  `custom_field1` varchar(255) collate utf8_unicode_ci default NULL,
  `custom_field2` varchar(255) collate utf8_unicode_ci default NULL,
  `custom_field3` varchar(255) collate utf8_unicode_ci default NULL,
  `custom_field4` varchar(255) collate utf8_unicode_ci default NULL,
  `enabled` varchar(1) collate utf8_unicode_ci NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `si_customers`
--

INSERT INTO `si_customers` (`id`, `domain_id`, `attention`, `name`, `street_address`, `street_address2`, `city`, `state`, `zip_code`, `country`, `phone`, `mobile_phone`, `fax`, `email`, `notes`, `custom_field1`, `custom_field2`, `custom_field3`, `custom_field4`, `enabled`) VALUES
(1, 1, 'Moe Sivloski', 'Moes Tavern', '45 Main Road', '', 'Springfield', 'NY', '65891', '', '04 1234 5698', '', '04 5689 4566', 'moe@moestavern.com', '<p><strong>Moe&#39;s Tavern</strong> is a fictional <a href=&#39;http://en.wikipedia.org/wiki/Bar_%28establishment%29&#39; title=&#39;Bar (establishment)&#39;>bar</a> seen on <em><a href=&#39;http://en.wikipedia.org/wiki/The_Simpsons&#39; title=&#39;The Simpsons&#39;>The Simpsons</a></em>. The owner of the bar is <a href=&#39;http://en.wikipedia.org/wiki/Moe_Szyslak&#39; title=&#39;Moe Szyslak&#39;>Moe Szyslak</a>.</p> <p>In The Simpsons world, it is located on the corner of Walnut Street, neighboring King Toot&#39;s Music Store, across the street is the Moeview Motel, and a factory formerly owned by <a href=&#39;http://en.wikipedia.org/wiki/Bart_Simpson&#39; title=&#39;Bart Simpson&#39;>Bart Simpson</a>, until it collapsed. The inside of the bar has a few pool tables and a dartboard. It is very dank and &quot;smells like <a href=&#39;http://en.wikipedia.org/wiki/Urine&#39; title=&#39;Urine&#39;>tinkle</a>.&quot; Because female customers are so rare, Moe frequently uses the women&#39;s restroom as an office. Moe claimed that there haven&#39;t been any ladies at Moe&#39;s since <a href=&#39;http://en.wikipedia.org/wiki/1979&#39; title=&#39;1979&#39;>1979</a> (though earlier episodes show otherwise). A jar of pickled eggs perpetually stands on the bar. Another recurring element is a rat problem. This can be attributed to the episode <a href=&#39;http://en.wikipedia.org/wiki/Homer%27s_Enemy&#39; title=&#39;Homer&#39;s Enemy&#39;>Homer&#39;s Enemy</a> in which Bart&#39;s factory collapses, and the rats are then shown to find a new home at Moe&#39;s. In &quot;<a href=&#39;http://en.wikipedia.org/wiki/Who_Shot_Mr._Burns&#39; title=&#39;Who Shot Mr. Burns&#39;>Who Shot Mr. Burns</a>,&quot; Moe&#39;s Tavern was forced to close down because Mr. Burns&#39; slant-drilling operation near the tavern caused unsafe pollution. It was stated in the &quot;<a href=&#39;http://en.wikipedia.org/wiki/Flaming_Moe%27s&#39; title=&#39;Flaming Moe&#39;s&#39;>Flaming Moe&#39;s</a>&quot; episode that Moe&#39;s Tavern was on Walnut Street. The phone number would be 76484377, since in &quot;<a href=&#39;http://en.wikipedia.org/wiki/Homer_the_Smithers&#39; title=&#39;Homer the Smithers&#39;>Homer the Smithers</a>,&quot; Mr. Burns tried to call Smithers but did not know his phone number. He tried the buttons marked with the letters for Smithers and called Moe&#39;s. In &quot;<a href=&#39;http://en.wikipedia.org/wiki/Principal_Charming&#39; title=&#39;Principal Charming&#39;>Principal Charming</a>&quot; Bart is asked to call Homer by Principal Skinner, the number visible on the card is WORK: KLondike 5-6832 HOME: KLondike 5-6754 MOE&#39;S TAVERN: KLondike 5-1239 , Moe answers the phone and Bart asks for Homer Sexual. The bar serves <a href=&#39;http://en.wikipedia.org/wiki/Duff_Beer&#39; title=&#39;Duff Beer&#39;>Duff Beer</a> and Red Tick Beer, a beer flavored with dogs.</p>', '', '', '', '', '1'),
(2, 1, 'Mr Burns', 'Springfield Power Plant', '4 Power Plant Drive', '', 'Springfield', 'NY', '90210', '', '04 1235 5698', '', '04 5678 7899', 'mburns@spp.com', '<p><strong>Springfield Nuclear Power Plant</strong> is a fictional electricity generating facility in the <a href=&#39;http://en.wikipedia.org/wiki/Television&#39; title=&#39;Television&#39;>television</a> <a href=&#39;http://en.wikipedia.org/wiki/Animated_cartoon&#39; title=&#39;Animated cartoon&#39;>animated cartoon</a> series <em><a href=&#39;http://en.wikipedia.org/wiki/The_Simpsons&#39; title=&#39;The Simpsons&#39;>The Simpsons</a></em>. The plant has a <a href=&#39;http://en.wikipedia.org/wiki/Monopoly&#39; title=&#39;Monopoly&#39;>monopoly</a> on the city of <a href=&#39;http://en.wikipedia.org/wiki/Springfield_%28The_Simpsons%29&#39; title=&#39;Springfield (The Simpsons)&#39;>Springfield&#39;s</a> energy supply, but is sometimes mismanaged and endangers much of the town with its presence.</p> <p>Based on the plant&#39;s appearance and certain episode plots, it likely houses only a single &quot;unit&quot; or reactor (although, judging from the number of <a href=&#39;http://en.wikipedia.org/wiki/Containment_building&#39; title=&#39;Containment building&#39;>containment buildings</a> and <a href=&#39;http://en.wikipedia.org/wiki/Cooling_tower&#39; title=&#39;Cooling tower&#39;>cooling towers</a>, there is a chance it may have two). In one episode an emergency occurs and Homer resorts to the manual, which begins &quot;Congratulations on your purchase of a Fissionator 1952 Slow-Fission Reactor&quot;.</p> <p>The plant is poorly maintained, largely due to owner Montgomery Burns&#39; miserliness. Its <a href=&#39;http://en.wikipedia.org/wiki/Nuclear_safety&#39; title=&#39;Nuclear safety&#39;>safety record</a> is appalling, with various episodes showing luminous rats in the bowels of the building, pipes and drums leaking radioactive waste, the disposal of waste in a children&#39;s playground, <a href=&#39;http://en.wikipedia.org/wiki/Plutonium&#39; title=&#39;Plutonium&#39;>plutonium</a> used as a paperweight, cracked cooling towers (fixed in one episode using a piece of <a href=&#39;http://en.wikipedia.org/wiki/Chewing_gum&#39; title=&#39;Chewing gum&#39;>Chewing gum</a>), dangerously high <a href=&#39;http://en.wikipedia.org/wiki/Geiger_counter&#39; title=&#39;Geiger counter&#39;>Geiger counter</a> readings around the perimeter of the plant, and even a giant spider. In the opening credits a bar of some <a href=&#39;http://en.wikipedia.org/wiki/Radioactive&#39; title=&#39;Radioactive&#39;>radioactive</a> substance is trapped in Homer&#39;s overalls and later disposed of in the street.</p>', '13245-789798', '', '', '', '1'),
(3, 1, 'Kath Day-Knight', 'Kath and Kim Pty Ltd', '82 Fountain Drive', '', 'Fountain Lakes', 'VIC', '3567', 'Australia', '03 9658 7456', '', '03 9658 7457', 'kath@kathandkim.com.au', 'Kath Day-Knight (<a href=&#39;http://en.wikipedia.org/wiki/Jane_Turner&#39; title=&#39;Jane Turner&#39;>Jane Turner</a>) is an &#39;empty nester&#39; divorc&eacute;e who wants to enjoy time with her &quot;hunk o&#39; spunk&quot; Kel Knight (<a href=&#39;http://en.wikipedia.org/wiki/Glenn_Robbins&#39; title=&#39;Glenn Robbins&#39;>Glenn Robbins</a>), a local &quot;purveyor of fine meats&quot;, but whose lifestyle is often cramped by the presence of her self-indulgent and spoilt rotten twenty-something daughter Kim Craig <a href=&#39;http://en.wikipedia.org/wiki/List_of_French_phrases_used_by_English_speakers#I_.E2.80.93_Q&#39; title=&#39;List of French phrases used by English speakers&#39;>n&eacute;e</a> Day (<a href=&#39;http://en.wikipedia.org/wiki/Gina_Riley&#39; title=&#39;Gina Riley&#39;>Gina Riley</a>). Kim enjoys frequent and lengthy periods of spiteful estrangement from her forgiving husband Brett Craig (<a href=&#39;http://en.wikipedia.org/wiki/Peter_Rowsthorn&#39; title=&#39;Peter Rowsthorn&#39;>Peter Rowsthorn</a>) for imagined slights and misdemeanors, followed by loving reconciliations with him. During Kim and Brett&#39;s frequent rough patches Kim usually seeks solace from her servile &quot;second best friend&quot; Sharon Strzelecki (<a href=&#39;http://en.wikipedia.org/wiki/Magda_Szubanski&#39; title=&#39;Magda Szubanski&#39;>Magda Szubanski</a>), screaming abuse at Sharon for minor infractions while issuing her with intricately-instructed tasks, such as stalking Brett. Kim and Brett had a baby in the final episode of the second series whom they named Epponnee-Raelene Kathleen Darlene Charlene Craig, shortened to Epponnee-Rae.', '13245-789798', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `si_custom_fields`
--

CREATE TABLE IF NOT EXISTS `si_custom_fields` (
  `cf_id` int(11) NOT NULL auto_increment,
  `cf_custom_field` varchar(255) collate utf8_unicode_ci default NULL,
  `cf_custom_label` varchar(255) collate utf8_unicode_ci default NULL,
  `cf_display` varchar(1) collate utf8_unicode_ci NOT NULL default '1',
  `domain_id` int(11) NOT NULL,
  PRIMARY KEY  (`cf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `si_custom_fields`
--

INSERT INTO `si_custom_fields` (`cf_id`, `cf_custom_field`, `cf_custom_label`, `cf_display`, `domain_id`) VALUES
(1, 'biller_cf1', NULL, '0', 1),
(2, 'biller_cf2', NULL, '0', 1),
(3, 'biller_cf3', NULL, '0', 1),
(4, 'biller_cf4', NULL, '0', 1),
(5, 'customer_cf1', NULL, '0', 1),
(6, 'customer_cf2', NULL, '0', 1),
(7, 'customer_cf3', NULL, '0', 1),
(8, 'customer_cf4', NULL, '0', 1),
(9, 'product_cf1', NULL, '0', 1),
(10, 'product_cf2', NULL, '0', 1),
(11, 'product_cf3', NULL, '0', 1),
(12, 'product_cf4', NULL, '0', 1),
(13, 'invoice_cf1', NULL, '0', 1),
(14, 'invoice_cf2', NULL, '0', 1),
(15, 'invoice_cf3', NULL, '0', 1),
(16, 'invoice_cf4', NULL, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `si_extensions`
--

CREATE TABLE IF NOT EXISTS `si_extensions` (
  `id` int(11) NOT NULL auto_increment,
  `domain_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `enabled` varchar(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `si_extensions`
--

INSERT INTO `si_extensions` (`id`, `domain_id`, `name`, `description`, `enabled`) VALUES
(1, 0, 'core', 'Core part of Simple Invoices - always enabled', '1');

-- --------------------------------------------------------

--
-- Table structure for table `si_invoices`
--

CREATE TABLE IF NOT EXISTS `si_invoices` (
  `id` int(10) NOT NULL auto_increment,
  `domain_id` int(11) NOT NULL default '1',
  `biller_id` int(10) NOT NULL default '0',
  `customer_id` int(10) NOT NULL default '0',
  `type_id` int(10) NOT NULL default '0',
  `preference_id` int(10) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `custom_field1` varchar(50) collate utf8_unicode_ci default NULL,
  `custom_field2` varchar(50) collate utf8_unicode_ci default NULL,
  `custom_field3` varchar(50) collate utf8_unicode_ci default NULL,
  `custom_field4` varchar(50) collate utf8_unicode_ci default NULL,
  `note` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `si_invoices`
--

INSERT INTO `si_invoices` (`id`, `domain_id`, `biller_id`, `customer_id`, `type_id`, `preference_id`, `date`, `custom_field1`, `custom_field2`, `custom_field3`, `custom_field4`, `note`) VALUES
(1, 1, 4, 3, 2, 1, '2008-12-30 00:00:00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `si_invoice_items`
--

CREATE TABLE IF NOT EXISTS `si_invoice_items` (
  `id` int(10) NOT NULL auto_increment,
  `invoice_id` int(10) NOT NULL default '0',
  `quantity` decimal(25,6) NOT NULL default '0.000000',
  `product_id` int(10) default '0',
  `unit_price` decimal(25,6) default '0.000000',
  `tax_amount` decimal(25,6) default '0.000000',
  `gross_total` decimal(25,6) default '0.000000',
  `description` text,
  `total` decimal(25,6) default '0.000000',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `si_invoice_items`
--

INSERT INTO `si_invoice_items` (`id`, `invoice_id`, `quantity`, `product_id`, `unit_price`, `tax_amount`, `gross_total`, `description`, `total`) VALUES
(1, 1, '1.000000', 5, '125.000000', '12.500000', '125.000000', '', '137.500000'),
(2, 1, '1.000000', 3, '125.000000', '12.500000', '125.000000', '', '137.500000'),
(3, 1, '1.000000', 2, '140.000000', '0.000000', '140.000000', '', '140.000000'),
(4, 1, '1.000000', 2, '140.000000', '14.000000', '140.000000', '', '154.000000'),
(5, 1, '1.000000', 1, '150.000000', '0.000000', '150.000000', '', '150.000000');

-- --------------------------------------------------------

--
-- Table structure for table `si_invoice_item_tax`
--

CREATE TABLE IF NOT EXISTS `si_invoice_item_tax` (
  `id` int(11) NOT NULL auto_increment,
  `invoice_item_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `tax_type` varchar(1) collate utf8_unicode_ci NOT NULL,
  `tax_rate` decimal(25,6) NOT NULL,
  `tax_amount` decimal(25,6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `si_invoice_item_tax`
--

INSERT INTO `si_invoice_item_tax` (`id`, `invoice_item_id`, `tax_id`, `tax_type`, `tax_rate`, `tax_amount`) VALUES
(1, 1, 3, '%', '10.000000', '12.500000'),
(2, 2, 1, '%', '10.000000', '12.500000'),
(3, 3, 4, '%', '0.000000', '0.000000'),
(4, 4, 1, '%', '10.000000', '14.000000'),
(5, 5, 4, '%', '0.000000', '0.000000');

-- --------------------------------------------------------

--
-- Table structure for table `si_invoice_type`
--

CREATE TABLE IF NOT EXISTS `si_invoice_type` (
  `inv_ty_id` int(11) NOT NULL auto_increment,
  `inv_ty_description` varchar(25) collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY  (`inv_ty_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `si_invoice_type`
--

INSERT INTO `si_invoice_type` (`inv_ty_id`, `inv_ty_description`) VALUES
(1, 'Total'),
(2, 'Itemised'),
(3, 'Consulting');

-- --------------------------------------------------------

--
-- Table structure for table `si_log`
--

CREATE TABLE IF NOT EXISTS `si_log` (
  `id` bigint(20) NOT NULL auto_increment,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `userid` varchar(40) collate utf8_unicode_ci NOT NULL default '0',
  `sqlquerie` text collate utf8_unicode_ci NOT NULL,
  `last_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `si_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `si_payment`
--

CREATE TABLE IF NOT EXISTS `si_payment` (
  `id` int(10) NOT NULL auto_increment,
  `ac_inv_id` int(11) NOT NULL,
  `ac_amount` decimal(25,6) NOT NULL,
  `ac_notes` text collate utf8_unicode_ci NOT NULL,
  `ac_date` datetime NOT NULL,
  `ac_payment_type` int(10) NOT NULL default '1',
  `domain_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `si_payment`
--


-- --------------------------------------------------------

--
-- Table structure for table `si_payment_types`
--

CREATE TABLE IF NOT EXISTS `si_payment_types` (
  `pt_id` int(10) NOT NULL auto_increment,
  `domain_id` int(11) NOT NULL default '1',
  `pt_description` varchar(250) collate utf8_unicode_ci NOT NULL,
  `pt_enabled` varchar(1) collate utf8_unicode_ci NOT NULL default '1',
  PRIMARY KEY  (`pt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `si_payment_types`
--

INSERT INTO `si_payment_types` (`pt_id`, `domain_id`, `pt_description`, `pt_enabled`) VALUES
(1, 1, 'Cash', '1'),
(2, 1, 'Credit Card', '1');

-- --------------------------------------------------------

--
-- Table structure for table `si_preferences`
--

CREATE TABLE IF NOT EXISTS `si_preferences` (
  `pref_id` int(11) NOT NULL auto_increment,
  `domain_id` int(11) NOT NULL default '1',
  `pref_description` varchar(50) collate utf8_unicode_ci default NULL,
  `pref_currency_sign` varchar(50) collate utf8_unicode_ci default NULL,
  `pref_inv_heading` varchar(50) collate utf8_unicode_ci default NULL,
  `pref_inv_wording` varchar(50) collate utf8_unicode_ci default NULL,
  `pref_inv_detail_heading` varchar(50) collate utf8_unicode_ci default NULL,
  `pref_inv_detail_line` text collate utf8_unicode_ci,
  `pref_inv_payment_method` varchar(50) collate utf8_unicode_ci default NULL,
  `pref_inv_payment_line1_name` varchar(50) collate utf8_unicode_ci default NULL,
  `pref_inv_payment_line1_value` varchar(50) collate utf8_unicode_ci default NULL,
  `pref_inv_payment_line2_name` varchar(50) collate utf8_unicode_ci default NULL,
  `pref_inv_payment_line2_value` varchar(50) collate utf8_unicode_ci default NULL,
  `pref_enabled` varchar(1) collate utf8_unicode_ci NOT NULL default '1',
  PRIMARY KEY  (`pref_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `si_preferences`
--

INSERT INTO `si_preferences` (`pref_id`, `domain_id`, `pref_description`, `pref_currency_sign`, `pref_inv_heading`, `pref_inv_wording`, `pref_inv_detail_heading`, `pref_inv_detail_line`, `pref_inv_payment_method`, `pref_inv_payment_line1_name`, `pref_inv_payment_line1_value`, `pref_inv_payment_line2_name`, `pref_inv_payment_line2_value`, `pref_enabled`) VALUES
(1, 1, 'Invoice', '$', 'Invoice', 'Invoice', 'Details', 'Payment is to be made within 14 days of the invoice being sent', 'Electronic Funds Transfer', 'Account name', 'H. & M. Simpson', 'Account number:', '0123-4567-7890', '1'),
(2, 1, 'Receipt', '$', 'Receipt', 'Receipt', 'Details', '<br />This transaction has been paid in full, please keep this receipt as proof of purchase.<br /> Thank you', '', '', '', '', '', '1'),
(3, 1, 'Estimate', '$', 'Estimate', 'Estimate', 'Details', '<br />This is an estimate of the final value of services rendered.<br />Thank you', '', '', '', '', '', '1'),
(4, 1, 'Quote', '$', 'Quote', 'Quote', 'Details', '<br />This is a quote of the final value of services rendered.<br />Thank you', '', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `si_products`
--

CREATE TABLE IF NOT EXISTS `si_products` (
  `id` int(11) NOT NULL auto_increment,
  `domain_id` int(11) NOT NULL default '1',
  `description` text collate utf8_unicode_ci NOT NULL,
  `unit_price` decimal(25,6) default '0.000000',
  `default_tax_id` int(11) default NULL,
  `default_tax_id_2` int(11) default NULL,
  `custom_field1` varchar(255) collate utf8_unicode_ci default NULL,
  `custom_field2` varchar(255) collate utf8_unicode_ci default NULL,
  `custom_field3` varchar(255) collate utf8_unicode_ci default NULL,
  `custom_field4` varchar(255) collate utf8_unicode_ci default NULL,
  `notes` text collate utf8_unicode_ci NOT NULL,
  `enabled` varchar(1) collate utf8_unicode_ci NOT NULL default '1',
  `visible` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `si_products`
--

INSERT INTO `si_products` (`id`, `domain_id`, `description`, `unit_price`, `default_tax_id`, `default_tax_id_2`, `custom_field1`, `custom_field2`, `custom_field3`, `custom_field4`, `notes`, `enabled`, `visible`) VALUES
(1, 1, 'Hourly charge', '150.000000', 1, 0, '', '', '', '', '', '1', 1),
(2, 1, 'Accounting services', '140.000000', 1, 0, '', '', '', '', '', '1', 1),
(3, 1, 'Ploughing service', '125.000000', 1, 0, '', '', '', '', '', '1', 1),
(4, 1, 'Bootleg homebrew', '15.500000', 1, 0, '', '', '', '', '', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `si_sql_patchmanager`
--

CREATE TABLE IF NOT EXISTS `si_sql_patchmanager` (
  `sql_id` int(11) NOT NULL auto_increment,
  `sql_patch_ref` int(11) NOT NULL,
  `sql_patch` varchar(255) collate utf8_unicode_ci NOT NULL,
  `sql_release` varchar(25) collate utf8_unicode_ci NOT NULL default '',
  `sql_statement` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sql_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=352 ;

--
-- Dumping data for table `si_sql_patchmanager`
--

INSERT INTO `si_sql_patchmanager` (`sql_id`, `sql_patch_ref`, `sql_patch`, `sql_release`, `sql_statement`) VALUES
(1, 1, 'Create sql_patchmanger table', '20060514', 'CREATE TABLE si_sql_patchmanager (sql_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,sql_patch_ref VARCHAR( 50 ) NOT NULL ,sql_patch VARCHAR( 255 ) NOT NULL ,sql_release VARCHAR( 25 ) NOT NULL ,sql_statement TEXT NOT NULL) ENGINE = MYISAM '),
(2, 2, '', '', ''),
(3, 3, '', '', ''),
(4, 4, '', '', ''),
(5, 5, '', '', ''),
(6, 6, '', '', ''),
(7, 7, '', '', ''),
(8, 8, '', '', ''),
(9, 9, '', '', ''),
(10, 10, '', '', ''),
(11, 11, '', '', ''),
(12, 12, '', '', ''),
(13, 13, '', '', ''),
(14, 14, '', '', ''),
(15, 15, '', '', ''),
(16, 16, '', '', ''),
(17, 17, '', '', ''),
(18, 18, '', '', ''),
(19, 19, '', '', ''),
(20, 20, '', '', ''),
(21, 21, '', '', ''),
(22, 22, '', '', ''),
(23, 23, '', '', ''),
(24, 24, '', '', ''),
(25, 25, '', '', ''),
(26, 26, '', '', ''),
(27, 27, '', '', ''),
(28, 28, '', '', ''),
(29, 29, '', '', ''),
(30, 30, '', '', ''),
(31, 31, '', '', ''),
(32, 32, '', '', ''),
(33, 33, '', '', ''),
(34, 34, '', '', ''),
(35, 35, '', '', ''),
(36, 36, '', '', ''),
(37, 0, 'Start', '20060514', ''),
(38, 37, '', '', ''),
(39, 38, '', '', ''),
(40, 39, '', '', ''),
(41, 40, '', '', ''),
(42, 41, '', '', ''),
(43, 42, '', '', ''),
(44, 43, '', '', ''),
(45, 44, '', '', ''),
(46, 45, '', '', ''),
(47, 46, '', '', ''),
(48, 47, '', '', ''),
(49, 48, '', '', ''),
(50, 49, '', '', ''),
(51, 50, '', '', ''),
(52, 51, '', '', ''),
(53, 52, '', '', ''),
(54, 53, '', '', ''),
(202, 54, '', '', ''),
(203, 55, '', '', ''),
(204, 56, '', '', ''),
(205, 57, '', '', ''),
(206, 58, '', '', ''),
(207, 59, '', '', ''),
(208, 60, '', '', ''),
(209, 61, '', '', ''),
(210, 62, '', '', ''),
(211, 63, '', '', ''),
(212, 64, '', '', ''),
(213, 65, '', '', ''),
(214, 66, '', '', ''),
(215, 67, '', '', ''),
(216, 68, '', '', ''),
(217, 69, '', '', ''),
(218, 70, '', '', ''),
(219, 71, '', '', ''),
(220, 72, '', '', ''),
(221, 73, '', '', ''),
(222, 74, '', '', ''),
(223, 75, '', '', ''),
(224, 76, '', '', ''),
(225, 77, '', '', ''),
(226, 78, '', '', ''),
(227, 79, '', '', ''),
(228, 80, '', '', ''),
(229, 81, '', '', ''),
(230, 82, '', '', ''),
(231, 83, '', '', ''),
(232, 84, '', '', ''),
(233, 85, '', '', ''),
(234, 86, '', '', ''),
(235, 87, '', '', ''),
(236, 88, '', '', ''),
(237, 89, '', '', ''),
(238, 90, '', '', ''),
(239, 91, '', '', ''),
(240, 92, '', '', ''),
(241, 93, '', '', ''),
(242, 94, '', '', ''),
(243, 95, '', '', ''),
(244, 96, '', '', ''),
(245, 97, '', '', ''),
(246, 98, '', '', ''),
(247, 99, '', '', ''),
(248, 100, '', '', ''),
(249, 101, '', '', ''),
(250, 102, '', '', ''),
(251, 103, '', '', ''),
(252, 104, '', '', ''),
(253, 105, '', '', ''),
(254, 106, '', '', ''),
(255, 107, '', '', ''),
(256, 108, '', '', ''),
(257, 109, '', '', ''),
(258, 110, '', '', ''),
(259, 111, '', '', ''),
(260, 112, '', '', ''),
(261, 113, '', '', ''),
(262, 114, '', '', ''),
(263, 115, '', '', ''),
(264, 116, '', '', ''),
(265, 117, '', '', ''),
(266, 118, '', '', ''),
(267, 119, '', '', ''),
(268, 120, '', '', ''),
(269, 121, '', '', ''),
(270, 122, '', '', ''),
(271, 123, '', '', ''),
(272, 124, '', '', ''),
(273, 125, '', '', ''),
(274, 126, '', '', ''),
(275, 127, '', '', ''),
(276, 128, '', '', ''),
(277, 129, '', '', ''),
(278, 130, '', '', ''),
(279, 131, '', '', ''),
(280, 132, '', '', ''),
(281, 133, '', '', ''),
(282, 134, '', '', ''),
(283, 135, '', '', ''),
(284, 136, '', '', ''),
(285, 137, '', '', ''),
(286, 138, '', '', ''),
(287, 139, '', '', ''),
(288, 140, '', '', ''),
(289, 141, '', '', ''),
(290, 142, '', '', ''),
(291, 143, '', '', ''),
(292, 144, '', '', ''),
(293, 145, '', '', ''),
(294, 146, '', '', ''),
(295, 147, '', '', ''),
(296, 148, '', '', ''),
(297, 149, '', '', ''),
(298, 150, '', '', ''),
(299, 151, '', '', ''),
(300, 152, '', '', ''),
(301, 153, '', '', ''),
(302, 154, '', '', ''),
(303, 155, '', '', ''),
(304, 156, '', '', ''),
(305, 157, '', '', ''),
(306, 158, '', '', ''),
(307, 159, '', '', ''),
(308, 160, '', '', ''),
(309, 161, '', '', ''),
(310, 162, '', '', ''),
(311, 163, '', '', ''),
(312, 164, '', '', ''),
(313, 165, '', '', ''),
(314, 166, '', '', ''),
(315, 167, '', '', ''),
(316, 168, '', '', ''),
(317, 169, '', '', ''),
(318, 170, '', '', ''),
(319, 171, '', '', ''),
(320, 172, '', '', ''),
(321, 173, '', '', ''),
(322, 174, '', '', ''),
(323, 175, '', '', ''),
(324, 176, '', '', ''),
(325, 177, '', '', ''),
(326, 178, '', '', ''),
(327, 179, '', '', ''),
(328, 180, '', '', ''),
(329, 181, '', '', ''),
(330, 182, '', '', ''),
(331, 183, '', '', ''),
(332, 184, '', '', ''),
(333, 185, '', '', ''),
(334, 186, '', '', ''),
(335, 187, '', '', ''),
(336, 188, '', '', ''),
(337, 189, '', '', ''),
(338, 190, '', '', ''),
(339, 191, '', '', ''),
(340, 192, '', '', ''),
(341, 193, '', '', ''),
(342, 194, '', '', ''),
(343, 195, '', '', ''),
(344, 196, '', '', ''),
(345, 197, '', '', ''),
(346, 198, '', '', ''),
(347, 199, '', '', ''),
(348, 200, 'Update extensions table', '20090529', 'UPDATE si_extensions SET id = 0 WHERE name = core LIMIT 1'),
(349, 201, 'Set domain_id on system defaults table to 1', '20090622', 'UPDATE si_system_defaults SET domain_id = 1'),
(350, 202, 'Set extension_id on system defaults table to 1', '20090622', 'UPDATE si_system_defaults SET extension_id = 1'),
(351, 203, 'Move all old consulting style invoices to itemised', '20090704', 'UPDATE si_invoices SET type_id = 2 where type_id = 3');

-- --------------------------------------------------------

--
-- Table structure for table `si_system_defaults`
--

CREATE TABLE IF NOT EXISTS `si_system_defaults` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `value` varchar(30) collate utf8_unicode_ci NOT NULL,
  `domain_id` int(5) NOT NULL default '0',
  `extension_id` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `si_system_defaults`
--

INSERT INTO `si_system_defaults` (`id`, `name`, `value`, `domain_id`, `extension_id`) VALUES
(1, 'biller', '4', 1, 1),
(2, 'customer', '3', 1, 1),
(3, 'tax', '1', 1, 1),
(4, 'preference', '1', 1, 1),
(5, 'line_items', '5', 1, 1),
(6, 'template', 'default', 1, 1),
(7, 'payment_type', '1', 1, 1),
(8, 'language', 'en-gb', 1, 1),
(9, 'dateformate', 'Y-m-d', 1, 1),
(10, 'spreadsheet', 'xls', 1, 1),
(11, 'wordprocessor', 'doc', 1, 1),
(12, 'pdfscreensize', '800', 1, 1),
(13, 'pdfpapersize', 'A4', 1, 1),
(14, 'pdfleftmargin', '15', 1, 1),
(15, 'pdfrightmargin', '15', 1, 1),
(16, 'pdftopmargin', '15', 1, 1),
(17, 'pdfbottommargin', '15', 1, 1),
(18, 'emailhost', 'localhost', 1, 1),
(19, 'emailusername', '', 1, 1),
(20, 'emailpassword', '', 1, 1),
(21, 'logging', '0', 1, 1),
(22, 'delete', 'N', 1, 1),
(23, 'tax_per_line_item', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `si_tax`
--

CREATE TABLE IF NOT EXISTS `si_tax` (
  `tax_id` int(11) NOT NULL auto_increment,
  `tax_description` varchar(50) collate utf8_unicode_ci default NULL,
  `tax_percentage` decimal(25,6) default '0.000000',
  `type` varchar(1) collate utf8_unicode_ci default NULL,
  `tax_enabled` varchar(1) collate utf8_unicode_ci NOT NULL default '1',
  `domain_id` int(11) NOT NULL,
  PRIMARY KEY  (`tax_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `si_tax`
--

INSERT INTO `si_tax` (`tax_id`, `tax_description`, `tax_percentage`, `type`, `tax_enabled`, `domain_id`) VALUES
(1, 'GST', '10.000000', '%', '1', 1),
(2, 'VAT', '10.000000', '%', '1', 1),
(3, 'Sales Tax', '10.000000', '%', '1', 1),
(4, 'No Tax', '0.000000', '%', '1', 1),
(5, 'Postage', '20.000000', '$', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `si_user`
--

CREATE TABLE IF NOT EXISTS `si_user` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(255) collate utf8_unicode_ci default NULL,
  `role_id` int(11) default NULL,
  `domain_id` int(11) default NULL,
  `password` varchar(255) collate utf8_unicode_ci default NULL,
  `enabled` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `si_user`
--

INSERT INTO `si_user` (`id`, `email`, `role_id`, `domain_id`, `password`, `enabled`) VALUES
(1, 'demo@simpleinvoices.org', 1, 1, 'fe01ce2a7fbac8fafaed7c982a04e229', 1);

-- --------------------------------------------------------

--
-- Table structure for table `si_user_domain`
--

CREATE TABLE IF NOT EXISTS `si_user_domain` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `si_user_domain`
--

INSERT INTO `si_user_domain` (`id`, `name`) VALUES
(1, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `si_user_role`
--

CREATE TABLE IF NOT EXISTS `si_user_role` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `si_user_role`
--

INSERT INTO `si_user_role` (`id`, `name`) VALUES
(1, 'administrator');
