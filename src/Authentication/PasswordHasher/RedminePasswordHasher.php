<?php

namespace App\Controller\Authentication\PasswordHasher;

use Authentication\PasswordHasher\AbstractPasswordHasher;

class RedminePasswordHasher extends AbstractPasswordHasher
{
    /**
     * Default config for this object.
     * - `hashType` String identifier of the hash type to use on the password. (e.g 'sha256' or 'md5')
     * - `salt` Boolean flag for salting the password in a hash, or check.
     *
     * @var array
     */
    protected array $_defaultConfig = [
        'salt' => '',
    ];

    /**
     * @inheritDoc
     */
    public function hash(string $password): string
    {
        return sha1($this->_config['salt'] . sha1($password));
    }

    /**
     * @inheritDoc
     */
    /**
     * Check hash. Generate hash for user provided password and check against existing hash.
     *
     * @param string $password Plain text password to hash.
     * @param string $hashedPassword Existing hashed password.
     * @return bool True if hashes match else false.
     */
    public function check(string $password, string $hashedPassword): bool
    {
        return $hashedPassword === $this->hash($password);
    }
}
