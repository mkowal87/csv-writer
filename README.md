# CsvWriter

Basic CsvWriter based on a buffered TextWriter (also provided).

## Installation

Via Composer

Add the repository to `composer.json`:

```json
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/mkowal87/csv-writer.git"
        }
    ]
```

and require the package:

```json
    "require": {
        "libs/csv-writer": "dev-testing"
    }
```

## Usage

To initialize:

```php
$writer = (new CsvWriter())
          ->open($filePath)
          ;
```

To write:

```php
$writer->write(['column1_value', 'column2_value']);
```

To close (and flush the buffer):

```php
$writer->close();
```

Opening another file automatically closes previous one.