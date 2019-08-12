<?php
if(!defined('sugarEntry'))define('sugarEntry', true);

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/


require_once('include/utils.php');
require_once('include/database/DBManager.php');
require_once('include/database/DBManagerFactory.php');
require_once("include/entryPoint.php");
require_once("modules/Emails/Email.php");



function upgrade_sql_scripts($return_query = false){
global $sugar_config;

$createSchema = array(
				  'IMPORT_MAPS'        	 =>array('createTable'=>false,
												  'addColumns' =>array(
												  					   array('name'=>'enclosure','type'=>'varchar','length'=>'1','null'=>'no','default'=>''),
                  													   array('name'=>'delimiter','type'=>'varchar','length'=>'1','null'=>'no','default'=>','),
                  													   array('name'=>'default_values','type'=>'blob','length'=>'','null'=>'','default'=>''),
                                                                       ),
												  'modifyColumns'=>array('name','text'),
												  ),
				  'INBOUND_EMAIL'        =>array('createTable'=>false,
												  'modifyColumns'=>array(
																		 array('name'=>'mailbox','type'=>'text','length'=>'','null'=>'no')
																		)
												  ),
				  'PROJECT_TASK'         =>array('createTable'=>false,
												  'addColumns' =>array(
												  					   array('name'=>'status','type'=>'varchar','length'=>'255','null'=>'yes','default'=>''),
                                                                       array('name'=>'order_number','type'=>'varchar','length'=>'1','null'=>'no','default'=>''),
                                                                       array('name'=>'task_number','type'=>'varchar','length'=>'1','null'=>'no','default'=>''),
                                                                       array('name'=>'estimated_effort','type'=>'varchar','length'=>'1','null'=>'no','default'=>''),
                                                                       array('name'=>'utilization','type'=>'varchar','length'=>'1','null'=>'no','default'=>''),
                                                                       )
												  ),
				  'REPORTS_CACHE'     	  =>array('createTable'=>true,
                                                   'newColumns' =>array(
												  					   array('name'=>'id','type'=>'char','length'=>'36','null'=>'no','default'=>''),
                                                                       array('name'=>'assigned_user_id','type'=>'char','length'=>'36','null'=>'no','default'=>''),
                                                                       array('name'=>'contents','type'=>'text','length'=>'','null'=>'','default'=>''),
                                                                       array('name'=>'deleted','type'=>'varchar','length'=>'1','null'=>'no','default'=>''),
                                                                       array('name'=>'date_entered','type'=>'datetime','length'=>'','null'=>'no','default'=>''),
                                                                       array('name'=>'date_modified','type'=>'datetime','length'=>'','null'=>'no','default'=>''),
                                                                       ),
                                                    'primaryKey' => array('id','assigned_user_id','deleted')
                                                 ),
                  'SAVED_REPORTS'        =>array('createTable'=>false,
												  'modifyColumns'=>array(
																		 array('name'=>'name','type'=>'varchar','length'=>'255','null'=>'no')
																		)
												  ),
				  'TRACKER'     	     =>array('createTable'=>false,
												  'addColumns' =>array(
												  					   array('name'=>'monitor_id','type'=>'char','length'=>'36','null'=>'no','default'=>''),
                                                                       array('name'=>'team_id','type'=>'varchar','length'=>'36','null'=>'','default'=>''),
                                                                       array('name'=>'deleted','type'=>'tinyint','length'=>'1','null'=>'','default'=>'0'),
                                                                       ),
												  'modifyColumns'=>array(
																		 array('name'=>'session_id','type'=>'varchar','length'=>'36','null'=>'','default'=>'NULL')
																		)
												  ),
				  'TRACKER_PERF'     	 =>array('createTable'=>true,
                                                   'newColumns' =>array(
												  					   array('name'=>'id','type'=>'int','length'=>'11','null'=>'no','default'=>'','auto_increment'=>'yes'),
                                                                       array('name'=>'monitor_id','type'=>'char','length'=>'36','null'=>'no'),
                                                                       array('name'=>'server_response_time','type'=>'double','default'=>'null'),
                                                                       array('name'=>'db_round_trips','type'=>'int','length'=>'6','default'=>'null'),
                                                                       array('name'=>'files_opened','type'=>'int','length'=>'6','default'=>'null'),
                                                                       array('name'=>'memory_usage','type'=>'int','length'=>'12','default'=>'null'),
                                                                       array('name'=>'deleted','type'=>'tinyint','length'=>'1','default'=>'0'),
                                                                       array('name'=>'date_modified','type'=>'datetime','default'=>'NULL')
                                                                       ),
                                                    'primaryKey' => array('id')

                                                 ),


				  'EMAILS_PROJECT_TASKS'  =>array('dropTable'=>false,'indices'=>array('IDX_EPT_EMAIL','IDX_EPT_PROJECT_TASK')),
				  'MEETINGS'  			  =>array('dropTable'=>false,'indices'=>array('idx_meetings_status_d','IDX_MEET_TEAM_USER_DEL','idx_notes_teamid')),
				  'PROJECT_TASK'	      =>array('dropTable'=>false,'columns'=>array('time_due','status','date_due','parent_id','order_number','task_number','depends_on_id','estimated_effort','utilization','time_start_backed')),
				  'FIELDS_META_DATA'	  =>array('dropTable'=>false,'columns'=>array('label','data_type','required_option','max_size','mass_update')),
				  'PROSPECTS'			  =>array('dropTable'=>false,'columns'=>array('email1','email2','invalid_email','email_opt_out')),
				  'CONTACTS'			  =>array('dropTable'=>false,'columns'=>array('email1','email2','invalid_email','email_opt_out'),'indices'=>array('IDX_CONTACT_DEL_TEAM','IDX_CONT_EMAIL1','IDX_CONT_EMAIL2')),
				  'LEADS'			 	  =>array('dropTable'=>false,'columns'=>array('email1','email2','invalid_email','email_opt_out'),'indices'=>array('IDX_LEAD_EMAIL1','IDX_LEAD_EMAIL2')),
				  'ACCOUNTS'			  =>array('dropTable'=>false,'columns'=>array('email1','email2')),
				  'USERS'				  =>array('dropTable'=>false,'columns'=>array('email1','email2'),'indices'=>array('USER_NAME_IDX')),
				  'OPPORTUNITIES'		  =>array('dropTable'=>false,'columns' =>array('amount_backup')),
				  'CASES'                 =>array('dropTable'=>false,'indices'=>array('idx_assigneduserid_status','idx_cases_teamid','IDX_ASS_STA_DEL')),
				  'CALLS'                 =>array('dropTable'=>false,'indices'=>array('IDX_PAR_PAR_STA_DEL','IDX_CALLS_STATUS_D')),
				  'TRACKER'               =>array('dropTable'=>false,'indices'=>array('idx_userid','idx_userid_itemid','idx_tracker_action')),
				  'EMAILS_ACCOUNTS'  	  =>array('dropTable'=>true),
				  'EMAILS_BUGS'      	  =>array('dropTable'=>true),
				  'EMAILS_CASES'     	  =>array('dropTable'=>true),
				  'EMAILS_CONTACTS'  	  =>array('dropTable'=>true),
				  'EMAILS_LEADS'     	  =>array('dropTable'=>true),
				  'EMAILS_OPPORTUNITIES'  =>array('dropTable'=>true),
				  'EMAILS_PROJECTS'       =>array('dropTable'=>true),
				  'EMAILS_PROJECT_TASKS'  =>array('dropTable'=>true),
				  'EMAILS_PROSPECTS'      =>array('dropTable'=>true),
				  'EMAILS_QUOTES'         =>array('dropTable'=>true),
				  'EMAILS_TASKS'          =>array('dropTable'=>true),
				  'EMAILS_USERS'          =>array('dropTable'=>true),
				  'PROJECT_RELATION'      =>array('dropTable'=>true)
			);

    $dbType = $sugar_config['dbconfig']['db_type'];
    $returnAllQueries = '';
	foreach($dropSchema as $table => $tableArray) {
		if($dbType == 'mysql'){
			if(isset($tableArray['dropTable']) && $tableArray['dropTable']){
			  $qT ="DROP TABLE {$table}";
			  if($return_query){
			  	$returnAllQueries .=$qT.";";
			  }
			  else{
			  	$r = $email->db->query($qT, false);
			  }
			  echo 'Dropped Table '.$qT.'</br>';
			}
			else{
			  if(isset($tableArray['columns']) && $tableArray['columns'] != null){
			  	foreach($tableArray['columns'] as $column){
			  	 $qC = "ALTER TABLE {$table} DROP COLUMN {$column}";
			  	 if($return_query){
			  		$returnAllQueries .=$qC.";";
			  	 }
			  	 else{
			  	    $r = $email->db->query($qC, false);
			  	}
			   }
			  	//take the last column out
			  	//$qC = substr($qC, 0, strlen($qC)-1);
			  	//$r = $email->db->query($qC, false,'',true);
			  }
			  if(isset($tableArray['indices']) && $tableArray['indices'] != null){
                 foreach($tableArray['indices'] as $index){
			  	  $qI ="ALTER TABLE {$table} DROP INDEX {$index}";
                  if($return_query){
			  		$returnAllQueries .=$qI.";";
			  	  }
			  	  else{
                  $r = $email->db->query($qI, false);
			  	 }
                }
			  }
			}
	    }
	  	if($dbType == 'mssql'){
			if(isset($tableArray['dropTable']) && $tableArray['dropTable']){
			  //$qT= "IF EXISTS(SELECT 1 FROM sys.objects WHERE OBJECT_ID = OBJECT_ID(N'{$table}') AND type = (N'U')) DROP TABLE {$table}";
			  $qT ="DROP TABLE {$table}";
			  if($return_query){
			  	 $returnAllQueries .=$qT.";";
			   }
			  else{
			  	 $r = $email->db->query($qT, false);
			  }
			}
			else{
			  if(isset($tableArray['columns']) && $tableArray['columns'] != null){
			  	//$qC = "ALTER TABLE {$table}"
			  	foreach($tableArray['columns'] as $column){
			  	 $qC = "ALTER TABLE {$table} DROP COLUMN {$column}";
			  	 if($return_query){
			  		$returnAllQueries .=$qC.";";
			  	 }
			  	 else{
			  	 	$r = $email->db->query($qC, false);
			  	 }
			  	}
			  	//take the last column out
			  	//$r = $email->db->query($qC, false);
			  }
			  if(isset($tableArray['indices']) && $tableArray['indices'] != null){
	            foreach($tableArray['indices'] as $index){
			  	  $qI ="DROP INDEX {$index} ON {$table}";
                  if($return_query){
			  		$returnAllQueries .=$qI.";";
			  	 }
			  	 else{
                    $r = $email->db->query($qI, false);
			  	 }
	            }
			  }
			  if(isset($tableArray['constraints']) && $tableArray['constraints'] != null){
			  	foreach($tableArray['constraints'] as $constraint){
			  	$qConst ="ALTER TABLE {$table} DROP CONSTRAINT {$constraint}";
			  	if($return_query){
			  		$returnAllQueries .=$qConst.";";
			  	 }
			  	 else{
			  		$r = $email->db->query($qConst, false);
			  	 }
			  }
			}
		  }
	    }
	   	if($dbType == 'oci8'){
			if(isset($tableArray['dropTable']) && $tableArray['dropTable']){
			  $qT ="DROP TABLE {$table} CASCADE CONSTRAINTS";
			  if($return_query){
			  	   $returnAllQueries .=$qT.";";
			  	}
			  	 else{
			  	   $r = $email->db->query($qT, false);
			  	}
			  echo 'Dropped Table '.$qT.'</br>';
			}
			else{
			  if(isset($tableArray['columns']) && $tableArray['columns'] != null){
			  	foreach($tableArray['columns'] as $column){
			  	 $qC = "ALTER TABLE {$table} DROP COLUMN {$column}";
			  	 if($return_query){
			  		$returnAllQueries .=$qC.";";
			  	 }
			  	 else{
			  	 	$r = $email->db->query($qC, false);
			  	 }
			  	}
			  }
			  if(isset($tableArray['indices']) && $tableArray['indices'] != null){
                 foreach($tableArray['indices'] as $index){
			  	  $qI ="DROP INDEX {$index}";
                 if($return_query){
			  		$returnAllQueries .=$qI.";";
			  	 }
			  	 else{
                  $r = $email->db->query($qI, false);
			  	 }
                }
			  }
			  if(isset($tableArray['constraints']) && $tableArray['constraints'] != null){
				foreach($tableArray['constraints'] as $constraint){
				  	$qConst .="ALTER TABLE {$table} DROP CONSTRAINT {$constraint}";
			  		if($return_query){
			  			$returnAllQueries .=$qConst.";";
			  	    }
			  	 else{
			  		 	$r = $email->db->query($qConst, false);
			  	   }
			     }
			  }
			}
	    }
	}

  if($return_query){
  	return $returnAllQueries;
  }
}
?>
                       'opportunities' =>'deleted',
                       'cases' => 'deleted',
                       'calls' => 'deleted',
                       'meetings' => 'deleted',
                       'bugs'  =>'deleted',
                       'campaigns'=>'deleted',
                       'prospects'=>array('do_not_call','invalid_email','email_opt_out'),
                       'fields_meta_data'=>'mass_update',
                       'project_task'=>array('order_number','utilization'));

    $q='';
    foreach($tabAndCols as $tab=>$col){
    	if(is_array($col)){
			foreach($col as $c){
				$res = query_Constraints($tab,$c);
				while($consts = $email->db->fetchByAssoc($res)){
					   $q .=' ALTER TABLE '.$tab.' DROP CONSTRAINT '.$consts['CONSTRAINT_NAME'].';';
			   }
			}
	    }
	    else{
			 //echo 'comes ere';
			 $res = query_Constraints($tab,$col);
			 while($consts = $email->db->fetchByAssoc($res)){
				  $q .=' ALTER TABLE '.$tab.' DROP CONSTRAINT '.$consts['CONSTRAINT_NAME'].';';
			 }
	     }
     }
    //echo 'proces '.$q;
    if($return_query){
    	return $q;
    }
    if($q != null){
	  $email->db->query($q,true);
	}
	return;
}

function query_Constraints($table_name,$column_name){
$email = new Email();
$q="with constraint_depends
	as
	(
		select c.TABLE_SCHEMA, c.TABLE_NAME, c.COLUMN_NAME, c.CONSTRAINT_NAME
		  from INFORMATION_SCHEMA.CONSTRAINT_COLUMN_USAGE as c
		 union all
		select s.name, o.name, c.name, d.name
		  from sys.default_constraints as d
		  join sys.objects as o
			on o.object_id = d.parent_object_id
		  join sys.columns as c
			on c.object_id = o.object_id and c.column_id = d.parent_column_id
		  join sys.schemas as s
			on s.schema_id = o.schema_id
   )
	select CONSTRAINT_NAME
	from constraint_depends
	where TABLE_NAME = '$table_name' and COLUMN_NAME = '$column_name'";

 //echo $q;
 return $email->db->query($q,true);
}
?>