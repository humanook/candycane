<?php

namespace App\Controller\Authentication;

use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Cake\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;

class CandyCaneAuthenticationService implements AuthenticationServiceProviderInterface
{
    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $loginUrl = Router::url(['controller' => 'Account', 'action' => 'login']);
        $authenticationService = new AuthenticationService([
            'unauthenticatedRedirect' => $loginUrl,
            'queryParam' => 'redirect',
        ]);

        // identifiers を読み込み、email と password のフィールドを確認します
        $authenticationService->loadIdentifier('Authentication.Password', [
            'fields' => [
                'username' => 'email',
                'password' => 'password',
            ]
        ]);

        //  authenticatorsをロードしたら, 最初にセッションが必要です
        $authenticationService->loadAuthenticator('Authentication.Session');
        // 入力した email と password をチェックする為のフォームデータを設定します
        $authenticationService->loadAuthenticator('Authentication.Form', [
            'fields' => [
                'username' => 'email',
                'password' => 'password',
            ],
            'loginUrl' => $loginUrl,
        ]);

        return $authenticationService;
    }
}
