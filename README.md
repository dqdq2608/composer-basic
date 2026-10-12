# Composer Basic Project

## Composer PHP's Libraries Management

- Composer manage the libraries by composer.json (which packages should be installed) and composer.lock (where composer can get that package).
- The package is installed into vendor/ directory of consuming project with vendor_name/pkg_name directory, e.g: The package named quan/composer is a directory quan/composer/* in the vendor/ directory.
- Difference between composer.json and composer.lock:
  - composer.json: the information overview include name, namespace map for autoload, require (which package is installed), ...
  - composer.lock: the detail of package listed in require and require-dev, especially the location to install that package.
