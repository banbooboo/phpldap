<?php

require '../vendor/autoload.php';

$ldapObj=new Bambooboo\PHPLdap\Ldap();

$ldap_manager=''; // ldap admin_username
$ldap_password='';// ldap_admin_username_password
$url='';// ldaps:// or ldap://
$port='';// 389 or 636

// Connect to an LDAP server and Bind to LDAP directory
$ldap_res=$ldapObj->LdapInit($ldap_manager,$ldap_password,$url,$port);

/*Get all result entries
 */
$dn='';// define base dn
$filter='';//example: "mail=$email*"
//limit attributes we want to look for
$justthese=array();//example: array("displayName","description","cn","givenName","sn","mail","co","mobile","company","displayName");

$info=$ldapObj->LdapGetEntries($ldap_res,$dn,$filter,$justthese=null);

//Get the DN of a result entry
$ldapObj->LapGetDN($ldap_res,$dn,$filter);

//Get the DN of a result entry
$ldapObj->LapGetDN($ldap_res,$dn,$filter);

//Add entries to LDAP directory
$ldapObj->LdapAdd($ldap_res,$dn);

//Delete an entry from a directory
$ldapObj->LdapDel($ldap_res,$dn);

//Delete attribute values from current attributes
$ldapObj->LdapModDel($ldap_res,$dn,$entry);

//Replace attribute values with new ones
$ldapObj->LdapModReplace($ldap_res,$dn,$entry);

//Add attribute values to current attributes
$ldapObj->LdapModAdd($ldap_res,$dn,$entry);


