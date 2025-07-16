<?php
declare(strict_types=1);

namespace App\Controller\Authentication\Identifier;

use App\Controller\Authentication\PasswordHasher\RedminePasswordHasher;
use Authentication\Identifier\PasswordIdentifier;

class RedminePasswordIdentifier extends PasswordIdentifier
{
    public const CREDENTIAL_PASSWORD_SALT = 'salt';

    /**
     * Default configuration.
     * - `fields` The fields to use to identify a user by:
     *   - `username`: one or many username fields.
     *   - `password`: password field.
     *   - `salt`: password salt field.
     * - `resolver` The resolver implementation to use.
     * - `passwordHasher` Password hasher class. Can be a string specifying class name
     *    or an array containing `className` key, any other keys will be passed as
     *    config to the class. Defaults to 'Default'.
     *
     * @var array
     */
    protected array $_defaultConfig = [
        'fields' => [
            self::CREDENTIAL_USERNAME => 'login',
            self::CREDENTIAL_PASSWORD => 'hashed_password',
            self::CREDENTIAL_PASSWORD_SALT => 'salt',
        ],
        'resolver' => 'Authentication.Orm',
        'passwordHasher' => null,
    ];

    /**
     * Find a user record using the username and password provided.
     * Input passwords will be hashed even when a user doesn't exist. This
     * helps mitigate timing attacks that are attempting to find valid usernames.
     *
     * @param \ArrayAccess|array|null $identity The identity or null.
     * @param string|null $password The password.
     * @return bool
     */
    protected function _checkPassword(\ArrayAccess|array|null $identity, ?string $password): bool
    {
        $passwordField = $this->getConfig('fields.' . self::CREDENTIAL_PASSWORD);
        $saltField = $this->getConfig('fields.' . self::CREDENTIAL_PASSWORD_SALT);

        if ($identity === null) {
            $identity = [
                $passwordField => '',
            ];
        }
        $hasher = new RedminePasswordHasher(['salt' => $identity->get($saltField)]);
        $hashedPassword = $identity->get($passwordField);
        if (
            $hashedPassword === null ||
            !$hasher->check((string)$password, (string )$hashedPassword)
        ) {
            return false;
        }

        $this->_needsPasswordRehash = $hasher->needsRehash($hashedPassword);

        return true;
    }
}
