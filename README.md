## phpldap


A basic Ldap wrapper for PHP (see http://php.net/manual/zh/book.ldap.php for more information about the libcurl extension for PHP)

## Installation

Click the download link above or git clone https://github.com/banbooboo/phpldap.git

and you can see the project:

```
CHANGELOG.md   CONTRIBUTING.md  README.md  tests
composer.json  LICENSE          src        
```

run  `composer install`,and will find new files `vendor`

```
CHANGELOG.md   CONTRIBUTING.md  README.md  tests
composer.json  LICENSE          src        vendor
```

## Usage

### Initialization

imply require and initialize the ldap class like so:

```
require '../vendor/autoload.php';

//create phpLdap object
$ldapObj=new Bambooboo\PHPLdap\Ldap();
```

just like `tests/LdapTest.php`

### Examples:

```
//Connect to an LDAP server and Bind to LDAP directory
$ldap_res=$ldapObj->LdapInit($ldap_manager,$ldap_password,$url,$port);

//Get all result entries
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

```

Returns a complete result information in a multi-dimensional array on success and FALSE on error.


Which would display something like

```
Array
(
    [count] => 1
)

```

### Testing

Refine the file's ldap information which `tests/LdapTest.php`, and then run `php tests/LdapTest.php`


### Contact

Problems, comments, and suggestions all welcome: 1798736436@qq.com
