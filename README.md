# Composer Basic Project

## Composer PHP's Libraries Management

- Composer manage the libraries by composer.json (which packages should be installed) and composer.lock (where composer can get that package).
- The package is installed into vendor/ directory of consuming project with vendor_name/pkg_name directory, e.g: The package named quan/composer is a directory quan/composer/* in the vendor/ directory.
- Difference between composer.json and composer.lock:
  - composer.json: the information overview include name, namespace map for autoload, require (which package is installed), ...
  - composer.lock: the detail of package listed in require and require-dev, especially the location to install that package.

## Composer JSON Properties

| Key               | Value                                                         | Functionality                                                       | Priority  |
| ----------------- | ------------------------------------------------------------- | ------------------------------------------------------------------- | --------- |
| name              | vendore/pkg_name                                              | the unique name of the package                                      | Mandatory |
| type              | library (default), project, composer-plugin, metapackage      | define how composer treat this package                              | Optional  |
| description       | string                                                        | brief overview about the package                                    | Optional  |
| keywords          | keyword_name                                                  | useful for seaching with composer search                            | Optional  |
| license           | [ SPDX Licenses ](https://spdx.org/licenses/ "SPDX Licenses") | license of package                                                  | Optional  |
| require           | "vendor/pkg_name" : "X.Y.Z@constraint"                        | list of dependencies must be installed                              | Mandatory |
| require-dev       | "vendor/pkg_name" : "X.Y.Z@constraint"                        | list of dependencies need for dev enviroment                        | Optional  |
| autoload          | "namespace" : "source"                                        | map namespace prefix to the related location of file system         | Optional  |
| autoload-dev      | "namespace" : "source"                                        | map namespace prefix to related location (useful for dev and test)  | Optional  |
| minimum-stability | stable (default) > RC > beta > alpha > dev                    | define the minimum level of dependencies                            | Optional  |
| scripts           | "command_name" : [ "array_of_command" ]                       | list of command can run with composer command_name                  | Optional  |
| config            | "config_name" : "value"                                       | global config for consuming project                                 | Optional  |
| prefer-stable     | true / false                                                  | tell composer to choose the stable dependencies                     | Optional  |
| repositories      | name, type, url                                               | location for private/local package which not be listed on Packigist | Optional  |
| authors           | array of key-value                                            | list the authors of package                                         | Optional  |

## Composer Command Lines

| Command                                         | Functionality                                                                          |
| ----------------------------------------------- | -------------------------------------------------------------------------------------- |
| composer install                                | check composer.lock and install dependencies for consuming project                     |
| composer update                                 | check composer.json and update new version in composer.lock                            |
| composer require                                | add new dependencies in require section                                                |
| composer require --dev                          | add new dependencies in require-dev section                                            |
| composer remove                                 | remove specific dependencies                                                           |
| composer update vendor/pkg                      | update specific dependencies                                                           |
| composer install --no-dev --optimize-autoloader | install dependencies stored in require section and create class_map file for autloader |
| composer why vendor/pkg                         | show the packages that require this package                                            |
| composer why-not vendor/pkg x.y.z               | show the packages that prevent this verison of dependencies from installation          |
| composer outdated                               | show the lastest version of outdated dependencies                                      |
| composer show -t                                | list all packages information                                                          |

## Dependencies Version Constraint

| Constraint       | Meaning                                                                  |
| ---------------- | ------------------------------------------------------------------------ |
| ^X.Y.Z           | Compatiable with X.Y.Z ranged in major ( >= X.Y.Z < (X + 1).0.0 )        |
| ~X.Y.Z           | Compatiable with X.Y.Z ranged in patch only (>= X.Y.Z < X.(Y + 1).0 )    |
| X.Y.*            | Any version that matching X major and Y minor ( >= X.Y.0 < X.(Y + 1).0 ) |
| >= x.y.z < X.Y.Z | Greater than or equal to x.y.z, and less than X.Y.Z                      |

## Usage

```
In composer.json (root package):
{

    "require-dev": {
        "quan/composer-basics": "@dev"
    },
    "repositories": [
        {
            "name": "composer-basics",
            "type": "vcs",
            "url": "repository_url"
        }
    ]

}
```

## FAQ

- Why commit composer.lock?
  - composer.lock is the only where the composer install get to install the right version
  - In composer.json, I have 1 dependency with ^1.2.0 and I get the 1.2.1 version in composer.lock. Then when I push only the composer.json, my contributor get the 1.2.3 version.
    => Mismatching between 2 version
- When use composer install / update on server?
  - composer install when you want get the stable version in composer.lock (useful when in production stage).
  - composer update if you want to update the composer.lock for the latest version and install it (suitable for dev/test stage).
