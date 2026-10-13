# Composer Basic Project

## Composer PHP's Libraries Management

- Composer manage the libraries by composer.json (which packages should be installed) and composer.lock (where composer can get that package).
- The package is installed into vendor/ directory of consuming project with vendor_name/pkg_name directory, e.g: The package named quan/composer is a directory quan/composer/* in the vendor/ directory.
- Difference between composer.json and composer.lock:
  - composer.json: the information overview include name, namespace map for autoload, require (which package is installed), ...
  - composer.lock: the detail of package listed in require and require-dev, especially the location to install that package.

## Composer JSON Properties

| Key               | Value                                                     | Functionality                                                       | Priority  |
| ----------------- | --------------------------------------------------------- | ------------------------------------------------------------------- | --------- |
| name              | vendore/pkg_name                                          | the unique name of the package                                      | Mandatory |
| type              | library (default), project, composer-plugin, metapackage  | define how composer treat this package                              | Optional  |
| description       | string                                                    | brief overview about the package                                    | Optional  |
| keywords          | keyword_name                                              | useful for seaching with composer search                            | Optional  |
| license           | [ Link Text ](https://spdx.org/licenses/ "SPDX Licenses") | license of package                                                  | Optional  |
| require           | "vendor/pkg_name" : "X.Y.Z@constraint"                    | list of dependencies must be installed                              | Mandatory |
| require-dev       | "vendor/pkg_name" : "X.Y.Z@constraint"                    | list of dependencies need for dev enviroment                        | Optional  |
| autoload          | "namespace" : "source"                                    | map namespace prefix to the related location of file system         | Optional  |
| autoload-dev      | "namespace" : "source"                                    | map namespace prefix to related location (useful for dev and test)  | Optional  |
| scripts           | "command_name" : [ "array_of_command" ]                   | list of command can run with composer command_name                  | Optional  |
| config            | "config_name" : "value"                                   | global config for consuming project                                 | Optional  |
| minimum-stability | stable (default) > RC > beta > alpha > dev                | define the minimum level of dependencies                            | Optional  |
| prefer-stable     | true / false                                              | tell composer to choose the stable dependencies                     | Optional  |
| repositories      | name, type, url                                           | location for private/local package which not be listed on Packigist | Optional  |
| authors           | array of key-value                                        | list the authors of package                                         | Optional  |
