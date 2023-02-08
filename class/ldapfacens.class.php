<?php
/**
 * Description of ldapfacens
 *
 * @author fbogila
 */
class ldapfacens {
    
    public static function getInfoUsuarioLDAP($usuario) {

        try {
            /*             * ************************************************
              Bind to an Active Directory LDAP server and look
              something up.
             * ************************************************* */
            $SearchFor = $usuario;               //What string do you want to find?
            //$SearchField="samaccountname";   //In what Active Directory field do you want to search for the string?

            $LDAPHost = "172.16.254.1";       //Your LDAP server DNS Name or IP Address
            $dn = "ou=labinfo,dc=labinfo,dc=facens,dc=br"; //Put your Base DN here
            $LDAPUserDomain = "LABINFO\\";  //Needs the @, but not always the same as the LDAP server domain
            $LDAPUser = "sisimp";        //A valid Active Directory login
            $LDAPUserPassword = "nddigital";
            $LDAPFieldsToFind = array("samaccountname", "displayname", "physicaldeliveryofficename", "description");

            $cnx = ldap_connect($LDAPHost) or die("Não foi possível conectar com o servidor LDAP.");
            ldap_set_option($cnx, LDAP_OPT_PROTOCOL_VERSION, 3);  //Set the LDAP Protocol used by your AD service
            ldap_set_option($cnx, LDAP_OPT_REFERRALS, 0);         //This was necessary for my AD to do anything
            @ldap_bind($cnx, $LDAPUserDomain . $LDAPUser, $LDAPUserPassword);
            error_reporting(E_ALL ^ E_NOTICE);   //Suppress some unnecessary messages
            //$filter="($SearchField=$SearchFor*)"; //Wildcard is * Remove it if you want an exact match
            $filter = "(&(objectCategory=person)(sAMAccountName=$SearchFor))";
            $sr = @ldap_search($cnx, $dn, $filter, $LDAPFieldsToFind);
            $info = @ldap_get_entries($cnx, $sr);

            if ($info["count"] == 0) {
                ldap_close($cnx);
                return null;
            } else {
                $u = array();
                for ($i = 0; $i < $info["count"]; $i++) {
                    $u['usuario'] = $info[$i]['samaccountname'][0];
                    $u['nome'] = $info[$i]['displayname'][0];
                    $u['office'] = $info[$i]['physicaldeliveryofficename'][0];
                    $u['comentario'] = $info[$i]['description'][0];
                }
                @ldap_close($cnx);
                return $u;
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function getInfoUsuariosLDAP($usuario) {

        try {
            $SearchFor = $usuario;               //What string do you want to find?
            $LDAPHost = "172.16.254.1";       //Your LDAP server DNS Name or IP Address
            $dn = "ou=labinfo,dc=labinfo,dc=facens,dc=br"; //Put your Base DN here
            $LDAPUserDomain = "LABINFO\\";  //Needs the @, but not always the same as the LDAP server domain
            $LDAPUser = "sisimp";        //A valid Active Directory login
            $LDAPUserPassword = "nddigital";
            $LDAPFieldsToFind = array("samaccountname", "displayname", "physicaldeliveryofficename", "description");

            $cnx = ldap_connect($LDAPHost) or die("Não foi possível conectar com o servidor LDAP.");
            ldap_set_option($cnx, LDAP_OPT_PROTOCOL_VERSION, 3);  //Set the LDAP Protocol used by your AD service
            ldap_set_option($cnx, LDAP_OPT_REFERRALS, 0);         //This was necessary for my AD to do anything
            @ldap_bind($cnx, $LDAPUserDomain . $LDAPUser, $LDAPUserPassword);
            error_reporting(E_ALL ^ E_NOTICE);   //Suppress some unnecessary messages
            //$filter="($SearchField=$SearchFor*)"; //Wildcard is * Remove it if you want an exact match
            $array_serch = explode(" ", $SearchFor);
            $search = "*";
            foreach ($array_serch as $text) {
                $search .= $text . '*';
            }
            $filter = "(|(displayname=$search)(samaccountname=$search) )";
            $sr = @ldap_search($cnx, $dn, $filter, $LDAPFieldsToFind);
            @ldap_sort($cnx, $sr, 'displayname');
            $info = @ldap_get_entries($cnx, $sr);

            if ($info["count"] == 0) {
                ldap_close($cnx);
                return null;
            } else {
                $lista = array();
                $u = array();
                $tam = $info["count"] > '10' ? 10 : $info["count"];
                for ($i = 0; $i < $tam; $i++) {
                    $u['usuario'] = $info[$i]['samaccountname'][0];
                    $u['nome'] = strtoupper($info[$i]['displayname'][0]);
                    $u['office'] = $info[$i]['physicaldeliveryofficename'][0];
                    $u['comentario'] = $info[$i]['description'][0];
                    $lista[$u['nome']] = $u;
                }
                @ldap_close($cnx);

                return $lista;
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}

?>
