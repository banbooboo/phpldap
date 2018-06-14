<?php
namespace Bambooboo\PHPLdap;

class Ldap{
    /**
     * Connect to an LDAP server and Bind to LDAP directory
     * @param $ldap_manager
     * @param $ldap_password
     * @param $host
     * @param $port
     * @return resource
     */
    public function LdapInit($ldap_manager,$ldap_password,$url,$port){

        $ldap_res = ldap_connect($url,$port);
        ldap_set_option( $ldap_res, LDAP_OPT_PROTOCOL_VERSION, 3);
        if ($ldap_res) {
            ldap_bind($ldap_res, $ldap_manager, $ldap_password);
        }
        return $ldap_res;
    }

    /**
     *  Get all result entries
     * @param $ldap_res
     * @param $dn
     * @param $filter
     * @param $justthese
     * @return array
     */
    public function LdapGetEntries($ldap_res,$dn,$filter,$justthese=null){
        $sr=ldap_search($ldap_res, $dn, $filter, $justthese);
        $info = ldap_get_entries($ldap_res, $sr);
        return $info;
    }

    /** Get the DN of a result entry
     * @param $ldap_res
     * @param $dn
     * @param $filter
     *
     * @return string
     */
    public function LapGetDN($ldap_res,$dn,$filter){
        $res = ldap_search($ldap_res, $dn, $filter);
        $first = ldap_first_entry($ldap_res, $res);
        $data = ldap_get_dn($ldap_res, $first);
        return $data;
    }

    /** Add attribute values to current attributes
     * @param $ldap_res
     * @param $dn
     * @param $entry
     *
     * @return bool
     */
    public function LdapModAdd($ldap_res,$dn,$entry){
        $result = ldap_mod_add($ldap_res,$dn, $entry);
        return $result;
    }

    /**Replace attribute values with new ones
     * @param $ldap_res
     * @param $dn
     * @param $entry
     */
    public function LdapModReplace($ldap_res,$dn,$entry){
        $result = ldap_mod_replace($ldap_res, $dn, $entry);
        return $result;
    }

    /**Delete attribute values from current attributes
     * @param $ldap_res
     * @param $dn
     * @param $entry
     *
     * @return bool
     */
    public  function LdapModDel($ldap_res,$dn,$entry){
        $result = ldap_mod_del($ldap_res, $dn, $entry);
        return $result;
    }

    /**Delete an entry from a directory
     * @param $ldap_res
     * @param $dn
     *
     * @return bool
     */
    public function LdapDel($ldap_res,$dn){
        $result=ldap_delete($ldap_res,$dn);
        return $result;
    }

    /**Add entries to LDAP directory
     * @param $ldap_res
     * @param $dn
     *
     * @return bool
     */
    public function LdapAdd($ldap_res,$dn){
        $result=ldap_add($ldap_res,$dn);
        return $result;
    }
}
