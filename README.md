# The `twoleds/database` package
This package provides simple interface for accessing databases.

# Example

```php
$database = ...; // Instance of DatabaseInterface

$userId = $database->insert(
    'INSERT INTO user (name, email) VALUES (?, ?)',
    'Spike',
    'spike@example.com'
);

$users = $database->select(
    'SELECT * FROM user WHERE email LIKE ?',
    '%@example.com'
);

$count = $database->selectField(
    'SELECT COUNT(*) FROM user WHERE email LIKE ?',
    '%@example.com'
);

$user = $database->selectRow(
    'SELECT * FROM user WHERE id = ?',
    123
);

$database->update(
    'UPDATE user SET name = ? WHERE id = ?',
    'Xavier',
    123
);

$database->update(
    'DELETE user WHERE id = ?',
    123
);

$database->transactional(function ($database) {
    $counter = $database->selectField(
        'SELECT counter FROM user WHERE id = ? FOR UPDATE',
        123
    );
    $counter = $counter + 1;
    $database->update(
        'UPDATE user SET counter = ? WHERE id = ?',
        123
    );
});
```